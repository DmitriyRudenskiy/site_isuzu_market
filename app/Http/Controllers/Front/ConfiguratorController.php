<?php

namespace App\Http\Controllers\Front;

use App\Repositories\TypesRepository;
use Illuminate\Routing\Controller;

class ConfiguratorController extends Controller
{
    /**
     *
     */
    public function types(TypesRepository $typesRepository)
    {
        $list = $typesRepository->getAll();

        return view(
            'front.configurator.types',
            [
                "list" => $list
            ]
        );
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
