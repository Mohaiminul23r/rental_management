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
            $table->decimal('water_bill', 8, 2)->nullable();
            $table->string('is_wbill_required', 10)->nullable();
            $table->decimal('gas_bill', 8, 2)->nullable();
            $table->string('is_gbill_required', 10)->nullable();
            $table->decimal('service_charge', 8, 2)->nullable();
            $table->decimal('other_charge', 8, 2)->nullable();
            $table->string('electric_meter_no', 100)->nullable();
            $table->string('opening_reading', 15)->nullable();
            $table->decimal('fix_ebill_amount', 8, 2)->nullable();
            $table->string('is_ebill_fixed', 10)->nullable();
            $table->unsignedTinyInteger('status')->default('1');
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
