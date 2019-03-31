<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('out_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('return_user_id')->nullable($value=true);
            $table->date('return_date')->nullable($value=true);
            $table->date('out_date')->nullable($value=true);
            $table->integer('customer_id');
            $table->string('type_form');
            $table->text('remark')->nullable($value=true);
            $table->integer('loan_date_no');
            $table->integer('status');

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
        Schema::dropIfExists('out_stocks');
    }
}
