<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFujiServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuji_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->integer('job_type');
            $table->string('quotation')->nullable($value=true);
            $table->string('po')->nullable($value=true);
            $table->string('sr_no')->nullable($value=true);
            $table->string('invoice')->nullable($value=true);
            $table->integer('head_type_id');
            $table->string('head_serial')->nullable($value=true);
            $table->string('nature_service');
            $table->string('status')->nullable($value=true);
            $table->integer('entry');
            $table->integer('discount');
            $table->integer('discount_part');
            $table->float('normal_hrs');
            $table->float('night_hrs');
            $table->float('off_hrs');
            $table->float('holiday_hrs');
            $table->integer('person_amount');
            $table->text('problem')->nullable($value=true);
            $table->text('countermeasure')->nullable($value=true);
            $table->date('stock_recieve_date')->nullable($value=true);
            $table->date('inspection_done_date')->nullable($value=true);
            $table->date('start_inspection_date')->nullable($value=true);
            $table->date('sent_quotation_date')->nullable($value=true);
            $table->date('got_po_date')->nullable($value=true);
            $table->date('got_part_date')->nullable($value=true);
            $table->date('repair_done_date')->nullable($value=true);
            $table->date('delevery_date')->nullable($value=true);
            $table->float('part_amount')->nullable($value=true);
            $table->float('service_amount')->nullable($value=true);
            $table->boolean('is_viewed')->nullable($value=true);



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
        Schema::dropIfExists('fuji_services');
    }
}
