<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_files', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('name');
            $table->string('mime_type')->nullable();
            $table->string('extension')->nullable();
            $table->bigInteger('size');
            $table->longText('hash')->nullable();
            $table->longText('file_link');
            $table->string('id_param_details');
            $table->unsignedInteger('create_by');
            $table->timestamps();

            $table->foreign('create_by')->references('id')->on('users');
            $table->foreign('id_param_details')->references('id')->on('param_details');

            // $table->unsignedInteger('file_types_id');
            // $table->foreign('file_types_id')->references('id')->on('file_types');
            // $table->increments('id');
            // $table->string('path')->unique();
            // $table->enum('type', ['file', 'dir']);
            // $table->binary('content');
            // $table->integer('size');
            // $table->string('mimetype');
            // $table->integer('timestamp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload_files');
    }
}
