<?php

namespace App\Http\Controllers;

use App\Models\Kasi;
use App\Models\SuratKeteranganKematian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SuratKeteranganKematianController extends Controller
{
    public function create()
    {
        $kasis = Kasi::all();
        return view('Staff.surat_keterangan_kematian.index', compact('kasis'));
    }

    public function store(Request $request)
{
    // Logging data untuk debugging
    Log::info('Input data:', $request->all());

    // Validasi input
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'pekerjaan' => 'nullable|string|max:255',
        'alamat' => 'nullable|string|max:255',
        'hari_kematian' => 'nullable|string|max:255',
        'tanggal_kematian' => 'nullable|date',
        'tempat_kematian' => 'nullable|string|max:255',
        'sebab_kematian' => 'nullable|string|max:255',
        'rt' => 'required|string|max:255',
        'no_sk_rt' => 'required|string|max:255',
        'tanggal_sk' => 'required|date',
        'nomor_surat' => 'required|string|max:255', // Validasi nomor surat
        'kasi_id' => 'required|exists:kasis,id',
        'nama_pelapor' => 'required|string|max:255',
        'hubungan' => 'required|string|max:255',
    ]);

    // Simpan data ke database
    try {
        SuratKeteranganKematian::create($validatedData);
        Log::info('Data berhasil disimpan ke database.');
        return redirect()->route('Staff.surat_keterangan_kematian.index')->with('success', 'Surat Keterangan Kematian berhasil dibuat.');
    } catch (\Exception $e) {
        Log::error('Gagal menyimpan data ke database: ' . $e->getMessage());
        return back()->with('error', 'Gagal menyimpan data surat. Silakan coba lagi.');
    }
}

}
