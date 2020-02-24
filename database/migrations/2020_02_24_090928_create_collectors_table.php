<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collectors', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('collectorID',25)->nullable();
            $table->string('collector_name', 100)->nullable();
            $table->string('father_name', 100)->nullable();
            $table->string('mother_name', 100)->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('contact_no', 50)->unique()->nullable();
            $table->unsignedBigInteger('nid_no')->unique()->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('present_address', 250)->nullable();
            $table->string('permanent_address', 250)->nullable();
            $table->string('gender')->nullable();
            $table->unsignedTinyInteger('status')->dafault('0')->nullable();
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
        Schema::dropIfExists('collectors');
    }
}
