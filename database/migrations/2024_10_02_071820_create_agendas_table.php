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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('restrict');
            $table->string('nama_kegiatan');           // Kolom untuk nama kegiatan
            $table->text('deskripsi_singkat')->nullable(); // Kolom untuk deskripsi singkat
            $table->date('tanggal_kegiatan');          // Kolom untuk tanggal kegiatan
            $table->time('time_start')->nullable();    // Kolom untuk waktu mulai
            $table->time('time_end')->nullable();      // Kolom untuk waktu selesai
            $table->boolean('is_done')->default(false);
            $table->timestamps();
        });
    }   

    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
