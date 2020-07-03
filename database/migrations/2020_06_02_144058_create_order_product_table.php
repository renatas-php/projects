<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('set null');

            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('set null');

            $table->integer('qty')->unsigned();
            $table->string('product_name')->unsigned()->nullable();
            $table->foreign('product_name')->references('name')->on('products')->onUpdate('cascade')->onDelete('set null');

            $table->string('product_price')->unsigned()->nullable();
            $table->foreign('product_price')->references('price')->on('products')->onUpdate('cascade')->onDelete('set null');

            $table->string('product_img')->unsigned()->nullable();
            $table->string('product_img')->refernces('image')->on('products')->onUpdate('cascade')->onDelete('set null');

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
        Schema::dropIfExists('order_product');
    }
}
