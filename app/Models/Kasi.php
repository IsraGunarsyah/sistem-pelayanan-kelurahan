<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasi extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'jabatan', 'nip'];
}
