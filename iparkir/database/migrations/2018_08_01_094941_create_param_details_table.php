<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParamDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('param_details', function (Blueprint $table) {
          $table->string('id');
          $table->string('description');
          $table->string('id_params');

          $table->timestamps();
          $table->primary('id');

          $table->foreign('id_params')->references('id')->on('params');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('param_details');
    }
}
