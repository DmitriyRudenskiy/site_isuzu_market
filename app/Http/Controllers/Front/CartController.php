<?php

namespace App\Http\Controllers\Front;

use App\Services\CartService;
use Illuminate\Routing\Controller;

class CartController extends Controller
{

    public function index(CartService $service)
    {
        return view(
            'front.cart.index',
            [
                'list' => $service->get()
            ]
        );
    }
}
