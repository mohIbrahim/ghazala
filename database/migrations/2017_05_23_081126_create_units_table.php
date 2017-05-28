<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->increments('id');
            $table->string('code')->unique();
            $table->integer('model_id')->unsigned();

            $table->boolean('for_sale')->nullable()->nullable();
            $table->text('sale_details')->nullable();
            $table->string('sale_price')->nullable();

            $table->boolean('for_rent')->nullable();
            $table->timestamp('rent_from')->nullable();
            $table->timestamp('rent_to')->nullable();
            $table->string('rent_price')->nullable();
            $table->text('rent_details')->nullable();
            
            $table->string('unit_account_code')->unique()->nullable();
            $table->string('direction')->nullable();
            $table->string('floor_number')->nullable();
            $table->string('electricity_meter_number')->unique()->nullable();
            $table->text('comments')->nullable();
            $table->integer('creator_user_id')->unsigned();
            
            $table->timestamps();
            $table->foreign('model_id')->references('id')->on('unit_models');

            




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
