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
        Schema::create('data_fakultas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_fakultas')->unique()->default('1');
            $table->string('nama_fakultas');
            $table->string('dekan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_fakultas');
    }
};
