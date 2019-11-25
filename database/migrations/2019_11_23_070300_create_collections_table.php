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
            $table->unsignedBigInteger('active_renter_id')->nullable();
            $table->date('collection_mohth')->nullable();
            $table->double('total_collection', 8, 2)->nullable();
            $table->double('due_collection',8, 2)->nullable();
            $table->dateTime('collected_at')->nullable();
            $table->unsignedTinyInteger('status')->default('1');
            $table->foreign('active_renter_id')->references('id')->on('active_renters');
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
