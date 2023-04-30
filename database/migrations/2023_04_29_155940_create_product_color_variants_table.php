<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductColorVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_color_variants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->nullable();
            $table->string('color_name')->nullable();
            $table->string('color_code')->nullable();
            $table->string('color_product_image')->nullable();
            $table->bigInteger('extra_amount')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('product_color_variants');
    }
}
