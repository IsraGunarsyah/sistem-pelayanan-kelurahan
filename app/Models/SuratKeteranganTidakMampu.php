<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeteranganTidakMampu extends Model
{
    use HasFactory;

    protected $table = 'surat_keterangan_tidak_mampu';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'pekerjaan',
        'alamat',
        'status',
        'nama_keluarga',
        'jenis_kelamin_keluarga',
        'tanggal_lahir_keluarga',
        'tempat_lahir_keluarga',
        'pekerjaan_keluarga',
        'alamat_keluarga',
        'rt',
        'no_sk_rt',
        'tanggal_sk',
        'keterangan',
        'keperluan',
        'nomor_surat',
        'tanggal_surat',
        'kasi_id'
    ];
    
    

    public function kasi()
{
    return $this->belongsTo(Kasi::class, 'kasi_id');
}
}
