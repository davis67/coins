<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeatparttwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meatparttwos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('perfomance_metrix');
            $table->string('code');
            $table->string('opprtunity');
            $table->string('exceptional_tasks_perfomed');
            $table->string('results_achieved');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meatparttwos');
    }
}
