<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeteranganKematian extends Model
{
    use HasFactory;

    protected $table = 'surat_keterangan_kematian';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'pekerjaan',
        'alamat',
        'hari_kematian',
        'tanggal_kematian',
        'tempat_kematian',
        'sebab_kematian',
        'rt',
        'no_sk_rt',
        'tanggal_sk',
        'nomor_surat', 
        'nama_pelapor', 
        'hubungan',     
        'kasi_id',
    ];
    

    public function kasi()
    {
        return $this->belongsTo(Kasi::class);
    }
}
