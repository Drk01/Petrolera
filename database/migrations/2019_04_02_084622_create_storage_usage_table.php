<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorageUsageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage_usage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('storage_id')->unsigned();
            $table->bigInteger('usage_id')->unsigned();
            $table->timestamps();

            $table->engine = 'InnoDB';

            $table->foreign('storage_id')->references('id')->on('storage')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('usage_id')->references('id')->on('usage')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storage_usage');
    }
}
