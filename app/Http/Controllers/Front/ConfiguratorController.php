<?php

namespace App\Http\Controllers\Front;

use App\Repositories\TypesRepository;
use Illuminate\Routing\Controller;

class ConfiguratorController extends Controller
{
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

    public function chassis($alias)
    {
        return view('front.configurator.chassis');
    }

    /**
     *
     */
    public function options()
    {
        $baseOptions = [
            [
                "title" => "Дефлекторы на боковые стекла",
                "price" => 5000,
            ],
            [
                "title" => "Дополнительный топливный бак",
                "price" => 6000,
            ],
            [
                "title" => "Защита АКБ",
                "price" => 7000,
            ],
            [
                "title" => "Защита задних фар",
                "price" => 4000,
            ],
            [
                "title" => "Зеркала заднего вида с подогревом",
                "price" => 2000,
            ],
            [
                "title" => "Инструментальный ящик",
                "price" => 2000,
            ],
            [
                "title" => "Камера заднего вида с выводом изображения на монитор",
                "price" => 3000,
            ],
            [
                "title" => "Конвектор",
                "price" => 5000,
            ],

            [
                "title" => "Магнитола и CD/DVD-проигрыватель",
                "price" => 4000,
            ],

            [
                "title" => "Переоборудование автомобиля под опасные грузы",
                "price" => 10000,
            ],

            [
                "title" => "Предпусковые подогреватели Eberspacher,  Webasto",
                "price" => 8000,
            ],


            [
                "title" => "Световые спецсигналы ",
                "price" => 8000,
            ],

            [
                "title" => "Сигнализация",
                "price" => 10000,
            ],

            [
                "title" => "Системы слежения ГЛОНАСС и GPS",
                "price" => 10000,
            ],

            [
                "title" => "Спойлер",
                "price" => 8000,
            ],

            [
                "title" => "Удлинение кронштейнов зеркал заднего вида",
                "price" => 10000,
            ],

            [
                "title" => "Установка тахографа",
                "price" => 10000,
            ],
        ];

        return view(
            'front.configurator.options',
            [
                "base_options" => $baseOptions
            ]
        );
    }

    public function leasing()
    {
        return view('front.configurator.leasing');
    }

    public function finish()
    {
        return view('front.configurator.finish');
    }
}
