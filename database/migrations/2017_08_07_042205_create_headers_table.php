<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_id')->unsigned();
            $table->boolean('visible')->default(false);
            $table->string('bg')->nullable();
            $table->string('title');
            $table->string('sub_title');
            $table->text('description')->nullable();
            $table->string('button')->nullable();
            $table->string('button_url')->nullable();
            $table->string('add_1')->nullable();
            $table->string('add_2')->nullable();
            $table->string('add_3')->nullable();
            $table->string('pic_1')->nullable();
            $table->string('pic_2')->nullable();
            $table->string('pic_3')->nullable();
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
        Schema::dropIfExists('headers');
    }
}
