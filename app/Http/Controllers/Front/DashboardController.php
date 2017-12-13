<?php

namespace App\Http\Controllers\Front;

use App\Repositories\Car\TypesRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     *
     */
    public function home(ProductsRepository $productsRepository, TypesRepository $typesRepository)
    {
        $product = $productsRepository->getProductsForHome();
        $types = $typesRepository->getList();

        return view(
            'front.dashboard.home',
            [
                'product' => $product,
                "types" => $types
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

    public function service()
    {
        return view('front.dashboard.service');
    }

    public function parts()
    {
        return view('front.dashboard.parts');
    }

    public function credit()
    {
        return view('front.dashboard.credit');
    }
}
