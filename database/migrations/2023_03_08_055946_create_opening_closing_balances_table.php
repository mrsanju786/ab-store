<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpeningClosingBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opening_closing_balances', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->timestamp('login_time')->nullable();
            $table->timestamp('logout_time')->nullable();
            $table->double('opening_balance', 9, 2)->nullable();
            $table->double('op_coupon', 9, 2)->nullable();
            $table->double('op_coin', 9, 2)->nullable();
            $table->double('op_cash', 9, 2)->nullable();
            $table->double('closing_balance', 9, 2)->nullable();
            $table->double('cl_coupon', 9, 2)->nullable();
            $table->double('cl_coin', 9, 2)->nullable();
            $table->double('cl_cash', 9, 2)->nullable();
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
        Schema::dropIfExists('opening_closing_balances');
    }
}
