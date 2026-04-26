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
        Schema::create('kehadiran', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kegiatan_id')
                ->constrained('kegiatan')
                ->onDelete('cascade');

            $table->string('nama');
            $table->string('jabatan');
            $table->string('tim');
            $table->longText('tanda_tangan');
            $table->dateTime('waktu_absen');

            $table->timestamps();

            $table->unique(['kegiatan_id', 'nama']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehadiran');
    }
};
