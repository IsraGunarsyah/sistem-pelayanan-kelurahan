<?php
namespace App\Http\Controllers;

use App\Models\Kasi;
use App\Models\SuratKeteranganKematian;
use App\Models\SuratSequence; // Model untuk mengelola sequence nomor SK per RT dan jenis surat
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
        // Validasi input termasuk nama pelapor dan hubungan
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'pekerjaan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'hari_kematian' => 'nullable|string|max:255',
            'tanggal_kematian' => 'nullable|date',
            'tempat_kematian' => 'nullable|string|max:255',
            'sebab_kematian' => 'nullable|string|max:255',
            'rt' => 'required|integer',
            'tanggal_sk' => 'required|date',
            'kasi_id' => 'required|exists:kasis,id',
            'nama_pelapor' => 'required|string|max:255',
            'hubungan' => 'required|string|max:255'
        ]);

        // Generate nomor SK berdasarkan RT dan jenis surat
        $rt = $request->input('rt');
        $jenisSurat = 'keterangan_kematian';
        $no_sk_rt = $this->generateNoSkRt($rt, $jenisSurat);
        $validatedData['no_sk_rt'] = $no_sk_rt;

        // Simpan data ke database
        try {
            SuratKeteranganKematian::create($validatedData);
            return redirect()->route('Staff.surat_keterangan_kematian.index')->with('success', 'Surat Keterangan Kematian berhasil dibuat.');
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
