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
        Schema::create('surat_sequences', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_surat'); // jenis surat, misalnya 'keterangan_usaha'
            $table->integer('rt'); // RT dari surat
            $table->integer('last_number')->default(0); // nomor urut terakhir untuk kombinasi jenis surat dan RT
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_sequences');
    }
};
