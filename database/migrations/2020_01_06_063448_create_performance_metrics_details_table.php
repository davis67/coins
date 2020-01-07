<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformanceMetricsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_metrics_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->string('measurement');
            $table->string('target_performance');
            $table->string('self_assessment');
            $table->string('supervisor_assessment');
            $table->integer("meatpartone_id");
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
        Schema::dropIfExists('performance_metrics_details');
    }
}
