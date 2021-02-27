<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectedBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collected_bills', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->unsignedBigInteger('customer_id');
            $table->bigInteger('available_balance')->default(0);
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->integer('total_amount');
            $table->date('bill_Start');
            $table->date('bill_end');
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
        Schema::dropIfExists('collected_bills');
    }
}
