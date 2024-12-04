<?php

namespace App\Http\Controllers;

use App\Models\Kasi;
use App\Models\SuratKeteranganTidakMampu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SuratKeteranganTidakMampuController extends Controller
{
    public function create()
    {
        $kasis = Kasi::all();
        return view('Staff.surat_keterangan_tidak_mampu.index', compact('kasis'));
    }

    public function store(Request $request)
    {
        // Validasi semua input termasuk nomor_surat
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'nama_keluarga' => 'required|string|max:255',
            'jenis_kelamin_keluarga' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir_keluarga' => 'required|date',
            'tempat_lahir_keluarga' => 'required|string|max:255',
            'pekerjaan_keluarga' => 'required|string|max:255',
            'alamat_keluarga' => 'required|string|max:255',
            'rt' => 'required|string',
            'no_sk_rt' => 'required|string|max:255',
            'tanggal_sk' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'keperluan' => 'required|string|max:255',
            'nomor_surat' => 'required|string|max:50',
            'tanggal_surat' => 'required|date',
            'kasi_id' => 'required|exists:kasis,id'
        ]);
    
        try {
            // Buat data di database
            SuratKeteranganTidakMampu::create($validatedData);
    
            return redirect()->route('Staff.surat_keterangan_tidak_mampu.index')->with('success', 'Surat Keterangan Tidak Mampu berhasil dibuat.');
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan surat: ' . $e->getMessage());
            return back()->with('error', 'Gagal menyimpan data surat. Silakan coba lagi.');
        }
    }
    
}
