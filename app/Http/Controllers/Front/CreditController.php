<?php

namespace App\Http\Controllers\Front;

use App\Repositories\BanksRepository;
use App\Repositories\Car\BasesRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CreditController extends Controller
{
    public function view($id, ProductsRepository $productsRepository, BasesRepository $basesRepository)
    {
        if (strpos($id, '_') !== false) {
            list($typeId, $baseId) = explode('_', $id);

            $base = $basesRepository->find($baseId);
            $price = $base->getPrice($typeId)->first();

            if (empty($price)) {
                throw new \RuntimeException();
            }

            $product = (object)[
                "img" => sprintf("/img/configurator/products/%s_%s_1.jpg", $typeId, $baseId),
                "title" => $base->title,
                "price" => $price->price * 0.98
            ];

        } elseif ($id > 0) {
            $product = $productsRepository->get($id);
        } else {
            throw new NotFoundHttpException();
        }

        return view(
            'front.credit.view',
            [
                'product' => $product
            ]
        );
    }

    public function banks(BanksRepository $banksRepository, Request $request)
    {
        $list = [
            [
                "id" => 7,
                "precent" => 0.1,
                "title" => "СОВКОМБАНК",
                "image" => "/img/bank/00.jpg"
            ],
            [
                "id" => 9,
                "precent" => 0.1,
                "title" => "РОСБАНК",
                "image" => "/img/bank/01.jpg"
            ],
            [
                "id" => 11,
                "precent" => 0.1,
                "title" => "КРЕДИТЕВРОПАБАНК",
                "image" => "/img/bank/02.jpg"
            ],
            [
                "id" => 15,
                "precent" => 0.1,
                "title" => "АО \"Эксперт Банк\"",
                "image" => "/img/bank/03.png"
            ]
        ];

        $data = array_map(function ($value) {
            return $value * 1;
        }, $request->only(['price', 'period', 'advance']));

        return view(
            'front.credit.banks',
            [
                'list' => $list,
                'data' => http_build_query($data)
            ]
        );
    }
}
