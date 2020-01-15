<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumn2InRentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('renters', function (Blueprint $table) {
            $table->string('first_name')->nullable()->change();
            $table->unsignedBigInteger('renter_type_id')->nullable()->change();
            $table->unsignedSmallInteger('status')->default('1')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('renters', function (Blueprint $table) {
            $table->string('first_name')->nullable(false)->change();
            $table->unsignedBigInteger('renter_type_id')->nullable(false)->change();
            $table->unsignedSmallInteger('status')->default('1')->nullable(false)->change();
        });
    }
}
