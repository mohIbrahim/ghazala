<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->increments('id');
            $table->text('name')->unique();
            $table->text('slug')->unique();
            $table->string('ssn')->unique()->nullable();

            $table->dateTime('date_of_birth')->nullable();
            $table->string('mobile_1')->nullable();
            $table->string('mobile_2')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('work_email')->nullable();
            $table->text('contact_person_name')->nullable();
            $table->strings('contact_person_phone')->nullable();
            $table->text('address')->nullable();
            $table->string('occupation')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('personal_image')->default('no_image.png');
            $table->string('contract_image')->nullable();
            $table->dateTime('contract_date')->nullable();
            $table->string('owner_status')->nullable();
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
        Schema::dropIfExists('owners');
    }
}
