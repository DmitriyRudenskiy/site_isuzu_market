<?php

use Illuminate\Database\Seeder;

class CarBasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getData() as $value) {
            $model = new \App\Entities\Car\Bases();
            $model->fill($value);
            $model->save();
        }
    }

    protected function getData()
    {
        return [
            [
                "id" => 1,
                "category_id" => 1,
                "position" => 10,
                "title" => "ELF 3.5 (NMR85E) Полная масса 3.5 т",
                "code" => "NMR85E",
                "mass" => 3.5
            ],
            [
                "id" => 2,
                "category_id" => 1,
                "position" => 20,
                "title" => "ELF 3.5 (NMR85H) Полная масса 3.5 т",
                "code" => "NMR85H",
                "mass" => 3.5
            ],
            [
                "id" => 3,
                "category_id" => 1,
                "position" => 30,
                "title" => "ELF 5.2 (NMR85H) Полная масса 5.2 т",
                "code" => "NMR85H",
                "mass" => 5.2
            ],
            [
                "id" => 4,
                "category_id" => 1,
                "position" => 40,
                "title" => "ELF 7.5 (NPR75) Полная масса 7.5 т",
                "code" => "NPR75",
                "mass" => 7.5
            ],
            [
                "id" => 5,
                "category_id" => 1,
                "position" => 50,
                "title" => "ELF 9.5 (NQR90) Полная масса 9.5 т",
                "code" => "NQR90",
                "mass" => 9.5
            ],
            [
                "id" => 6,
                "category_id" => 1,
                "position" => 60,
                "title" => "ELF 7.5 4x4 (NPS75L) Полная масса 7.5 т Евро-5",
                "code" => "NPS75L",
                "mass" => 7.5
            ],
            [
                "id" => 7,
                "category_id" => 2,
                "position" => 70,
                "title" => "FORWARD 12.0 (FSR90) Полная масса 12 т",
                "code" => "FSR90",
                "mass" => 12
            ],
            [
                "id" => 8,
                "category_id" => 2,
                "position" => 80,
                "title" => "FORWARD 18.0 (FVR34) Полная масса 18 т",
                "code" => "FVR34",
                "mass" => 18
            ],
            [
                "id" => 9,
                "category_id" => 3,
                "position" => 70,
                "title" => "GIGA 6x4 Шасси, полная масса 33 т Евро-5",
                "code" => "6x4",
                "mass" => 33
            ],
            [
                "id" => 10,
                "category_id" => 3,
                "position" => 80,
                "title" => "GIGA 6x4 Шасси, полная масса 48630 кг Евро-5",
                "code" => "6x4",
                "mass" => 48.6
            ],
        ];
    }
}