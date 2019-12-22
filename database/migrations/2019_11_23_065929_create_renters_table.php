<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('photo')->default('images/no_image1.png')->nullable();
            $table->string('nid_photo')->default('images/no_image2.png')->nullable();
            $table->string('phone', 25)->unique()->nullable();
            $table->string('mobile', 25)->unique()->nullable();
            $table->unsignedBigInteger('nid_no')->unsigned()->unique();
            $table->string('gender')->nullable();
            $table->unsignedBigInteger('renter_type_id');
            $table->unsignedTinyInteger('status')->default('1');
            $table->foreign('address_id')->references('id')->on('addresses');
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
        Schema::dropIfExists('renters');
    }
}
