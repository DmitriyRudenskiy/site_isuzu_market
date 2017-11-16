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
                "title" => "Малотоннажные (Elf)"
            ],
            [
                "id" => 2,
                "position" => 20,
                "title" => "Среднетоннажные (Forward)"
            ],
            [
                "id" => 3,
                "position" => 30,
                "title" => "Тяжелая серия (GIGA)"
            ]

        ];
    }
}