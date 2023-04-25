<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->double('price',20,2)->nullable();
            $table->integer('discount')->nullable();
            $table->string('quantity')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->default(1);
            $table->integer('product_type')->default(1);
            $table->integer('product_color_id')->nullable();
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
        Schema::dropIfExists('products');
    }
}
