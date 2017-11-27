<?php

namespace App\Http\Controllers\Front;

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

    public function view($id, ProductsRepository $productsRepository)
    {
        $product = $productsRepository->get($id);

        return view(
            'front.leasing.view',
            [
                'product' => $product
            ]
        );
    }
}
