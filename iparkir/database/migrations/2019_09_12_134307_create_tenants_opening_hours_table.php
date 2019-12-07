<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsOpeningHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants_opening_hours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('day');
            $table->string('open_time');
            $table->string('close_time');
            $table->timestamps();
            $table->unsignedBigInteger('id_tenants');

            $table->foreign('id_tenants')->references('id')->on('tenants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants_opening_hours');
    }
}
