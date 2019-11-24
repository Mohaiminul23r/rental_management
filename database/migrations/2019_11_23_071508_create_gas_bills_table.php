<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGasBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gas_bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('apartment_id')->nullable();
            $table->unsignedBigInteger('shop_id')->nullable();
            $table->unsignedBigInteger('bill_type_id')->nullable();
            $table->date('billing_month')->nullable();
            $table->decimal('amount', 8, 2)->nullable();
            // $table->dateTime('started_form')->nullable();
            // $table->dateTime('ended_at')->nullable();
            $table->foreign('apartment_id')->references('id')->on('apartments');
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('bill_type_id')->references('id')->on('bill_types');
            $table->unsignedTinyInteger('status')->default('1');
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
        Schema::dropIfExists('gas_bills');
    }
}
