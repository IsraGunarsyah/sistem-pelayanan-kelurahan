<?php

namespace App\Http\Controllers;
use App\Models\SuratSequence;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function generateNoSkRt($rt, $type)
    {
        // Ambil data sequence berdasarkan jenis surat dan RT
        $sequence = SuratSequence::where('jenis_surat', $type)
                                  ->where('rt', $rt)
                                  ->first();
    
        // Cek apakah sequence ada atau belum
        if ($sequence) {
            $nextNumber = $sequence->last_number + 1;  // Increment dari last_number yang ada
        } else {
            $nextNumber = 1;  // Jika belum ada sequence, mulai dari 1
        }
    
        // Format nomor SK
        $no_sk_rt = sprintf("%02d/%s/KEL-TLI", $nextNumber, $rt);
    
        return response()->json(['no_sk_rt' => $no_sk_rt]);
    }
    


}
