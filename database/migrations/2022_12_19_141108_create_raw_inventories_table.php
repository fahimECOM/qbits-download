<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ens_id')->nullable();
            $table->string('purchase_id')->nullable();
            $table->string('product_type')->nullable();
            $table->integer('qantity')->nullable();
            $table->string('ram_type')->nullable();
            $table->string('ram_brand')->nullable();
            $table->string('ram_size')->nullable();
            $table->string('bus_speed')->nullable();
            $table->string('ssd_type')->nullable();
            $table->string('m2_type')->nullable();
            $table->string('ssd_brand')->nullable();
            $table->string('ssd_size')->nullable();
            $table->string('bb_type')->nullable();
            $table->string('bb_model')->nullable();
            $table->string('bb_brand')->nullable();
            $table->string('bb_processor')->nullable();
            $table->string('flow_type')->nullable();
            $table->string('store_location')->nullable();
            $table->integer('needed_confirm')->default(0);
            $table->integer('total_confirmed')->default(0);
            $table->string('needed_confirm_ids')->nullable();
            $table->string('confirmed_ids')->nullable();
            $table->integer('needed_verify')->default(0);
            $table->integer('total_verified')->default(0);
            $table->string('needed_verify_ids')->nullable();
            $table->string('verified_ids')->nullable();
            $table->longText('comment')->nullable();
            $table->integer('status')->default(0);
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('raw_inventories');
    }
}