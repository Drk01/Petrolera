<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkStorageHasTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('storage_type', function (Blueprint $table) {
            $table->foreign('storage_id')->references('id')->on('storage')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('type_id')->references('id')->on('type')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('storage_type', function (Blueprint $table) {
            //
        });
    }
}
