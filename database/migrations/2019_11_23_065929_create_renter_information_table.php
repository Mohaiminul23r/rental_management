<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenterInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renter_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('renter_name', 100)->nullable();
            $table->string('father_name', 100)->nullable();
            $table->string('mother_name', 100)->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone_no', 25)->unique()->nullable();
            $table->string('mobile_no', 25)->unique()->nullable();
            $table->unsignedBigInteger('nid_no')->unique()->nullable();
            $table->string('nationality')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('occupation')->nullable();
            $table->string('present_address', 250)->nullable();
            $table->string('permanent_address', 250)->nullable();
            $table->string('gender')->nullable();
            $table->unsignedBigInteger('renter_type_id')->nullable();
            $table->unsignedTinyInteger('status')->nullable();
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
        Schema::dropIfExists('renter_information');
    }
}
