<?php
namespace App\Http\Controllers\Admin;

use App\Repositories\PartsRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Imagine\Gd\Imagine;
use SplFileObject;

class PartsController extends Controller
{
    public function index(PartsRepository $repository)
    {
        $list = $repository->all();

        return view('admin.parts.index', ['list' => $list]);
    }

    public function import(PartsRepository $repository)
    {
        /* @var \Illuminate\Http\UploadedFile $file */
        $file = Input::file('csv');


        $csv = new SplFileObject($file->path());
        $csv->setFlags(SplFileObject::READ_CSV);

        foreach ($csv as $row) {

            if (sizeof($row) >= 5 && $row[2] > 0) {

                $value = [
                    "vendor_code" => trim($row[0]),
                    "title" => trim(str_replace($row[0], '', $row[1])),
                    "price" => floatval(str_replace(',', '.', $row[2])),
                    "amount" => (int)$row[4]
                ];

                $repository->add($value);
            }
        }

        return redirect()->route('admin_parts_index');
    }

    public function edit($id, PartsRepository $repository)
    {
        $part = $repository->find($id);

        return view('admin.parts.edit', ['part' => $part]);
    }


    public function update(Request $request, PartsRepository $repository)
    {
        $id = $request->get('id');

        $product = $repository->find($id);

        $data = $request->only([
            "alias",
            "vendor_code",
            "title",
            "price",
            "amount",
            "priority",
            "description"
        ]);

        $data = array_map('trim', $data);

        $product->update($data);

        return redirect()->route('admin_parts_edit', ['id' => $product->id]);
    }

    public function hide($id, ProductsRepository $repository)
    {
        $product = $repository->find($id);

        if ($product !== null) {
            $product->visible = 0;
            $product->save();
        }

        return redirect()->route('admin_products_index');
    }

    public function show($id, ProductsRepository $repository)
    {
        $product = $repository->find($id);

        if ($product !== null) {
            $product->visible = 1;
            $product->save();
        }

        return redirect()->route('admin_products_index');
    }

    public function image(Request $request, Filesystem $filesystem, PartsRepository $repository)
    {
        $id = (int)$request->get('id');
        $model = $repository->find($id);

        /* @var \Illuminate\Http\UploadedFile $file */
        $file = Input::file('image');

        $validator = Validator::make(
            ['image' => $file],
            ['image' => 'image']
        );

        if ($validator->fails()) {
            throw new \RuntimeException();
        }

        // имя файла
        $filename = md5(microtime() . $model) . "." . $file->getClientOriginalExtension();

        // сохраняем путь к картинке
        $model->image = $filename;
        $model->save();

        $directory = public_path('img') . DIRECTORY_SEPARATOR . 'parts';

        // создание директории
        if ($filesystem->exists($directory) !== true) {
            $filesystem->makeDirectory($directory, 0755, true);
        }

        $path = $directory . DIRECTORY_SEPARATOR . $filename;

        // сохраняем изображение
        $image = (new Imagine())->open($file->path());
        $image->save($path);

        return redirect()->route('admin_parts_edit', ['id' => $model->id]);
    }
}