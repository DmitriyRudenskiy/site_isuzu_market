<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('visible')->default(false);
            $table->string('name');
            $table->string('comment');
            $table->timestamps();
        });

        DB::table('sites')->insert(
            [
                'id' => 1,
                'visible' => true,
                'name' => 'default',
                'comment' => 'Сайт по умолчанию',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
