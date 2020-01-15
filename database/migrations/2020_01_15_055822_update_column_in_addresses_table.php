<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnInAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->string('address_line1')->nullable()->change();
            $table->string('postal_code')->nullable()->change(); 
            $table->unsignedBigInteger('city_id')->nullable()->change();
            $table->unsignedBigInteger('thana_id')->nullable()->change();
            $table->unsignedBigInteger('country_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->string('address_line1')->nullable(false)->change();
            $table->string('postal_code')->nullable(false)->change(); 
            $table->unsignedBigInteger('city_id')->nullable(false)->change();
            $table->unsignedBigInteger('thana_id')->nullable(false)->change();
            $table->unsignedBigInteger('country_id')->nullable(false)->change();
        });
    }
}
