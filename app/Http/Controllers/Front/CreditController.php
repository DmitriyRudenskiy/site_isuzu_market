<?php

namespace App\Http\Controllers\Front;

use App\Repositories\ProductsRepository;
use Illuminate\Routing\Controller;

class CreditController extends Controller
{
    public function view(ProductsRepository $productsRepository)
    {
        $id = 1;

        $product = $productsRepository->get($id);

        return view(
            'front.credit.view',
            [
                'product' => $product
            ]
        );
    }
}
