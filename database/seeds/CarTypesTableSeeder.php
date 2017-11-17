<?php

use Illuminate\Database\Seeder;

class CarTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getData() as $value) {
            $model = new \App\Entities\Car\Types();
            $model->fill($value);
            $model->save();
        }
    }

    protected function getData()
    {
        return [
            [
                "id" => 1,
                "visible" => false,
                "position" => 10,
                "image" => "/img/configurator/types/1.png",
                "title" => "Пикап"
            ],
            [
                "id" => 2,
                "visible" => true,
                "position" => 20,
                "image" => "/img/configurator/types/2.png",
                "title" => "Шасси"
            ],
            [
                "id" => 3,
                "visible" => true,
                "position" => 30,
                "image" => "/img/configurator/types/3.png",
                "title" => "Фургон промтоварный"
            ],
            [
                "id" => 4,
                "visible" => false,
                "position" => 40,
                "image" => "/img/configurator/types/4.png",
                "title" => "Фургон рефрижераторный"
            ],
            [
                "id" => 5,
                "visible" => true,
                "position" => 50,
                "image" => "/img/configurator/types/5.png",
                "title" => "Изотермический фургон"
            ],
            [
                "id" => 6,
                "visible" => true,
                "position" => 60,
                "image" => "/img/configurator/types/6.png",
                "title" => "Открытый бортовой<br> автомобиль"
            ],
            [
                "id" => 7,
                "visible" => true,
                "position" => 70,
                "image" => "/img/configurator/types/7.png",
                "title" => "Тентованный бортовой<br> автомобиль"
            ],
            [
                "id" => 8,
                "visible" => true,
                "position" => 80,
                "image" => "/img/configurator/types/8.png",
                "title" => "Бортовой автомобиль с КМУ"
            ],
            [
                "id" => 9,
                "visible" => true,
                "position" => 90,
                "image" => "/img/configurator/types/9.png",
                "title" => "Автоэвакуатор"
            ],
            [
                "id" => 10,
                "visible" => true,
                "position" => 100,
                "image" => "/img/configurator/types/10.png",
                "title" => "Автогидроподъемник"
            ],
            [
                "id" => 11,
                "visible" => false,
                "position" => 110,
                "image" => "/img/configurator/types/11.png",
                "title" => "Мусоровоз"
            ],
            [
                "id" => 12,
                "visible" => false,
                "position" => 120,
                "image" => "/img/configurator/types/12.png",
                "title" => "Автоцистерна"
            ],
            [
                "id" => 13,
                "visible" => false,
                "position" => 130,
                "image" => "/img/configurator/types/13.png",
                "title" => "Автобетоносмеситель"
            ],
            [
                "id" => 14,
                "visible" => true,
                "position" => 140,
                "image" => "/img/configurator/types/14.png",
                "title" => "Самосвал"
            ],
            [
                "id" => 15,
                "visible" => false,
                "position" => 150,
                "image" => "/img/configurator/types/15.png",
                "title" => "Мультилифт / Бункеровоз"
            ],
            [
                "id" => 16,
                "visible" => true,
                "position" => 160,
                "image" => "/img/configurator/types/16.png",
                "title" => "Седельный тягач"
            ]
        ];
    }
}
