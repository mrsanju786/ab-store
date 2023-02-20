<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_extras', function (Blueprint $table) {
            $table->id();
            $table->string('variant_id')->nullable();
            $table->string('extra_name');
            $table->decimal('extra_price', 9, 2);
            $table->integer('extra_for_all')->default(0);
            $table->integer('dish_id');
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
        Schema::dropIfExists('dish_extras');
    }
}
