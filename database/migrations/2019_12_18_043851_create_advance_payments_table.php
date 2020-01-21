<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvancePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advance_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('renter_information_id')->nullable();
            $table->unsignedBigInteger('complex_id')->nullable();
            $table->unsignedBigInteger('shop_id')->nullable();
            $table->decimal('payment_amount', 8, 2);
            $table->date('date_of_payment')->nullable();
            $table->unsignedTinyInteger('status')->default('1');
            $table->foreign('renter_information_id')->references('id')->on('renter_information');
            $table->foreign('complex_id')->references('id')->on('complexes');
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
        Schema::dropIfExists('advance_payments');
    }
}
