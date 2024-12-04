<?php

namespace App\Http\Controllers;

use App\Models\Kasi;
use App\Models\SuratKeteranganUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SuratKeteranganUsahaController extends Controller
{
    public function create()
    {
        $kasis = Kasi::all();
        return view('Staff.surat_keterangan_usaha.index', compact('kasis'));
    }

    public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'agama' => 'required|string|max:255',
        'pekerjaan' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'usaha' => 'required|string|max:255',
        'modal_usaha' => 'required|numeric',
        'alamat_usaha' => 'required|string|max:255',
        'rt' => 'required|string|max:255',
        'no_sk_rt' => 'required|string|max:255',
        'tanggal_sk' => 'required|date',
        'nomor_surat' => 'required|string|max:255',
        'tanggal_surat' => 'required|date',
        'kasi_id' => 'required|exists:kasis,id',
    ]);

    // Simpan ke database
    try {
        SuratKeteranganUsaha::create($validatedData);
        return redirect()->route('Staff.surat_keterangan_usaha.index')->with('success', 'Surat Keterangan Usaha berhasil dibuat.');
    } catch (\Exception $e) {
        Log::error('Gagal menyimpan data ke database: ' . $e->getMessage());
        return back()->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
    }
}

}
