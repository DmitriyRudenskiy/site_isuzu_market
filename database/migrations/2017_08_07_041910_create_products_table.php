<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Entities\TypeParametersInterface;

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
            $table->integer('site_id')->unsigned();
            $table->boolean('visible')->default(false);
            $table->integer('priority')->default(10);
            $table->integer('type_id')->default(TypeParametersInterface::TYPE_LIST);
            $table->integer('is_small')->default(false);
            $table->string('photo')->nullable();
            $table->text('equipment');
            $table->text('engine');
            $table->text('power');
            $table->text('transmission');
            $table->text('drive_unit');
            $table->text('body_type');
            $table->text('colour');
            $table->text('button')->nullable();
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
        Schema::dropIfExists('products');
    }
}
