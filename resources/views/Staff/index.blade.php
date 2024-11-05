@extends('Staff.layouts.app')
@section('title', 'Dashboard Staff')
@section('content')

<div class="flex flex-wrap -mx-3 mb-5 removable">
    <!-- Card 1: Total Surat Dibuat Hari Ini -->
    <div class="w-full max-w-full px-3 mb-6 lg:w-1/3 sm:flex-none xl:mb-0 drop-zone">
        <div class="relative flex flex-col items-center min-w-0 break-words bg-white border border-gray-200 shadow-soft-xl rounded-lg bg-clip-border mb-4 draggable" draggable="true">
            <div class="p-4 text-center bg-white w-full">
                <div class="w-14 h-14 mx-auto flex items-center justify-center bg-blue-500 shadow-lg">
                    <i class="fa-solid text-2xl fa-calendar-day text-white"></i>
                </div>
            </div>
            <div class="flex-auto p-4 pt-2 text-center">
                <h6 class="mb-1 font-semibold">Total Surat Dibuat Hari Ini</h6>
                <h5 class="font-bold">{{ $totalSuratHariIni }}</h5>
            </div>
        </div>
    </div>
    
    <!-- Card 2: Total Surat Dibuat Bulan Ini -->
    <div class="w-full max-w-full px-3 mb-6 lg:w-1/3 sm:flex-none xl:mb-0 drop-zone">
        <div class="relative flex flex-col items-center min-w-0 break-words bg-white border border-gray-200 shadow-soft-xl rounded-lg bg-clip-border mb-4 draggable" draggable="true">
            <div class="p-4 text-center bg-white w-full">
                <div class="w-14 h-14 mx-auto flex items-center justify-center bg-blue-500 shadow-lg">
                    <i class="fa-solid fa-calendar-days text-2xl text-white"></i>
                </div>
            </div>
            <div class="flex-auto p-4 pt-2 text-center">
                <h6 class="mb-1 font-semibold">Total Surat Dibuat Bulan Ini</h6>
                <h5 class="font-bold">{{ $totalSuratBulanIni }}</h5>
            </div>
        </div>
    </div>
    
    <!-- Card 3: Total Surat Dibuat Tahun Ini -->
    <div class="w-full max-w-full px-3 mb-6 lg:w-1/3 sm:flex-none xl:mb-0 drop-zone">
        <div class="relative flex flex-col items-center min-w-0 break-words bg-white border border-gray-200 shadow-soft-xl rounded-lg bg-clip-border mb-4 draggable" draggable="true">
            <div class="p-4 text-center bg-white w-full">
                <div class="w-14 h-14 mx-auto flex items-center justify-center bg-blue-500 shadow-lg">
                    <i class="fa-solid fa-calendar-week text-2xl text-white"></i>
                </div>
            </div>
            <div class="flex-auto p-4 pt-2 text-center">
                <h6 class="mb-1 font-semibold">Total Surat Dibuat Tahun Ini</h6>
                <h5 class="font-bold">{{ $totalSuratTahunIni }}</h5>
            </div>
        </div>
    </div>
</div>

@endsection
