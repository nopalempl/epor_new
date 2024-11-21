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
        Schema::create('kelurahan', function (Blueprint $table) {
            $table->id();
            $table->char('kd_kecamatan',20);
            $table->char('kd_kelurahan',20)->unique();
            $table->string('nm_kelurahan');
            $table->timestamps();


            
            $table->foreign('kd_kecamatan')
                  ->references('kd_kecamatan')
                  ->on('kecamatan')
                  ->onDelete('cascade')  
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelurahan');
    }
};
