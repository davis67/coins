<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeatpartfoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meatpartfours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_description');
            $table->string('part');
            $table->string('project_code');
            $table->integer('serviceline_id');
            $table->integer('team_id');
            $table->date('day_of_week');
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
        Schema::dropIfExists('meatpartfours');
    }
}
