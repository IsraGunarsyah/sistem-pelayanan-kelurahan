@extends('Staff.layouts.app')
@section('title','Riwayat Pembuatan Surat')
@section('content')

<div class="w-full px-6 py-6 mx-auto loopple-min-height-78vh text-slate-500">
    <!-- Card for Surat Keterangan Tidak Mampu -->
    <a href="{{ route('Staff.riwayat.tidak_mampu') }}" class="block">
        <div class="relative flex flex-col flex-auto min-w-0 p-4 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border mb-4">
            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-auto max-w-full px-3">
                    <div class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                        <i class="fas fa-hand-holding-usd text-4xl text-blue-500"></i> <!-- Icon instead of image -->
                    </div>
                </div>
                <div class="flex-none w-auto max-w-full px-3 my-auto">
                    <div class="h-full">
                        <h5 class="mb-1">Riwayat Surat Keterangan Tidak Mampu</h5>
                        <p class="mb-0 font-semibold leading-normal text-sm"><br></p>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Card for Surat Keterangan Usaha -->
    <a href="{{ route('Staff.riwayat.usaha') }}" class="block">
        <div class="relative flex flex-col flex-auto min-w-0 p-4 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border mb-4">
            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-auto max-w-full px-3">
                    <div class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                        <i class="fas fa-briefcase text-4xl text-green-500"></i> <!-- Icon instead of image -->
                    </div>
                </div>
                <div class="flex-none w-auto max-w-full px-3 my-auto">
                    <div class="h-full">
                        <h5 class="mb-1">Riwayat Surat Keterangan Usaha</h5>
                        <p class="mb-0 font-semibold leading-normal text-sm"><br></p>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Card for Surat Keterangan Kematian -->
    <a href="{{ route('Staff.riwayat.kematian') }}" class="block">
        <div class="relative flex flex-col flex-auto min-w-0 p-4 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border mb-4">
            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-auto max-w-full px-3">
                    <div class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                        <i class="fas fa-cross text-4xl text-red-500"></i> <!-- Icon instead of image -->
                    </div>
                </div>
                <div class="flex-none w-auto max-w-full px-3 my-auto">
                    <div class="h-full">
                        <h5 class="mb-1">Riwayat Surat Keterangan Kematian</h5>
                        <p class="mb-0 font-semibold leading-normal text-sm"><br></p>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>

@endsection
