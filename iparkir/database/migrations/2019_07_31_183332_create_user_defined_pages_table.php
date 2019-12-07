<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDefinedPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_defined_pages', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->longText('content');
          $table->string('title_en')->nullable();
          $table->longText('content_en')->nullable();
          $table->string('title_slug');
          $table->integer('likes');
          $table->integer('views');
          $table->unsignedInteger('id_pages');
          $table->unsignedInteger('updated_by');
          $table->unsignedInteger('created_by');
          $table->timestamps();

          $table->foreign('id_pages')->references('id')->on('pages');
          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
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
