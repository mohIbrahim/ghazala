<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EntryStickersForCars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_stickers_for_cars', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('car_owner')->nullable();
            $table->dateTime('release_date');
            $table->string('plate_number')->nullable();
            $table->string('the_manufacture_company')->nullable();
            $table->string('type')->nullable();
            $table->string('model')->nullable();
            $table->string('color')->nullable();
            $table->boolean('status')->nullable();
            $table->text('comments')->nullable();
            $table->integer('creator_user_id')->unsigned();
            $table->integer('owner_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entry_stickers_for_cars');
    }
}
