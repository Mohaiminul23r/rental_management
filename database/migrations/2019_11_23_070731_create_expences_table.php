<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('apartment_id')->nullable();
            $table->unsignedBigInteger('shop_id')->nullable();
            $table->string('description')->nullable();
            $table->date('expence_month')->nullable();
            $table->decimal('expence_amount', 8, 2)->nullable();
            $table->unsignedTinyInteger('status')->default('1');
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
        Schema::dropIfExists('expences');
    }
}
