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
            $table->unsignedBigInteger('co_id')->nullable()->after('customer_id'); // Add the column if it doesn't exist

            // Add foreign key constraint
            $table->foreign('co_id')
                    ->references('id')
                    ->on('customer_orders')
                    ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            Schema::table('orders', function (Blueprint $table) {
                $table->dropForeign(['co_id']);
                $table->dropColumn('co_id');
            });
        });
    }
};
