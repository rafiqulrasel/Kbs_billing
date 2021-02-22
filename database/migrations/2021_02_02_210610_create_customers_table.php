<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("building_id");
            $table->string("floor_id");
            $table->string("room_id");
            $table->string("name")->nullable();
            $table->string("mobile")->nullable();
            $table->string("email")->nullable();
            $table->integer("package_id");
            $table->date("start_date");
            $table->date("next_recurring");
            $table->string("price");
            $table->boolean("active_status");
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
        Schema::dropIfExists('customers');
    }
}
