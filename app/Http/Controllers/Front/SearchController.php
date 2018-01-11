<?php

namespace App\Http\Controllers\Front;

use App\Entities\Car\Categories;
use App\Entities\Car\Types;
use App\Repositories\ProductsRepository;
use App\Repositories\TonsRepository;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(ProductsRepository $productsRepository, TonsRepository $tonsRepository, Request $request)
    {
        $selectTypes = $request->get('t');
        $sort = (int)!empty($request->get('s'));

        if ((is_array($selectTypes) && sizeof($selectTypes) > 0) || $sort > 0) {
            $list = $productsRepository->getListForSearchParams($selectTypes, $sort);
        } else {
            $list = $productsRepository->getListForSearch();
        }

        $tmp = $productsRepository->getAllTypes();

        $types = Types::whereIn('id', $tmp->pluck('type_id')->toArray())->get();

        if (is_array($selectTypes) && sizeof($selectTypes) > 0) {
            $types->map(
                function($row) use ($selectTypes) {
                    $row->selected = in_array($row->id, $selectTypes);
                }
            );
        }


        $sortUrl = http_build_query(["t" => $selectTypes, "s" => abs($sort - 1)]);

        //dd($sortUrl);

        return view(
            'front.search.index',
            [
                'list' => $list,
                'tons' => $tonsRepository->getList(),
                'categories' => Categories::all(),
                'types' => $types,
                'selectTypes' => $types,
                'sortUrl' => $sortUrl,
                'isSort' => empty($sort)
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
