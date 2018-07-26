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

        if ($slug == "start-prodazh-ogranichennoy-serii-avtomobiley-isuzu-d-max-black-edition") {
            return view('front.sales.view2');
        }

        if ($slug == "dva-goda-to-v-podarok") {
            return view('front.sales.view3');
        }

        if ($slug == "prodlenie-garantii") {
            return view('front.sales.view4');
        }





        dd($slug);
    }
}
