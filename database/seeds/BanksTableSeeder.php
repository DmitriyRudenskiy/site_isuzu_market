<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getData() as $value) {
            $model = new \App\Entities\Banks();
            $model->fill($value);
            $model->save();
        }
    }

    protected function getData()
    {
        return [
            [
                "id" => 1,
                "title" => "Сбербанк",
                "image" => "/img/bank/logo_103.jpg",
                "precent" => 6.5
            ],
            [
                "id" => 2,
                "title" => "Балтийский лизинг",
                "image" => "/img/bank/logo_102.jpg",
                "precent" => 7.7
            ],
            [
                "id" => 3,
                "title" => "Siemens",
                "image" => "/img/bank/logo_101.jpg",
                "precent" => 8.5
            ],
            [
                "id" => 4,
                "title" => "Европлан",
                "image" => "/img/bank/logo_104.jpg",
                "precent" => 8
            ],
            [
                "id" => 5,
                "title" => "ВТБ",
                "image" => "/img/bank/logo_105.jpg",
                "precent" => 7
            ]
        ];
    }
}
