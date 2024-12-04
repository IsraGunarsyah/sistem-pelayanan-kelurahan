@extends('Staff.layouts.app')
@section('title', 'Buat Surat Keterangan Tidak Mampu')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <!-- Pemberitahuan Berhasil -->
    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('Staff.surat_keterangan_tidak_mampu.store') }}" method="POST">
        @csrf
        <!-- Section Yang Membuat -->
        <h2 class="text-lg font-semibold mb-4">Yang Membuat</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div>
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="mt-1 p-2 w-full border rounded-md" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div>
                <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div>
                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div>
                <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                <input type="text" name="pekerjaan" id="pekerjaan" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div class="col-span-1 md:col-span-2">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <input type="text" name="status" id="status" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
        </div>

        <!-- Section Adalah Benar Keluarga/Istri/Anak Dari -->
        <h2 class="text-lg font-semibold mt-8 mb-4">Adalah Benar Keluarga/Istri/Anak Dari</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="nama_keluarga" class="block text-sm font-medium text-gray-700">Nama Keluarga</label>
                <input type="text" name="nama_keluarga" id="nama_keluarga" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div>
                <label for="jenis_kelamin_keluarga" class="block text-sm font-medium text-gray-700">Jenis Kelamin Keluarga</label>
                <select name="jenis_kelamin_keluarga" id="jenis_kelamin_keluarga" class="mt-1 p-2 w-full border rounded-md" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div>
                <label for="tempat_lahir_keluarga" class="block text-sm font-medium text-gray-700">Tempat Lahir Keluarga</label>
                <input type="text" name="tempat_lahir_keluarga" id="tempat_lahir_keluarga" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div>
                <label for="tanggal_lahir_keluarga" class="block text-sm font-medium text-gray-700">Tanggal Lahir Keluarga</label>
                <input type="date" name="tanggal_lahir_keluarga" id="tanggal_lahir_keluarga" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div>
                <label for="pekerjaan_keluarga" class="block text-sm font-medium text-gray-700">Pekerjaan Keluarga</label>
                <input type="text" name="pekerjaan_keluarga" id="pekerjaan_keluarga" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div class="col-span-1 md:col-span-2">
                <label for="alamat_keluarga" class="block text-sm font-medium text-gray-700">Alamat Keluarga</label>
                <input type="text" name="alamat_keluarga" id="alamat_keluarga" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
        </div>

        <!-- Section Informasi Tambahan -->
        <h2 class="text-lg font-semibold mt-8 mb-4">Informasi Tambahan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="rt" class="block text-sm font-medium text-gray-700">RT</label>
                <select name="rt" id="rt" class="mt-1 p-2 w-full border rounded-md" required onchange="updateRtSkDetails()">
                    <option value="">Pilih RT</option>
                    @for ($i = 1; $i <= 33; $i++)
                        <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                    @endfor
                </select>
            </div>            
            <div>
                <label for="no_sk_rt" class="block text-sm font-medium text-gray-700">NO SK RT</label>
                <input type="text" name="no_sk_rt" id="no_sk_rt" class="mt-1 p-2 w-full border rounded-md" required oninput="updateRtSkDetails()">
            </div>
            <div>
                <label for="combined_sk_rt" class="block text-sm font-medium text-gray-700">RT dan NO SK RT</label>
                <input type="text" name="combined_sk_rt" id="combined_sk_rt" class="mt-1 p-2 w-full border rounded-md bg-gray-100" readonly>
            </div>
            <div>
                <label for="tanggal_sk" class="block text-sm font-medium text-gray-700">Tanggal SK</label>
                <input type="date" name="tanggal_sk" id="tanggal_sk" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div>
                <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div>
                <label for="keperluan" class="block text-sm font-medium text-gray-700">Keperluan</label>
                <input type="text" name="keperluan" id="keperluan" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div>
                <label for="nomor_surat" class="block text-sm font-medium text-gray-700">Nomor Surat</label>
                <input type="text" name="nomor_surat" id="nomor_surat" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div>
                <label for="tanggal_surat" class="block text-sm font-medium text-gray-700">Tanggal Surat</label>
                <input type="date" name="tanggal_surat" id="tanggal_surat" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
        </div>

        <!-- Section KASI yang Bertanggung Jawab -->
        <h2 class="text-lg font-semibold mt-8 mb-4">KASI yang Bertanggung Jawab</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="kasi_id" class="block text-sm font-medium text-gray-700">Nama KASI</label>
                <select name="kasi_id" id="kasi_id" class="mt-1 p-2 w-full border rounded-md" required onchange="updateKasiDetails()">
                    <option value="">Pilih Kasi</option>
                    @foreach($kasis as $kasi)
                        <option value="{{ $kasi->id }}" data-jabatan="{{ $kasi->jabatan }}" data-nip="{{ $kasi->nip }}">{{ $kasi->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" class="mt-1 p-2 w-full border rounded-md" readonly>
            </div>
            <div>
                <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                <input type="text" name="nip" id="nip" class="mt-1 p-2 w-full border rounded-md" readonly>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end mt-8">
            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-150">Buat Surat</button>
        </div>
    </form>
</div>

<script>
    function updateKasiDetails() {
        const kasiSelect = document.getElementById('kasi_id');
        const selectedOption = kasiSelect.options[kasiSelect.selectedIndex];
        document.getElementById('jabatan').value = selectedOption.getAttribute('data-jabatan');
        document.getElementById('nip').value = selectedOption.getAttribute('data-nip');
    }

    function updateRtSkDetails() {
    const rt = document.getElementById('rt').value;
    const noSkRt = document.getElementById('no_sk_rt').value;

    if (rt && noSkRt) {
        document.getElementById('combined_sk_rt').value = `${rt}/${noSkRt}/KEL-TLI`;
    } else {
        document.getElementById('combined_sk_rt').value = "";
    }
}

</script>
@endsection
