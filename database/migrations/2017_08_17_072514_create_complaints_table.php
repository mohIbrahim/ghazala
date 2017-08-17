<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->increments('id');
            $table->string('complainant_name');
            $table->string('complainant_phone');
            $table->text('title')->nullable();
            $table->text('subject')->nullable();
            $table->text('details')->nullable();
            $table->string('status')->nullable();
            $table->string('complaint_section')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->text('comments')->nullable();
            $table->timestamps();

            $table->integer('unit_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
}
