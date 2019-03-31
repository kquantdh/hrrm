<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('inv_no');
            $table->string('po_no');
            $table->text('remark')->nullable($value=true);
            $table->date('in_date');
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
        Schema::dropIfExists('in_stocks');
    }
}
