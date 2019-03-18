<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanHasLoanStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_loanStatus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_loan')->unsigned();
            $table->bigInteger('id_loanStatus')->unsigned();
            $table->timestamps();

            $table->engine = 'InnoDB';

            $table->foreign('id_loan')->references('id')->on('loans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_loanStatus')->references('id')->on('loanStatus')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_loanStatus');
    }
}
