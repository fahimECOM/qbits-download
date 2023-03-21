<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('coupon_name')->nullable();
            $table->string('ocation_name')->nullable()->comment('ex: summer15');
            $table->string('types')->nullable()->comment('1 = global , 0= local');
            $table->string('coupon_amount')->nullable();
            $table->string('min_order_amount')->nullable();
            $table->date('start_at');
            $table->date('end_at');
            $table->string('coupon_types')->nullable()->comment('1 = amount , 0= %');
            $table->string('coupon_status')->nullable()->comment('1 = active , 0= inactive');
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
        Schema::dropIfExists('coupons');
    }
}
