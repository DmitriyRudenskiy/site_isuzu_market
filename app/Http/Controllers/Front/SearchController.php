<?php

namespace App\Http\Controllers\Front;

use App\Entities\Car\Categories;
use App\Entities\Car\Types;
use App\Repositories\ProductsRepository;
use App\Repositories\TonsRepository;
use Illuminate\Routing\Controller;

class SearchController extends Controller
{
    public function index(ProductsRepository $productsRepository, TonsRepository $tonsRepository)
    {
        $list = $productsRepository->getListForSearch();

        return view(
            'front.search.index',
            [
                'list' => $list,
                'tons' => $tonsRepository->getList(),
                'categories' => Categories::all(),
                'types' => Types::all()
            ]
        );
    }

    public function view($id, ProductsRepository $productsRepository)
    {
        $product = $productsRepository->find($id);

        return view(
            'front.search.view',
            [
                "product" => $product
            ]
        );
    }
}
