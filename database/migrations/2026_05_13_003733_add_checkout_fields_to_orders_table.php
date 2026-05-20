<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->text('address')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('shipping_courier')->nullable();
            $table->integer('shipping_cost')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn([
                'address',
                'payment_method',
                'shipping_courier',
                'shipping_cost'
            ]);
        });
    }
};
