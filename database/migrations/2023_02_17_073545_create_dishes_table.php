<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('dish_name');
            $table->decimal('dish_price', 9, 2);
            $table->string('dish_code');
            $table->string('dish_images');
            $table->integer('has_variant')->nullable();
            $table->integer('is_tax_inclusive')->nullable();
            $table->integer('is_discount')->nullable();
            $table->integer('category_id')->nullable();
            $table->timestamp('edited_at')->nullable();
            $table->integer('edited_by')->nullable();
            $table->integer('is_active')->default('1');
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
        Schema::dropIfExists('dishes');
    }
}
