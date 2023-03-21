<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkdSerialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skd_serials', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ens_id')->nullable();
            $table->string('flow_type')->nullable();
            $table->string('skd_serial')->nullable();
            $table->string('skd_brand')->nullable();
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
        Schema::dropIfExists('skd_serials');
    }
}