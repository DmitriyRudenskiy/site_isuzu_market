<?php

namespace App\Http\Controllers\Front;

use App\Repositories\Car\TypesRepository;
use App\Repositories\PartsRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SalesController extends Controller
{
    /**
     *
     */
    public function index()
    {
        return view('front.sales.index');
    }

    /**
     *
     */
    public function view($slug)
    {
        if ($slug == "originalnoe-motornoe-maslo-isuzu-genuine-oil") {
            return view('front.sales.view1');
        }

        dd($slug);
    }
}
