<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnerUnitPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_unit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned()->indexed();
            $table->integer('unit_id')->unsigned()->indexed();
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('owner_unit');
    }
}
