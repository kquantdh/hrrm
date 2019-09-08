<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFujiServiceTimeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuji_service_time_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fuji_service_id');
            $table->datetime('date_time_sr_start')->nullable($value=true);
            $table->datetime('date_time_sr_end')->nullable($value=true);
            $table->datetime('date_time_1_from')->nullable($value=true);
            $table->datetime('date_time_1_to')->nullable($value=true);
            $table->datetime('date_time_2_from')->nullable($value=true);
            $table->datetime('date_time_2_to')->nullable($value=true);
            $table->datetime('date_time_3_from')->nullable($value=true);
            $table->datetime('date_time_3_to')->nullable($value=true);
            $table->datetime('date_time_4_from')->nullable($value=true);
            $table->datetime('date_time_4_to')->nullable($value=true);
            $table->datetime('date_time_5_from')->nullable($value=true);
            $table->datetime('date_time_5_to')->nullable($value=true);
            $table->datetime('date_time_6_from')->nullable($value=true);
            $table->datetime('date_time_6_to')->nullable($value=true);
            $table->datetime('date_time_7_from')->nullable($value=true);
            $table->datetime('date_time_7_to')->nullable($value=true);
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
        Schema::dropIfExists('fuji_service_time_details');
    }
}
