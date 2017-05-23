<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_models', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->increments('id');
            $table->string('name');
            $table->string('tatal_area')->nullable();
            $table->string('net_area')->nullable();
            $table->string('number_of_rooms')->nullable();
            $table->string('number_of_floors')->nullable();
            $table->string('number_of_toilets')->nullable();
            $table->string('number_of_balconies')->nullable();
            $table->string('number_of_kitchens')->nullable();
            $table->string('finishing_type')->nullable();
            $table->boolean('garden')->nullable();
            $table->string('garden_area')->nullable();
            $table->boolean('pool')->nullable();
            $table->string('pool_area')->nullable();
            $table->text('comments')->nullable();
            $table->integer('creator_user_id')->unsigned();

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
        Schema::dropIfExists('unit_models');
    }
}
