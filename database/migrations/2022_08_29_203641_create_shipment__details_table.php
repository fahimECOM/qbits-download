<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment__details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shipping_service_name')->nullable();
            $table->string('tracking_number')->nullable();
            $table->string('invoice_number')->nullable();
            $table->date('shipping_date');
            $table->integer('customer_id')->nullable();
            $table->integer('admin_id')->nullable();
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
        Schema::dropIfExists('shipment__details');
    }
}
