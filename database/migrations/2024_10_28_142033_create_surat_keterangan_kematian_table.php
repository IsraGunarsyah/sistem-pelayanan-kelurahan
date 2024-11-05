<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeteranganKematianTable extends Migration
{
    public function up()
    {
        Schema::create('surat_keterangan_kematian', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('pekerjaan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('hari_kematian')->nullable();
            $table->date('tanggal_kematian')->nullable();
            $table->string('tempat_kematian')->nullable();
            $table->string('sebab_kematian')->nullable();
            $table->integer('rt');
            $table->string('no_sk_rt');
            $table->date('tanggal_sk');
            $table->string('nama_pelapor'); // Kolom untuk nama pelapor
            $table->string('hubungan'); // Kolom untuk hubungan dengan yang meninggal
            $table->unsignedBigInteger('kasi_id');
            $table->foreign('kasi_id')->references('id')->on('kasis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_keterangan_kematian');
    }
}
