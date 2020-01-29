<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('active_renters_id')->nullable();
            $table->unsignedBigInteger('utility_bill_id')->nullable();
            $table->unsignedBigInteger('bill_type_id')->nullable();
            $table->year('billing_year')->nullable();
            $table->string('billing_month', 12)->nullable();
            $table->decimal('total_monthly_rent', 8, 2)->nullable();
            $table->decimal('paid_amount', 8, 2)->nullable();
            $table->decimal('due_amount', 8, 2)->nullable();
            $table->date('payment_date')->nullable();
            $table->integer('collection_slip_no')->unique()->nullable();
            $table->unsignedTinyInteger('status')->default('0');
            $table->foreign('active_renters_id')->references('id')->on('active_renters');
            $table->foreign('utility_bill_id')->references('id')->on('utility_bills');
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
        Schema::dropIfExists('collections');
    }
}
