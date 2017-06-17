<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renters', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('ssn')->unique()->nullable();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('mobile_1')->nullable();
            $table->string('mobile_2')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('occupation')->nullable();
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
        Schema::dropIfExists('renters');
    }
}
