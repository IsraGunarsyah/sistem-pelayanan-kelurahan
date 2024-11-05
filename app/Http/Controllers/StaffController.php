<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rt;
use Carbon\Carbon;
use App\Models\SuratKeteranganTidakMampu;
use App\Models\SuratKeteranganUsaha;
use App\Models\SuratKeteranganKematian;

class StaffController extends Controller{

   public function index()
   {
    // Total surat hari ini
    $totalSuratHariIni = SuratKeteranganKematian::whereDate('created_at', Carbon::today())->count() +
                         SuratKeteranganTidakMampu::whereDate('created_at', Carbon::today())->count() +
                         SuratKeteranganUsaha::whereDate('created_at', Carbon::today())->count();

    // Total surat bulan ini
    $totalSuratBulanIni = SuratKeteranganKematian::whereMonth('created_at', Carbon::now()->month)
                          ->whereYear('created_at', Carbon::now()->year)
                          ->count() +
                          SuratKeteranganTidakMampu::whereMonth('created_at', Carbon::now()->month)
                          ->whereYear('created_at', Carbon::now()->year)
                          ->count() +
                          SuratKeteranganUsaha::whereMonth('created_at', Carbon::now()->month)
                          ->whereYear('created_at', Carbon::now()->year)
                          ->count();

    // Total surat tahun ini
    $totalSuratTahunIni = SuratKeteranganKematian::whereYear('created_at', Carbon::now()->year)->count() +
                          SuratKeteranganTidakMampu::whereYear('created_at', Carbon::now()->year)->count() +
                          SuratKeteranganUsaha::whereYear('created_at', Carbon::now()->year)->count();

    return view('Staff.index', compact('totalSuratHariIni', 'totalSuratBulanIni', 'totalSuratTahunIni'));
   }


   public function pelayanan()
   {
    return view('Staff.pelayanan');
   }

   public function dataRT()
   {
       $rts = Rt::all();
       return view('Staff.datart', compact('rts'));
   }

  


}

?>