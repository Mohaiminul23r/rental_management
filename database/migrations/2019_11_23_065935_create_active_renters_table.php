<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiveRentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_renters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('renter_information_id')->nullable();
            $table->unsignedBigInteger('renter_type_id')->nullable();
            $table->unsignedBigInteger('complex_id')->nullable();
            $table->decimal('advance_paid', 8, 2)->nullable();
            $table->date('rent_started_at')->nullable();
            $table->date('rent_ended_at')->nullable();
            $table->decimal('total_monthly_rent', 8, 2)->nullable();
            $table->unsignedTinyInteger('status')->default('0');
            $table->foreign('renter_information_id')->references('id')->on('renter_information');
            $table->foreign('complex_id')->references('id')->on('complexes');
            $table->foreign('renter_type_id')->references('id')->on('renter_types');
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
        Schema::dropIfExists('active_renters');
    }
}
