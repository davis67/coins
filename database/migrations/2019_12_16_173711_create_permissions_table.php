<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('canCreateOpportunity')->default(false);
            $table->boolean('canEditOpportunity')->default(false);
            $table->boolean('canIndexOpportunity')->default(false);
            $table->boolean('canDeleteOpportunity')->default(false);
            $table->boolean('canCreateContact')->default(false);
            $table->boolean('canEditContact')->default(false);
            $table->boolean('canIndexContact')->default(false);
            $table->boolean('canDeleteContact')->default(false);
            $table->string("user_id");
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
        Schema::dropIfExists('permissions');
    }
}
