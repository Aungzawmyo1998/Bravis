<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('order_products')) {
            Schema::create('order_products', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')->references('id')->on('products');
                $table->unsignedBigInteger('order_id');
                $table->foreign('order_id')->references('id')->on('orders');
                // $table->integer('qty'); delete row

                $table->integer('small_qty'); // update row
                $table->integer('median_qty'); // update row
                $table->integer('large_qty'); // update row
                $table->float('price');
                $table->string('uuid');
                $table->string('status');
                $table->timestamps();
            });
        }
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
