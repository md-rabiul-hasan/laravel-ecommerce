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
            $table->unsignedBigInteger('user_id');            
            $table->double('total_order', 20, 2)->default(0.00);
            $table->double('delivery_charge', 10,2)->default(0.00);
            $table->double('total_bill', 20, 2)->default(0.00);
            $table->enum('payment_mode', ['cash_on_delivery']);
            $table->text('shipment_addess');
            $table->integer('status')->default(0)->comment('0: order pending, 1: order shipped, 2: order deliveried, 3: order canceled');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
