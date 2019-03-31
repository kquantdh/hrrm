<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFujiServiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuji_service_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fuji_service_id');
            $table->string('part_id');
            $table->string('name');
            $table->float('price');
            $table->integer('quantity');
            $table->string('vn_name')->nullable($value=true);
            $table->string('location')->nullable($value=true);

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
        Schema::dropIfExists('fuji_service_details');
    }
}
