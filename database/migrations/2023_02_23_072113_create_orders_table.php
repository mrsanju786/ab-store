<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('order_number');
            $table->integer('user_id');
            $table->integer('order_status')->default(0);
            $table->integer('cd_status')->default(0);
            $table->timestamp('order_date');
            $table->integer('branch_id');
            $table->string('order_through')->nullable();
            $table->double('sub_total',9, 2);
            $table->double('tax_amount',9, 2);
            $table->integer('tax_percent');
            $table->string('discount_name')->nullable();
            $table->string('discount_type')->nullable();
            $table->double('discount_amount',9, 2)->nullable();
            $table->string('mode_of_transaction')->nullable();
            $table->timestamp('payment_timestamp')->nullable();
            $table->integer('order_prepared_by')->nullable();
            $table->timestamp('order_closed_by')->nullable();
            $table->timestamp('order_closed_time')->nullable();
            $table->double('grand_total',9, 2);
            $table->string('invoice_number')->nullable();
            $table->string('paid_or_cancel')->nullable();
            $table->string('refund_through')->nullable();
            $table->string('instruction')->nullable();
            $table->string('transaction_id')->nullable();
            $table->integer('table_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
