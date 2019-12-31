<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToMonthlyBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monthly_bills', function (Blueprint $table) {
            $table->foreign('active_renters_id')->references('id')->on('active_renters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monthly_bills', function (Blueprint $table) {
            $table->dropForeign('active_renters_id');
        });
    }
}
