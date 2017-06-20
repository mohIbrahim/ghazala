<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentingContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renting_contracts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->dateTime('from')->nullable();
            $table->dateTime('to')->nullable();
            $table->string('soft_copy')->nullable();
            $table->string('comments')->nullable();
            $table->integer('creator_user_id')->unsigned();
            $table->integer('renter_id')->unsigned();
            $table->integer('unit_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renting_contracts');
    }
}
