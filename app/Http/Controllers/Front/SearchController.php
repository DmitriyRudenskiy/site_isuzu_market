<?php

namespace App\Http\Controllers\Front;

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
                'tons' => $tonsRepository->getList()
            ]
        );
    }
}
