<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->increments('id');
            $table->timestamps();
            $table->integer('productID')->nullable();
            $table->integer('producttypeID')->nullable();
            $table->integer('bandID')->nullable();
            $table->string('productname')->nullable();
            $table->integer('stock')->nullable();
            $table->float('price')->nullable();
            $table->string('image')->nullable();
            $table->integer('Likes')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
