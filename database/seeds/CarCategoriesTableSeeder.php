<?php

use Illuminate\Database\Seeder;

class CarCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getData() as $value) {
            $model = new \App\Entities\Car\Categories();
            $model->fill($value);
            $model->save();
        }
    }

    protected function getData()
    {
        return [
            [
                "id" => 1,
                "position" => 10,
                "title" => "Elf",
                "description" => "Малотоннажные",
                "image" => "/img/configurator/chassis/NMR_Chassis_2.jpg"
            ],
            [
                "id" => 2,
                "position" => 20,
                "title" => "Forward",
                "description" => "Среднетоннажные",
                "image" => "/img/configurator/chassis/SAM_1459.jpg"
            ],
            [
                "id" => 3,
                "position" => 30,
                "title" => "GIGA",
                "description" => "Тяжелая серия",
                "image" => "/img/configurator/chassis/giga_white.jpg"
            ]

        ];
    }
}