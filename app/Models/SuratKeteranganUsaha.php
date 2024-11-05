<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeteranganUsaha extends Model
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'surat_keterangan_usaha';

    // Kolom yang dapat diisi
    protected $fillable = [
        'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 
        'agama', 'pekerjaan', 'alamat', 'usaha', 'modal_usaha', 
        'alamat_usaha', 'rt', 'no_sk_rt', 'tanggal_sk', 'kasi_id'
    ];

    // Relasi ke model Kasi
    public function kasi()
    {
        return $this->belongsTo(Kasi::class);
    }
}
