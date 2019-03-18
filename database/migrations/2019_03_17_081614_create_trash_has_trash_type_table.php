<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrashHasTrashTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trash_trashType', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('trash_id')->unsigned();
            $table->bigInteger('trashType_id')->unsigned();
            $table->timestamps();

            $table->foreign('trash_id')->references('id')->on('trash')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('trashType_id')->references('id')->on('trashType')->onDelete('cascade');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trash_trashType');
    }
}
