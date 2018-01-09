<?php
namespace App\Http\Controllers\Admin;

use App\Entities\Car\Categories;
use App\Entities\Car\Types;
use App\Entities\Products;
use App\Repositories\ProductsRepository;
use App\Repositories\TonsRepository;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Imagine\Gd\Imagine;

class ProductsController extends Controller
{
    public function index(Products $repository)
    {
        $list = $repository->all();

        return view('admin.products.index', ['list' => $list]);
    }

    public function add(TonsRepository $tonsRepository)
    {
        $data = [
            'product' => new Products(),
            'ton' =>  $tonsRepository->getList(),
            'categories' => Categories::all(),
            'types' => Types::all()
        ];

        return view('admin.products.add', $data);
    }

    public function edit($id, Products $repository)
    {
        $product = $repository->find($id);

        $data = [
            'product' => $product,
            'ton' => [35, 52, 75, 95, 120, 180],
            'categories' => Categories::all(),
            'types' => Types::all()
        ];

        return view('admin.products.edit', $data);
    }

    public function insert(Request $request)
    {
        $data = $request->only([
            "title",
            "price",
            "size_small",
            "size_big",
            "type_id",
            "category_id",
            "ton",
            "in_stock",
            "description",
            "config_url"
        ]);

        $data = array_map('trim', $data);

        $product = Products::create($data);

        if (empty($product->id)) {
            throw new \RuntimeException();
        }

        return redirect()->route('admin_products_edit', ['id' => $product->id]);
    }

    public function update(Request $request, Products $repository)
    {
        $id = $request->get('id');

        $product = $repository->find($id);

        $data = $request->only([
            "title",
            "price",
            "size_small",
            "size_big",
            "type_id",
            "category_id",
            "ton",
            "in_stock",
            "description",
            "config_url"
        ]);

        $data = array_map('trim', $data);

        $product->update($data);

        return redirect()->route('admin_products_edit', ['id' => $product->id]);
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

    public function cover(Request $request, Filesystem $filesystem, Products $repository)
    {
        $id = $request->get('id');
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
        $model->cover = $filename;
        $model->save();

        $directory = public_path('img') . DIRECTORY_SEPARATOR . 'products';

        // создание директории
        if ($filesystem->exists($directory) !== true) {
            $filesystem->makeDirectory($directory, 0755, true);
        }

        $path = $directory . DIRECTORY_SEPARATOR . $filename;

        // сохраняем изображение
        $image = (new Imagine())->open($file->path());
        $image->save($path);

        return redirect()->route('admin_products_edit', ['id' => $model->id]);
    }
}