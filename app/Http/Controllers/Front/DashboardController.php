<?php

namespace App\Http\Controllers\Front;

use App\Repositories\ProductsRepository;
use App\Repositories\TypesRepository;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     *
     */
    public function home(ProductsRepository $productsRepository, TypesRepository $typesRepository)
    {
        $product = $productsRepository->getProductsForHome();
        $types = $typesRepository->getAll();

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

    protected function getTypes()
    {

    }
}
