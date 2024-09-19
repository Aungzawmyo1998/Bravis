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
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('co_id')->nullable();

            $table->foreign('co_id')
                    ->references('id')
                    ->on('customer_orders') // Parent table
                    ->onDelete('cascade'); //

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
             // Drop the foreign key constraint
             $table->dropForeign(['customer_id']);

             // Drop the column
             $table->dropColumn('customer_id');
        });
    }
};
