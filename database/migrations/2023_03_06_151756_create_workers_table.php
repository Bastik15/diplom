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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->timestamps();
        });

        DB::table('workers')->insert([
            [
                'name' => 'Степан',
                'surname' => 'Сеткин',
                'email' => '1@mail.ru',
            ],
            [
                'name' => 'Владимир',
                'surname' => 'Сводин',
                'email' => '2@mail.ru',
            ],
            [
                'name' => 'Виктор',
                'surname' => 'Овечкин',
                'email' => '3@mail.ru',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
