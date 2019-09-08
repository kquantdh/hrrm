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
            $table->integer('entry')->nullable($value=true);
            $table->integer('discount')->nullable($value=true);
            $table->integer('discount_part')->nullable($value=true);
            $table->float('normal_hrs')->nullable($value=true);
            $table->float('night_hrs')->nullable($value=true);
            $table->float('off_hrs')->nullable($value=true);
            $table->float('holiday_hrs')->nullable($value=true);
            $table->integer('person_amount')->nullable($value=true);
            $table->text('problem')->nullable($value=true);
            $table->text('countermeasure')->nullable($value=true);
            $table->text('countermeasure_report')->nullable($value=true);
            $table->text('fmv_note')->nullable($value=true);
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
            $table->text('job_subject')->nullable($value=true);
            $table->integer('transfer_head_time')->nullable($value=true);
            $table->string('engineer_name')->nullable($value=true);
            $table->float('addition_fee_amount')->nullable($value=true);
            $table->float('head_charge')->nullable($value=true);
            $table->float('transport_head_price')->nullable($value=true);
            $table->float('part_amount_jpy')->nullable($value=true);
            $table->float('part_amount_usd')->nullable($value=true);
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
