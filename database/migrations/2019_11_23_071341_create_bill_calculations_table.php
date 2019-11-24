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
            $table->unsignedBigInteger('renter_id')->nullable(); 
            $table->unsignedBigInteger('apartment_id')->nullable();  
            $table->unsignedBigInteger('shop_id')->nullable(); 
            $table->decimal('utility_bills', 8, 2)->nullable(); 
            $table->date('billing_month')->nullable();  
            $table->decimal('total_amount', 8, 2)->nullable();
            $table->foreign('renter_id')->references('id')->on('renters');
            $table->foreign('apartment_id')->references('id')->on('apartments');
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
