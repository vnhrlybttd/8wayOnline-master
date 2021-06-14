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
            $table->string('full_name');
            $table->string('email');
            $table->string('street_address');
            $table->string('phone_number')->nullable();
            $table->string('comments')->nullable();
            $table->integer('payment_method');
            $table->integer('delivery_options');
            $table->integer('order_status');
            $table->integer('invoice_status');
            $table->integer('payment_status');
            $table->integer('delivery_status');
            $table->date('ship_date')->nullable();
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
