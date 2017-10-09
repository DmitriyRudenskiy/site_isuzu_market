<?php

namespace App\Http\Controllers\Front;

use App\Repositories\ProductsRepository;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     *
     */
    public function home(ProductsRepository $productsRepository)
    {
        $product = $productsRepository->getProductsForHome();

        return view(
            'front.dashboard.home',
            [
                'product' => $product
            ]
        );
    }

    /**
     *
     */
    public function about()
    {
        return view('front.dashboard.about');
    }

    /**
     *
     */
    public function contacts()
    {
        return view('front.dashboard.contacts');
    }
}
