<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('dish_id');
            $table->integer('dish_variant_id');
            $table->double('dish_variant_price', 9,2);
            $table->string('dish_name');
            $table->integer('order_quantity');
            $table->integer('order_status')->default(0);
            $table->integer('cd_status')->default(0);
            $table->double('dish_price', 9,2);
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
        Schema::dropIfExists('order_details');
    }
}
