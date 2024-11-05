<?php

namespace App\Http\Controllers;
use App\Models\Kasi;
use App\Models\SuratKeteranganUsaha;
use Illuminate\Http\Request;
use App\Models\SuratSequence;

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
    $request->validate([
        'nama' => 'required|string',
        'jenis_kelamin' => 'required|string',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'agama' => 'required|string',
        'pekerjaan' => 'required|string',
        'alamat' => 'required|string',
        'usaha' => 'required|string',
        'modal_usaha' => 'required|numeric',
        'alamat_usaha' => 'required|string',
        'rt' => 'required|integer',
        'tanggal_sk' => 'required|date',
        'kasi_id' => 'required|exists:kasis,id',
    ]);

    // Cari atau buat sequence untuk jenis_surat dan rt
    $sequence = SuratSequence::firstOrCreate(
        ['jenis_surat' => 'keterangan_usaha', 'rt' => $request->rt],
        ['last_number' => 0]
    );

    // Pastikan sequence di-refresh untuk mendapatkan `last_number` terbaru
    $sequence->refresh();
    $sequence->last_number += 1;  // Tambah nomor sequence yang ada
    $sequence->save();

    // Format nomor SK sesuai nomor terbaru yang diambil
    $no_sk_rt = sprintf("%02d/%s/KEL-TLI", $sequence->last_number, $request->rt);

    // Simpan data surat keterangan usaha ke database
    SuratKeteranganUsaha::create([
        'nama' => $request->nama,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'agama' => $request->agama,
        'pekerjaan' => $request->pekerjaan,
        'alamat' => $request->alamat,
        'usaha' => $request->usaha,
        'modal_usaha' => $request->modal_usaha,
        'alamat_usaha' => $request->alamat_usaha,
        'rt' => $request->rt,
        'no_sk_rt' => $no_sk_rt,
        'tanggal_sk' => $request->tanggal_sk,
        'kasi_id' => $request->kasi_id,
    ]);

    return redirect()->route('Staff.surat_keterangan_usaha.index')->with('success', 'Surat berhasil dibuat.');
}



}
