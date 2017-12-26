<?php

namespace App\Http\Controllers\Front;

use App\Repositories\ProductsRepository;
use Illuminate\Routing\Controller;

class SearchController extends Controller
{
    public function index(ProductsRepository $repository)
    {
        $list = $repository->getListForSearch();

        return view('front.search.index', ['list' => $list]);
    }
}
