<?php

namespace App\Http\Controllers\Front;

use Illuminate\Routing\Controller;

class NewsController extends Controller
{
    /**
     * Список новостей
     */
    public function index()
    {
        $list = [
            [
                "image" => "/img/news/001.jpg",
                "title" => "ISUZU: настало «Время тяжелых машин»",
                "date" => "02.06.2017"
            ],
            /*
            [
                "image" => "/img/news/002.jpg",
                "title" => "Победители конкурса автомехаников ISUZU WORLD TECHNICAL GRAND PRIX",
                "date" => "30.05.2017"
            ],
            */
            [
                "image" => "/img/news/003.jpg",
                "title" => "ISUZU на выставке «AUTO SHOW 2017»",
                "date" => "02.06.2017"
            ],
            [
                "image" => "/img/news/004.jpg",
                "title" => "В Ульяновске открылось производство тяжелых грузовиков «Исузу»",
                "date" => "19.05.2017"
            ],
            [
                "image" => "/img/news/005.jpg",
                "title" => "Дилерская Конференция «Новые горизонты ISUZU»",
                "date" => "17.03.2017"
            ],
            [
                "image" => "/img/news/006.jpg",
                "title" => "АО «ИСУЗУ РУС»: итоги 2016-го года и планы на будущее",
                "date" => "14.02.2017"
            ]
        ];

        return view('front.news.index', ['list' => $list]);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function view($id)
    {

    }
}
