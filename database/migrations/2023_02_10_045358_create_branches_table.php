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
            $table->integer('company_has_region_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('is_pos')->default('0');
            $table->integer('is_sok')->default('0');
            $table->integer('is_qrcode')->default('0');
            $table->integer('is_mobile_ordering')->default('0');
            $table->integer('is_table_room')->default('0');
            $table->integer('country_id')->nullable();
            $table->integer('license_id')->nullable();
            $table->string('license_no')->nullable();
            $table->string('gst_no')->nullable();
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
