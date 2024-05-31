<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('products', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');

        //     $table->unsignedBigInteger('category_id');
        //     $table->foreign('category_id')->references('id')->on('categories');

        //     $table->unsignedBigInteger('admin_id');
        //     $table->foreign('admin_id')->references('id')->on('admins');

        //     $table->unsignedBigInteger('supplier_id');      /*update */
        //     $table->foreignId('supplier_id')->references('id')->on('suppliers');    /*update */

        //     $table->float('price');
        //     // $table->unsignedBigInteger('size_id');
        //     // $table->foreign('size_id')->references('id')->on('sizes');

        //     $table->integer('small_qty');   /*update */
        //     $table->integer('medium_qty');  /*update */
        //     $table->integer('large_qty');   /*update */

        //     // $table->integer('stock');
        //     $table->string('gender');
        //     $table->string('description');
        //     $table->string('image');    /*update */
        //     $table->string('uuid');
        //     $table->string('status');
        //     $table->timestamps();
        // });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            // Remove the duplicate supplier_id
            // $table->unsignedBigInteger('supplier_id'); // This is the duplicate line
            $table->float('price');
            $table->integer('small_qty');
            $table->integer('medium_qty');
            $table->integer('large_qty');
            $table->string('gender');
            $table->string('description');
            $table->string('image');
            $table->string('uuid');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
