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
         $request->validate([
             'nama' => 'required|string|max:255',
             'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
             'pekerjaan' => 'nullable|string|max:255',
             'alamat' => 'nullable|string|max:255',
         ]);
 
         $surat = SuratKeteranganTidakMampu::findOrFail($id);
         $surat->update($request->only('nama', 'jenis_kelamin', 'pekerjaan', 'alamat'));
 
         return redirect()->route('Staff.riwayat.tidak_mampu')
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
         $request->validate([
             'nama' => 'required|string|max:255',
             'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
             'pekerjaan' => 'nullable|string|max:255',
             'alamat' => 'nullable|string|max:255',
         ]);
 
         $suratt = SuratKeteranganUsaha::findOrFail($id);
         $suratt->update($request->only('nama', 'jenis_kelamin', 'pekerjaan', 'alamat'));
 
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
        ]);

        $surattt = SuratKeteranganKematian::findOrFail($id);
        $surattt->update($request->only('nama', 'jenis_kelamin', 'pekerjaan', 'alamat'));

        return redirect()->route('Staff.riwayat.kematian')
                         ->with('success', 'Data surat berhasil diperbarui.');
    }

    
    public function destroyKematian($id)
    {
        $surattt = SuratKeteranganTidakMampu::findOrFail($id);
        $surattt->delete();

        return redirect()->route('Staff.riwayat.kematian')
                         ->with('success', 'Surat berhasil dihapus.');
    }
}
