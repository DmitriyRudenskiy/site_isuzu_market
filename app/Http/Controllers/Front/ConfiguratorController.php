<?php

namespace App\Http\Controllers\Front;

use App\Repositories\Car\BasesRepository;
use App\Repositories\Car\TypesRepository;
use App\Services\CartService;
use Illuminate\Routing\Controller;

class ConfiguratorController extends Controller
{
    public function types(TypesRepository $typesRepository)
    {
        $list = $typesRepository->getList();

        return view(
            'front.configurator.types',
            [
                "list" => $list
            ]
        );
    }

    public function chassis($alias, BasesRepository $repository)
    {
        $typeId = (int)$alias;

        $list = $repository->getList($typeId);

        $elf = array_filter($list, function($base) {
            return $base->category_id == 1;
        });

        $forward =  array_filter($list, function($base) {
            return $base->category_id == 2;
        });

        $forward = array_values($forward);

        $giga =  array_filter($list, function($base) {
            return $base->category_id == 3;
        });

        $giga = array_values($giga);

        return view(
            'front.configurator.chassis',
            [
                'elf' => $elf,
                'forward' => $forward,
                'giga' => $giga,
                'type_id' => $typeId
            ]
        );
    }

    /**
     *
     */
    public function options($typeId, $baseId, BasesRepository $basesRepository)
    {
        $base = $basesRepository->find($baseId);
        $price = $base->getPrice($typeId)->first();

        if ($price == null) {
            throw new \RuntimeException();
        }

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
                "base_options" => $baseOptions,
                "base" => $base,
                "price" => $price->price,
                "type_id" => $typeId,
                "base_id" => $baseId
            ]
        );
    }

    public function leasing($typeId, $baseId, BasesRepository $basesRepository, CartService $service)
    {
        $base = $basesRepository->find($baseId);
        $price = $base->getPrice($typeId)->first();

        $service->add($price);

        if ($price == null) {
            throw new \RuntimeException();
        }

        return view(
            'front.configurator.leasing',
            [
                "base" => $base,
                "price" => $price->price,
                "type_id" => $typeId,
                "base_id" => $baseId
            ]
        );
    }

    public function finish()
    {
        return view('front.configurator.finish');
    }
}
