<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSerialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_serials', function (Blueprint $table) {
            $table->id();
            $table->string('rq_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('prod_serial')->nullable();
            $table->string('ram_serial')->nullable();
            $table->string('ssd_serial')->nullable();
            $table->string('bb_serial')->nullable();
            $table->integer('building_progress_status')->default(0)->comment('0 = Assemble not start, 1 = Assemble complete, 2 = Lasering complete, 3 = D-Cover complete, 4 = Finalize complete');                  
            $table->string('flow_type')->nullable();
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
        Schema::dropIfExists('product_serials');
    }
}
