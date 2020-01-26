<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParttwoPerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parttwo_performances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->integer("meatparttwo_id");
            $table->string('opportunity');
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
        Schema::dropIfExists('parttwo_performances');
    }
}
