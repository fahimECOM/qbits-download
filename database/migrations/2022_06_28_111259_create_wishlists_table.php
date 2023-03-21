<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->integer('product_id')->nullable();
            $table->double('unite_price',8,2)->nullable();
            $table->double('tax')->nullable();
            $table->double('shipping_cost')->nullable();
            $table->string('shipping_type')->nullable();
            $table->double('discount',8,2)->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('default_quantity')->default('1');
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
        Schema::dropIfExists('wishlists');
    }
}
