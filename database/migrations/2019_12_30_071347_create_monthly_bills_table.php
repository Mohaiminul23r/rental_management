<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bill_no')->nullable();
            $table->unsignedBigInteger('active_renters_id')->nullable();
            $table->year('billing_year')->nullable();
            $table->string('billing_month', 12)->nullable();
            $table->float('unit_rate', 8, 2)->nullable();
            $table->float('present_reading', 8, 2)->nullable();
            $table->float('consumed_unit', 8, 2)->nullable();
            $table->float('electric_bill', 8, 2)->nullable();
            $table->float('principle_amount', 8, 2)->nullable();
            $table->float('service_charge', 8, 2)->nullable();
            $table->date('date_of_issue')->nullable();
            $table->date('last_payment_date')->nullable();
            $table->float('total_ebill', 8, 2)->nullable();
            $table->float('gas_bill', 8, 2)->nullable();
            $table->float('water_bill', 8, 2)->nullable();
            $table->float('rent_bill', 8, 2)->nullable();
            $table->float('vat_amount', 8, 2)->nullable();
            $table->float('grand_total', 8, 2)->nullable();
            $table->date('payment_date')->nullable();
            $table->float('paid_amount', 8, 2)->nullable();
            $table->float('due_amount', 8, 2)->nullable();
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
        Schema::dropIfExists('monthly_bills');
    }
}
