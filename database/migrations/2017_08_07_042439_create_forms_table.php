<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_id')->unsigned();
            $table->boolean('visible')->default(false);
            $table->boolean('in_modal')->default(false);
            $table->string('form_title')->nullable();
            $table->text('form_description')->nullable();
            $table->string('name_label')->nullable();
            $table->string('phone_label')->nullable();
            $table->string('name_placeholder')->nullable();
            $table->string('phone_placeholder')->nullable();
            $table->string('button_title')->nullable();
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
        Schema::dropIfExists('forms');
    }
}
