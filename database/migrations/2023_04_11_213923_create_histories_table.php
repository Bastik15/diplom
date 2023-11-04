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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('partner_id')->nullable();
            $table->unsignedBigInteger('worker_id')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->integer('amount');
            $table->integer('remainder');
            $table->unsignedBigInteger('type_id');
            $table->timestamps();

            $table->index('user_id', 'history_user_idx');
            $table->index('partner_id', 'history_partner_idx');
            $table->index('worker_id', 'history_worker_idx');
            $table->index('product_id', 'history_product_idx');
            $table->index('type_id', 'history_type_idx');

            $table->foreign('user_id', 'history_user_fk')->on('users')->references('id');
            $table->foreign('partner_id', 'history_partner_fk')->on('partners')->references('id');
            $table->foreign('worker_id', 'history_worker_fk')->on('workers')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id', 'history_product_fk')->on('products')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('type_id', 'history_type_fk')->on('transaction_types')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
