<?php

namespace App\Http\Controllers;

use App\Models\Kasi;
use App\Models\SuratKeteranganTidakMampu;
use App\Models\SuratSequence; // Model untuk mengelola sequence nomor SK per RT dan jenis surat
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
        // Validasi semua input termasuk tempat_lahir_keluarga
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
            'rt' => 'required|integer',
            'tanggal_sk' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'keperluan' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'kasi_id' => 'required|exists:kasis,id'
        ]);

        // Sequence Nomor SK berdasarkan RT dan jenis surat
        $rt = $request->input('rt');
        $jenisSurat = 'keterangan_tidak_mampu';
        $no_sk_rt = $this->generateNoSkRt($rt, $jenisSurat);

        // Tambahkan nomor SK ke data yang akan disimpan
        $validatedData['no_sk_rt'] = $no_sk_rt;

        // Simpan data ke database
        try {
            SuratKeteranganTidakMampu::create($validatedData);
            return redirect()->route('Staff.surat_keterangan_tidak_mampu.index')->with('success', 'Surat Keterangan Tidak Mampu berhasil dibuat.');
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan surat: ' . $e->getMessage());
            return back()->with('error', 'Gagal menyimpan data surat. Silakan coba lagi.');
        }
    }

    // Fungsi untuk menghasilkan nomor SK berdasarkan RT dan jenis surat
    private function generateNoSkRt($rt, $jenisSurat)
    {
        // Cek sequence nomor SK berdasarkan RT dan jenis surat
        $sequence = SuratSequence::firstOrCreate(
            ['rt' => $rt, 'jenis_surat' => $jenisSurat],
            ['last_number' => 0]
        );

        // Pastikan sequence di-refresh untuk mendapatkan `last_number` terbaru
        $sequence->refresh();
        $sequence->last_number += 1;  // Tambah nomor sequence yang ada
        $sequence->save();

        // Format nomor SK sesuai nomor terbaru yang diambil
        return sprintf("%02d/%s/KEL-TLI", $sequence->last_number, $rt);
    }
}
