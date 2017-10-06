<?php

namespace App\Http\Controllers\Front;

use Illuminate\Routing\Controller;

class LeasingController extends Controller
{

    public function index()
    {
        return view('front.leasing.index');
    }

    public function view($id)
    {
        return view('front.leasing.view');
    }

    public function calculation()
    {
        return view('front.leasing.calculation');
    }
}
