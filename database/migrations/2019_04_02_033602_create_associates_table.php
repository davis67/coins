<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssociatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('associate_name')->unique();
            $table->string('associate_gender');
            $table->string('associate_email')->unique();
            $table->string('associate_country');
            $table->string('associate_phone');
            $table->string('associate_phone1')->nullable();
            $table->date('date_enrolled')->nullable();
            $table->string('expertise_id');
            $table->unsignedBigInteger('specialization_id');
            $table->string('associate_experience');
            $table->string('created_by');
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('associates');
    }
}
