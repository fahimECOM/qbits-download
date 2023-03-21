<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinishInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finish_inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rq_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('rq_serial_no')->nullable();
            $table->string('product_type')->nullable();
            $table->string('product_series')->nullable();
            $table->integer('quantity')->nullable();
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

            $table->integer('skd_stockout_needed_confirm')->default(0);
            $table->integer('skd_stockout_total_confirmed')->default(0);
            $table->string('skd_stockout_needed_confirm_ids')->nullable();
            $table->string('skd_stockout_confirmed_ids')->nullable();
            $table->integer('skd_stockout_needed_verify')->default(0);
            $table->integer('skd_stockout_total_verified')->default(0);
            $table->string('skd_stockout_needed_verify_ids')->nullable();
            $table->string('skd_stockout_verified_ids')->nullable();

            $table->integer('product_stockin_needed_confirm')->default(0);
            $table->integer('product_stockin_total_confirmed')->default(0);
            $table->string('product_stockin_needed_confirm_ids')->nullable();
            $table->string('product_stockin_confirmed_ids')->nullable();
            $table->integer('product_stockin_needed_verify')->default(0);
            $table->integer('product_stockin_total_verified')->default(0);
            $table->string('product_stockin_needed_verify_ids')->nullable();
            $table->string('product_stockin_verified_ids')->nullable();

            $table->longText('skd_serials')->nullable();
            $table->integer('rq_frm_scan_status')->default(0);
            $table->longText('comment')->nullable();
            $table->integer('status')->default(1)->comment('1 = rq_create, 2 = rq_reject, 3 = rq_building_queue, 4 = rq_stocking_queue, 5 = rq_inventory');
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
        Schema::dropIfExists('finish_inventories');
    }
}
