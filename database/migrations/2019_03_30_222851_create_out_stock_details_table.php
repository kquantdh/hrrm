<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutStockDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('out_stock_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('out_stock_id');
            $table->string('barcode');
            $table->integer('user_id');
            $table->integer('out_quantity');
            $table->string('status');
            $table->string('location');
            $table->string('remark')->nullable($value=true);
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
        Schema::dropIfExists('out_stock_details');
    }
}
