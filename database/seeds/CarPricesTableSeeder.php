<?php

use Illuminate\Database\Seeder;

class CarPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filename = storage_path('import/price_002.csv');

        if (!file_exists($filename)) {
            throw new RuntimeException();
        }

        $file = new SplFileObject($filename);
        $file->setFlags(SplFileObject::READ_CSV);

        foreach ($file as $row) {
            $this->add($row);
        }
    }

    protected function add($row)
    {
        if (empty($row[2])) {
            return null;
        }

        $data = [
            "type_id" => (int)$row[0],
            "base_id" => (int)$row[1],
            "price" => (int)$row[2],
        ];

        $model = new \App\Entities\Car\Prices();
        $model->fill($data);
        $model->save();

        return $model;
    }
}