<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('country');
            $table->string('photo_path');
            $table->timestamps();

            $table->index('product_id', 'product_information_product_idx');
            $table->foreign('product_id', 'product_information_product_fk')->on('products')->references('id')->onUpdate('cascade')->onDelete('cascade');
        });

        DB::table('product_information')->insert([
            [
                'product_id' => 1,
                'country' => 'Китай',
                'photo_path' => '/storage/products/images/1.png',
            ],
            [
                'product_id' => 2,
                'country' => 'Китай',
                'photo_path' => '/storage/products/images/2.jpg',
            ],
            [
                'product_id' => 3,
                'country' => 'Китай',
                'photo_path' => '/storage/products/images/3.jpg',
            ],
            [
                'product_id' => 4,
                'country' => 'Китай',
                'photo_path' => '/storage/products/images/4.jpg',
            ],
            [
                'product_id' => 5,
                'country' => 'Китай',
                'photo_path' => '/storage/products/images/5.jpg',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_information');
    }
};
