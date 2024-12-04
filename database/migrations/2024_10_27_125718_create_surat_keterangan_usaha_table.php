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
        Schema::create('surat_keterangan_usaha', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('usaha');
            $table->decimal('modal_usaha', 15, 2);
            $table->string('alamat_usaha');
            $table->string('rt');
            $table->string('no_sk_rt');
            $table->date('tanggal_sk');
            $table->string('nomor_surat');
            $table->date('tanggal_surat');
            $table->unsignedBigInteger('kasi_id');
            $table->foreign('kasi_id')->references('id')->on('kasis');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keterangan_usaha');
    }
};
