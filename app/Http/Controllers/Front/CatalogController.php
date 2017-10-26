<?php

namespace App\Http\Controllers\Front;

use Illuminate\Routing\Controller;

class CatalogController extends Controller
{
    /**
     * Список новостей
     */
    public function index()
    {
        return view('front.catalog.types');
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function view($id)
    {

    }
}
