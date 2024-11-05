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
        Schema::create('surat_keterangan_tidak_mampu', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir'); // Menambahkan kolom tempat lahir
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('status');
            $table->string('nama_keluarga');
            $table->string('jenis_kelamin_keluarga');
            $table->string('tempat_lahir_keluarga');
            $table->date('tanggal_lahir_keluarga');
            $table->string('pekerjaan_keluarga');
            $table->string('alamat_keluarga');
            $table->string('rt');
            $table->string('no_sk_rt');
            $table->date('tanggal_sk');
            $table->string('keterangan');
            $table->string('keperluan');
            $table->date('tanggal_surat');
            $table->unsignedBigInteger('kasi_id'); // ID dari tabel Kasi
            $table->timestamps();

            $table->foreign('kasi_id')->references('id')->on('kasis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keterangan_tidak_mampu');
    }
};
