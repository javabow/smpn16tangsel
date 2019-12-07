<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsPromoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants_promo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->date('promo_date');
            $table->date('promo_end_date');
            $table->longText('description')->nullable();
            $table->longText('more_info')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('tenants_promo');
    }
}
