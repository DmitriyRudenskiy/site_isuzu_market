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
        dd($slug);

        return view('front.sales.view');
    }
}
