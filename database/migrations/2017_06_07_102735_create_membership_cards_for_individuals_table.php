<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipCardsForIndividualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_cards_for_individuals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial');
            $table->string('type');
            $table->dateTime('release_date');
            $table->boolean('status')->default(0);
            $table->boolean('delivered')->default(0);
            $table->dateTime('delivered_date');
            $table->text('comments');
            $table->integer('owner_id')->unsigned();
            $table->integer('creator_user_id')->unsigned();
            $table->timestamps();
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membership_cards_for_individuals');
    }
}
