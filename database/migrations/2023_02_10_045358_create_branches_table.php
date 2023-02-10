<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('branch_code');
            $table->string('branch_manager');
            $table->string('contact_number');
            $table->integer('is_active')->default('1')->comment('1=active, 0=deactive');
            $table->integer('branch_serving')->nullable()->comment('1st 0=breakfast, 2nd 0=lunch, 3rd 0=snacks, 4th 0=dinner');
            $table->integer('serving_type')->nullable()->comment('1st 0=veg, 2nd 0=nonveg, 3rd 0=bevarage');
            $table->integer('region_id');
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
        Schema::dropIfExists('branches');
    }
}
