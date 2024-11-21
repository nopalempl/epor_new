<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabel menus
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id'); // Menu ID
            $table->string('name'); // Nama menu
            $table->string('slug')->unique(); // Slug untuk mempermudah identifikasi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
