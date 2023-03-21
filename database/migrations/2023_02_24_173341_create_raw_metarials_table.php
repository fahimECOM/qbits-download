<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawMetarialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_metarials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('series_id')->nullable();
            $table->string('model')->nullable();
            $table->string('processor')->nullable();
            $table->string('skd_metarials')->nullable()->comment('Ram, SSD');
            $table->string('skd_type')->nullable()->comment('Ram=DDR4, SSD=M2');
            $table->string('skd_size')->nullable()->comment('RAM=4,8,16, SSD=256,512,1');
            $table->string('skd_others')->nullable()->comment('RAM=Bus Speed, SSD=M.2 Type');
            $table->string('brand')->nullable();
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
        Schema::dropIfExists('raw_metarials');
    }
}
