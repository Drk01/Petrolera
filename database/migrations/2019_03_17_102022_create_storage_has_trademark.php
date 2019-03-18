<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorageHasTrademark extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage_trademark', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('storage_id')->unsigned();
            $table->bigInteger('trademark_id')->unsigned();
            $table->timestamps();

            $table->engine = 'InnoDB';

            $table->foreign('storage_id')->references('id')->on('storage')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('trademark_id')->references('id')->on('trademark')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storage_trademark');
    }
}
