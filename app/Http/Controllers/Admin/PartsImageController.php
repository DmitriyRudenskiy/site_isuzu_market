<?php
namespace App\Http\Controllers\Admin;

use App\Entities\PartsImages;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PartsImageController extends Controller
{

    /**
     * Add image to gallery path.
     *
     * @param PartsImages $repository
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(PartsImages $repository, Request $request)
    {
        /* @var UploadedFile $file */
        $file = Input::file('image');
        $partId = (int)$request->get('id');


        if ($file->getError() > 0) {
            return redirect()->route('admin_parts_edit', ['id' => $partId, 'error' => $file->getErrorMessage()]);
        }

        /* @var \Illuminate\Validation\Validator $validator */
        $validator = Validator::make(
            ['image' => $file],
            ['image' => 'image']
        );

        if ($validator->fails()) {
            return redirect()->route('admin_parts_edit', ['id' => $partId, 'error' => 'Bad files']);
        }

        // Save image to database
        $image = new PartsImages();
        $image->part_id = $partId;
        $image->file_path = md5(microtime() . $file->getClientOriginalName()). ".jpeg";
        $image->save();

        if ($image->id < 1) {
            return redirect()->route('admin_parts_edit', ['id' => $partId, 'error' => 'Not save to database']);
        }

        // имя файла
        $directory = base_path('public') . $image->getPath();
        $filename = $directory . DIRECTORY_SEPARATOR . $image->file_path;

        $filesystem = new Filesystem();

        // создание директории
        if ($filesystem->exists($directory) !== true) {
            $filesystem->makeDirectory($directory, 0755, true);
        }

        // сохраняем изображение
        $thumbnail = (new Imagine())->open($file->path());
        //$thumbnail->resize(new Box(680, 880))->save($filename);

        $thumbnail->thumbnail(new Box(680, 880), ImageInterface::THUMBNAIL_INSET)
            ->save($filename);

        return redirect()->route('admin_parts_edit', ['id' => $partId]);
    }

    /**
     * Remove
     *
     * @param CompanyImageRepository $repository
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(PartsImages $repository, $id)
    {
        $image = $repository->find($id);

        if ($image === null) {
            throw new NotFoundHttpException();
        }

        $partId = $image->part_id;

        $image->delete();

        return redirect()->route('admin_parts_edit', ['id' => $partId]);
    }
}