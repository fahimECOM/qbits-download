<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('table_name')->nullable();
            $table->integer('table_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->string('status')->nullable();
            $table->string('ens_id')->nullable();
            $table->string('flow_type')->nullable();
            $table->string('journal')->nullable();
            $table->string('action')->nullable();
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
        Schema::dropIfExists('all_histories');
    }
}