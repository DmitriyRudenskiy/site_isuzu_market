<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Entities\TypeParametersInterface;

class CreateProductsLabelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_label', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_id')->unsigned();
            $table->boolean('visible')->default(false);
            $table->integer('priority')->default(10);
            $table->integer('type_id')->default(TypeParametersInterface::TYPE_LIST);
            $table->integer('is_small')->default(false);
            $table->string('name');
            $table->string('label');
            $table->timestamps();

            $table->foreign('site_id')->references('id')->on('sites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_label');
    }
}
