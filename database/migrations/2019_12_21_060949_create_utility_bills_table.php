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
            $table->unsignedBigInteger('bill_type_id')->nullable();
            $table->decimal('amount', 8, 2)->nullable();
            $table->foreign('active_renter_id')->references('id')->on('active_renters')->onDelete('cascade');
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
        Schema::dropIfExists('utility_bills');
    }
}
