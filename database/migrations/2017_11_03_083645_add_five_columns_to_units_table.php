<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFiveColumnsToUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('units', function (Blueprint $table) {
            $table->decimal('unit_expenses',11,2)->nullable()->default(0);
            $table->decimal('garden_maintenance_expenses',11,2)->nullable()->default(0);
            $table->decimal('staff_housing_expenses',11,2)->nullable()->default(0);
            $table->decimal('debt_benefits',11,2)->nullable()->default(0);
            $table->decimal('balances_of_previous_years',11,2)->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('units', function (Blueprint $table) {
            $table->dropColumn('unit_expenses');
            $table->dropColumn('garden_maintenance_expenses');
            $table->dropColumn('staff_housing_expenses');
            $table->dropColumn('debt_benefits');
            $table->dropColumn('balances_of_previous_years');
        });
    }
}
