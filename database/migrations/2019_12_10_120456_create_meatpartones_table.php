<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeatpartonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meatpartones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('part');
            $table->string('perfomance_metrix');
            $table->string('weight');
            $table->string('perfomance_area');
            $table->string('description');
            $table->string('measurement');
            $table->string('target_perfomance');
            $table->string('self_assessment');
            $table->string('supervisor_assessment');
            $table->string('score');
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
        Schema::dropIfExists('meatpartones');
    }
}
