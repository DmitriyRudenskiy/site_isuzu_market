<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BanksTableSeeder::class,
        CarBasesTableSeeder::class,
        CarCategoriesTableSeeder::class,
        CarPricesTableSeeder::class,
        CarTypesTableSeeder::class
    }
}
