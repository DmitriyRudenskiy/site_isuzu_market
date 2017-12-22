<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('type_id')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->boolean('visible')->default(true);
            $table->integer('priority')->default(10);

            $table->integer('price');
            $table->integer('ton');
            $table->string('title');
            $table->text('description');
            $table->string('cover')->nullable();

            $table->boolean('in_stock')->default(true);
            $table->string('size_small');
            $table->string('size_big');

            $table->foreign('type_id')->references('id')->on('car_types');
            $table->foreign('category_id')->references('id')->on('car_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
