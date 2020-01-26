<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartoneassessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partoneassessments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('self_assessment');
            $table->string('supervisor_assessment');
            $table->integer("performance_metrics_id");
            $table->integer("dimension_id");
            $table->integer("user_id");
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
        Schema::dropIfExists('partoneassessments');
    }
}
