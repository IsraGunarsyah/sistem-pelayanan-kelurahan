@extends('Staff.layouts.app')
@section('title', 'Riwayat Surat Keterangan Usaha')
@section('content')

<div x-data="{ showModal: false, showEditModal: false, surattDetail: {}, editSuratt: {} }">
    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border mb-4 draggable" draggable="true">
        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6>Riwayat Surat Keterangan Usaha</h6>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
                <table class="items-center justify-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                        <tr>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Pemohon</th>
                            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Pengajuan</th>
                            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No SK RT</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usahas as $suratt)
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 font-semibold leading-normal text-sm">{{ $suratt->nama }}</p>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 font-semibold leading-normal text-sm">{{ $suratt->tanggal_sk }}</p>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <span class="font-semibold leading-tight text-xs">{{ $suratt->no_sk_rt }}</span>
                            </td>
                            <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <!-- Tombol Lihat Detail -->
                                <button @click="showModal = true; surattDetail = {{ $suratt }}" class="inline-block px-4 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-blue-500 text-white rounded-lg shadow-none text-xs ease-soft-in bg-150 tracking-tight-soft">
                                    Lihat Detail
                                </button>
                                <!-- Tombol Cetak PDF -->
                                <a href="{{ route('Staff.riwayat.pdf.surat_usaha', $suratt->id) }}" target="_blank" class="inline-block px-4 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-green-500 text-white rounded-lg shadow-none text-xs ease-soft-in bg-150 tracking-tight-soft">
                                    Cetak PDF
                                </a>
                                <!-- Tombol Edit -->
                                <button @click="showEditModal = true; editSuratt = {{ $suratt }}" class="inline-block px-4 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-yellow-500 text-white rounded-lg shadow-none text-xs ease-soft-in bg-150 tracking-tight-soft">
                                    Edit
                                </button>
                                <!-- Tombol Hapus -->
                                <form action="{{ route('Staff.surat_keterangan_usaha.delete', $suratt->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="inline-block px-4 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-red-500 text-white rounded-lg shadow-none text-xs ease-soft-in bg-150 tracking-tight-soft">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Lihat Detail -->
    <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg w-1/3 p-6">
            <h2 class="text-xl font-bold mb-4">Detail Surat Keterangan Usaha</h2>
            <div class="mb-4">
                <p><strong>Nama Pemohon:</strong> <span x-text="surattDetail.nama"></span></p>
                <p><strong>Jenis Kelamin:</strong> <span x-text="surattDetail.jenis_kelamin"></span></p>
                <p><strong>Tempat Lahir:</strong> <span x-text="surattDetail.tempat_lahir"></span></p>
                <p><strong>Tanggal Lahir:</strong> <span x-text="surattDetail.tanggal_lahir"></span></p>
                <p><strong>Agama:</strong> <span x-text="surattDetail.agama"></span></p>
                <p><strong>Pekerjaan:</strong> <span x-text="surattDetail.pekerjaan"></span></p>
                <p><strong>Alamat:</strong> <span x-text="surattDetail.alamat"></span></p>
                <p><strong>Usaha:</strong> <span x-text="surattDetail.usaha"></span></p>
                <p><strong>Modal Usaha:</strong> <span x-text="surattDetail.modal_usaha"></span></p>
                <p><strong>Alamat Usaha:</strong> <span x-text="surattDetail.alamat_usaha"></span></p>
                <p><strong>Rt:</strong> <span x-text="surattDetail.rt"></span></p>
                <p><strong>No SK RT:</strong> <span x-text="surattDetail.no_sk_rt"></span></p>
                <p><strong>Tanggal SK:</strong> <span x-text="surattDetail.tanggal_sk"></span></p>
                <p><strong>KASI:</strong> <span x-text="surattDetail.kasi ? surattDetail.kasi.nama : 'N/A'"></span></p>
            </div>
            <div class="text-right">
                <button @click="showModal = false" class="px-4 py-2 bg-red-500 text-white rounded-lg">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div x-show="showEditModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg w-1/3 p-6">
            <h2 class="text-xl font-bold mb-4">Edit Surat Keterangan Usaha</h2>
            <form :action="`{{ route('Staff.surat_keterangan_usaha.update', '') }}/${editSuratt.id}`" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="edit_nama" class="block text-sm font-medium text-gray-700">Nama Pemohon</label>
                    <input type="text" name="nama" id="edit_nama" x-model="editSuratt.nama" class="mt-1 p-2 w-full border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="edit_jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="edit_jenis_kelamin" x-model="editSuratt.jenis_kelamin" class="mt-1 p-2 w-full border rounded-md" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="edit_pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="edit_pekerjaan" x-model="editSuratt.pekerjaan" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div class="mb-4">
                    <label for="edit_alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <input type="text" name="alamat" id="edit_alamat" x-model="editSuratt.alamat" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div class="text-right">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Simpan Perubahan</button>
                    <button @click="showEditModal = false" type="button" class="px-4 py-2 bg-red-500 text-white rounded-lg">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
