<?php

namespace App\Http\Controllers\Front;

use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     *
     */
    public function home()
    {
        return view('front.dashboard.home');
    }

    /**
     *
     */
    public function about()
    {
        return view('front.dashboard.about');
    }

    /**
     *
     */
    public function contacts()
    {
        return view('front.dashboard.contacts');
    }
}
