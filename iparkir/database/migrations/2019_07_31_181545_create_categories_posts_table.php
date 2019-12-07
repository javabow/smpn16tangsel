<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('categories_posts', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('id_posts');
          $table->unsignedInteger('id_categories');
          $table->timestamps();

          $table->foreign('id_posts')->references('id')->on('posts')->onDelete('cascade');
          $table->foreign('id_categories')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
