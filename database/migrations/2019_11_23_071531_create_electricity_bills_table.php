<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectricityBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electricity_bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bill_type_id')->nullable();
            $table->decimal('minimum_unit', 8, 2)->nullable();  
            $table->decimal('duty_on_kwh', 8, 2)->nullable();  
            $table->decimal('demand_charge', 8, 2)->nullable();  
            $table->decimal('machine_charge', 8, 2)->nullable();  
            $table->decimal('service_charge', 8, 2)->nullable();  
            $table->decimal('vat', 8, 2)->nullable();  
            $table->decimal('delay_charge', 8, 2)->nullable();  
            $table->unsignedTinyInteger('status')->default('1');
            $table->foreign('bill_type_id')->references('id')->on('bill_types');
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
        Schema::dropIfExists('electricity_bills');
    }
}
