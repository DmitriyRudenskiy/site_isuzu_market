<?php

namespace App\Http\Controllers\Front;

use App\Repositories\Car\TypesRepository;
use App\Repositories\PartsRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     *
     */
    public function home(ProductsRepository $productsRepository, TypesRepository $typesRepository)
    {
        $product = $productsRepository->getProductsForHome();
        $types = $typesRepository->getList();

        return view(
            'front.dashboard.home',
            [
                'product' => $product,
                "types" => $types
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

    public function service()
    {
        return view('front.dashboard.service');
    }

    public function findModel($type)
    {
        $type = trim(strtoupper($type));
        $filename = public_path('model') . DIRECTORY_SEPARATOR . 'add.csv';
        $result = [];

        $file = new \SplFileObject($filename);
        $file->setFlags(\SplFileObject::READ_CSV);
        foreach ($file as $row) {
            if ($row[1] == $type) {
                $result[] = (object) [
                    'title' => $row[2],
                    'image' => $row[0],
                    'year' => $row[3],
                    'driver' => $row[4],
                    'config_url' => $row[5]
                ];
            }
        }

        return view('front.dashboard.find_model', ['list' => $result]);
    }

    public function parts(Request $request, PartsRepository $repository)
    {
        return view('front.dashboard.parts');
    }

    public function finance()
    {
        return view('front.dashboard.finance');
    }

    public function vacancy()
    {
        return view('front.dashboard.vacancy');
    }
}
