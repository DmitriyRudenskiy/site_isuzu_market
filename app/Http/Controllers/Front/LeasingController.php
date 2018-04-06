<?php

namespace App\Http\Controllers\Front;

use App\Repositories\Car\BasesRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Routing\Controller;

class LeasingController extends Controller
{

    public function index(ProductsRepository $productsRepository)
    {
        $id = 1;
        $product = $productsRepository->get($id);

        return view(
            'front.leasing.index',
            [
                'price' => $product ["price"],
                'product' => $product
            ]
        );
    }

    public function view($id, ProductsRepository $productsRepository, BasesRepository $basesRepository)
    {
        if (strpos($id, '_') !== false) {
            list($typeId, $baseId) = explode('_', $id);

            $base = $basesRepository->find($baseId);
            $price = $base->getPrice($typeId)->first();

            if (empty($price)) {
                throw new \RuntimeException();
            }

            $product = (object)[
                "img" => sprintf("/img/configurator/products/%s_%s_1.jpg", $typeId, $baseId),
                "title" => $base->title,
                "price" => $price->price
            ];

        } elseif ($id > 0) {
            $product = $productsRepository->get($id);
        } else {
            throw new NotFoundHttpException();
        }

        return view(
            'front.leasing.view',
            [
                'product' => $product
            ]
        );
    }
}
