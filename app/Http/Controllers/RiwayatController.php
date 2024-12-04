<?php
namespace App\Http\Controllers;
use App\Models\SuratKeteranganTidakMampu;
use App\Models\SuratKeteranganUsaha;
use App\Models\SuratKeteranganKematian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class RiwayatController extends Controller
{
    public function index()
    {
        return view('Staff.riwayat.index');
    }
// tidak mampu
    public function tidakmampu()
    {

        $tidakmampuu = SuratKeteranganTidakMampu::with('kasi')->get();
        return view ('Staff.riwayat.tidak_mampu', compact('tidakmampuu'));

    }
    
    public function cetakPdf($id)
    {
        $surat = SuratKeteranganTidakMampu::findOrFail($id);

        $pdf = PDF::loadView('Staff.riwayat.pdf.surat_tidak_mampu', compact('surat'));
        return $pdf->download('Surat_Keterangan_Tidak_Mampu_'.$surat->nama.'.pdf');
    }

     
    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'tempat_lahir' => 'nullable|string|max:255',
        'tanggal_lahir' => 'nullable|date',
        'pekerjaan' => 'nullable|string|max:255',
        'alamat' => 'nullable|string|max:255',
        'nama_keluarga' => 'nullable|string|max:255',
        'jenis_kelamin_keluarga' => 'nullable|in:Laki-laki,Perempuan',
        'tempat_lahir_keluarga' => 'nullable|string|max:255',
        'tanggal_lahir_keluarga' => 'nullable|date',
        'pekerjaan_keluarga' => 'nullable|string|max:255',
        'alamat_keluarga' => 'nullable|string|max:255',
        'no_sk_rt' => 'nullable|string|max:255',
        'rt' => 'nullable|string|max:255',
        'tanggal_sk' => 'nullable|date',
        'tanggal_surat' => 'nullable|date',
        'keperluan' => 'nullable|string|max:255',
        'keterangan' => 'nullable|string',
    ]);

    // Temukan surat berdasarkan ID
    $surat = SuratKeteranganTidakMampu::findOrFail($id);

    // Update data surat
    $surat->update($request->only([
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'pekerjaan',
        'alamat',
        'nama_keluarga',
        'jenis_kelamin_keluarga',
        'tempat_lahir_keluarga',
        'tanggal_lahir_keluarga',
        'pekerjaan_keluarga',
        'alamat_keluarga',
        'no_sk_rt',
        'rt',
        'tanggal_sk',
        'tanggal_surat',
        'keperluan',
        'keterangan',
    ]));

    // Redirect kembali ke halaman riwayat dengan pesan sukses
    return redirect()
        ->route('Staff.riwayat.tidak_mampu')
        ->with('success', 'Data surat berhasil diperbarui.');
}

public function destroy($id)
     {
         $surat = SuratKeteranganTidakMampu::findOrFail($id);
         $surat->delete();
 
         return redirect()->route('Staff.riwayat.tidak_mampu')
                          ->with('success', 'Surat berhasil dihapus.');
     }
 

    // usaha
    public function usaha()
    {

        $usahas = SuratKeteranganUsaha::with('kasi')->get();
        return view ('Staff.riwayat.usaha', compact('usahas'));

    }
    
    public function cetakPdfUsaha($id)
    {
        $suratt = SuratKeteranganUsaha::findOrFail($id);
        
        $pdf = PDF::loadView('Staff.riwayat.pdf.surat_usaha', compact('suratt'));
        return $pdf->download('Surat_Keterangan_Usaha_'.$suratt->nama.'.pdf');
    }


    public function updateUsaha(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'agama' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'usaha' => 'nullable|string|max:255',
            'modal_usaha' => 'nullable|numeric',
            'alamat_usaha' => 'nullable|string|max:255',
            'no_sk_rt' => 'nullable|string|max:255',
            'rt' => 'nullable|string|max:10',
            'tanggal_sk' => 'nullable|date',
        ]);
    
        // Temukan data surat berdasarkan ID
        $suratt = SuratKeteranganUsaha::findOrFail($id);
    
        // Perbarui data dengan input dari request
        $suratt->update([
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
            'no_sk_rt' => $request->no_sk_rt,
            'rt' => $request->rt,
            'tanggal_sk' => $request->tanggal_sk,
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('Staff.riwayat.usaha')
                         ->with('success', 'Data surat berhasil diperbarui.');
    }
    
 
     
     public function destroyUsaha($id)
     {
         $suratt = SuratKeteranganUsaha::findOrFail($id);
         $suratt->delete();
 
         return redirect()->route('Staff.riwayat.usaha')
                          ->with('success', 'Surat berhasil dihapus.');
     }


    
// kematian


    public function kematian()
    {

        $mati = SuratKeteranganKematian::with('kasi')->get();
        return view ('Staff.riwayat.kematian', compact('mati'));

    }
    public function cetakPdfKematian($id)
    {
        $surattt = SuratKeteranganKematian::findOrFail($id);

        $pdf = PDF::loadView('Staff.riwayat.pdf.surat_kematian', compact('surattt'));
        return $pdf->download('Surat_Keterangan_Kematian_'.$surattt->nama.'.pdf');
    }
    

    public function updateKematian(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'pekerjaan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'hari_kematian' => 'nullable|string|max:255',
            'tanggal_kematian' => 'nullable|date',
            'tempat_kematian' => 'nullable|string|max:255',
            'sebab_kematian' => 'nullable|string|max:255',
            'nama_pelapor' => 'nullable|string|max:255',
            'hubungan' => 'nullable|string|max:255',
            'rt' => 'nullable|integer',
            'no_sk_rt' => 'nullable|string|max:255',
            'tanggal_sk' => 'nullable|date',
            
        ]);
    
        $surattt = SuratKeteranganKematian::findOrFail($id);
    
        // Update semua field yang sesuai
        $surattt->update($request->only(
            'nama',
            'jenis_kelamin',
            'pekerjaan',
            'alamat',
            'hari_kematian',
            'tanggal_kematian',
            'tempat_kematian',
            'sebab_kematian',
            'nama_pelapor',
            'hubungan',
            'rt',
            'no_sk_rt',
            'tanggal_sk',
           
        ));
    
        return redirect()->route('Staff.riwayat.kematian')
                         ->with('success', 'Data surat berhasil diperbarui.');
    }
    

    
    public function destroyKematian($id)
    {
        $surattt = SuratKeteranganKematian::findOrFail($id);
        $surattt->delete();

        return redirect()->route('Staff.riwayat.kematian')
                         ->with('success', 'Surat berhasil dihapus.');
    }
}
