<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilityBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utility_bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('active_renter_id')->nullable();
            $table->decimal('house_rent', 8, 2)->nullable();
            $table->decimal('electric_bill', 8, 2)->nullable();
            $table->decimal('water_bill', 8, 2)->nullable();
            $table->decimal('gas_bill', 8, 2)->nullable();
            $table->decimal('internet_bill', 8, 2)->nullable();
            $table->decimal('service_charge', 8, 2)->nullable();
            $table->decimal('other_charge', 8, 2)->nullable();
            $table->decimal('total_monthly_rent', 8, 2)->nullable();
            $table->unsignedTinyInteger('status')->default('1');
            $table->foreign('active_renter_id')->references('id')->on('active_renters')->onDelete('cascade');
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
        Schema::dropIfExists('utility_bills');
    }
}
