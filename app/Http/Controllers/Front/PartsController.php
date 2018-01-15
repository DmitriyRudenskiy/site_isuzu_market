<?php

namespace App\Http\Controllers\Front;

use App\Entities\Car\Categories;
use App\Entities\Car\Types;
use App\Repositories\PartsRepository;
use App\Repositories\ProductsRepository;
use App\Repositories\TonsRepository;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class PartsController extends Controller
{
    public function view($id, PartsRepository $repository)
    {
        $part = $repository->find($id);

        return view('front.parts.view', ["part" => $part]);
    }

    public function find($alias, PartsRepository $repository)
    {
        $part = $repository->findWhere(['alias' => $alias])->first();

        return view('front.parts.view', ["part" => $part]);
    }
}
