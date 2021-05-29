<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('order_detailID')->nullable();
            $table->integer('orderID')->nullable();
            $table->integer('productID')->nullable();
            $table->integer('LensID')->nullable();
            $table->integer('Quantity')->nullable();
            $table->float('price_total')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orderdetails');
    }
}
