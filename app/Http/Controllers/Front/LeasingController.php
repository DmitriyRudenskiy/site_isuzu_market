<?php

namespace App\Http\Controllers\Front;

use App\Repositories\ProductsRepository;
use Illuminate\Routing\Controller;

class LeasingController extends Controller
{

    public function index()
    {
        return view('front.leasing.index');
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

    public function calculation()
    {
        return view('front.leasing.calculation');
    }
}
