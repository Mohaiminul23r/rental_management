<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_calculations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('active_renter_id')->nullable(); 
            $table->unsignedBigInteger('apartment_id')->nullable();  
            $table->unsignedBigInteger('shop_id')->nullable(); 
            $table->unsignedBigInteger('bill_type_id')->nullable();
            $table->unsignedBigInteger('water_bill_id')->nullable(); 
            $table->unsignedBigInteger('gas_bill_id')->nullable(); 
            $table->unsignedBigInteger('electricity_bill_id')->nullable(); 
            $table->decimal('service_charge', 8, 2)->nullable(); 
            $table->date('billing_month')->nullable();  
            $table->decimal('total_amount', 8, 2)->nullable();
            $table->foreign('active_renter_id')->references('id')->on('active_renters');
            $table->foreign('apartment_id')->references('id')->on('apartments');
            $table->foreign('bill_type_id')->references('id')->on('bill_types');
            $table->foreign('water_bill_id')->references('id')->on('water_bills');
            $table->foreign('gas_bill_id')->references('id')->on('gas_bills');
            $table->foreign('electricity_bill_id')->references('id')->on('electricity_bills');
            $table->foreign('shop_id')->references('id')->on('shops');
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
        Schema::dropIfExists('bill_calculations');
    }
}
