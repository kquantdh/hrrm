<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInStockDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_stock_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('in_stock_id');
            $table->integer('number');
            $table->string('barcode');
            $table->string('part_id');
            $table->string('part_name');
            $table->string('belongto');
            $table->integer('qty');
            $table->integer('balance');
            $table->string('location');
            $table->string('thumbnail')->nullable($value=true);
            $table->string('detail_stk')->nullable($value=true);
            $table->boolean('is_deleted')->nullable($value=true);
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
        Schema::dropIfExists('in_stock_details');
    }
}
