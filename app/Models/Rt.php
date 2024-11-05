<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    use HasFactory;

    protected $table = 'rts';

    protected $fillable = [
        'rt',
        'nama',
        'alamat',
        'no_telpon',
        'email',
        'jenis_kelamin',
    ];
}
