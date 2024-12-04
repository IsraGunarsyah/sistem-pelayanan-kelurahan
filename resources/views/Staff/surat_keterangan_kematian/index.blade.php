@extends('Staff.layouts.app')
@section('title', 'Buat Surat Keterangan Kematian')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <!-- Pemberitahuan Berhasil -->
    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('Staff.surat_keterangan_kematian.store') }}" method="POST">
        @csrf
        <!-- Nama yang bersangkutan -->
        <h2 class="text-lg font-semibold mb-4">Nama yang bersangkutan:</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div>
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="mt-1 p-2 w-full border rounded-md" required>
                    <option value="">Pilih Jenis Kelamin</option> <!-- Option for "Choose Gender" -->
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div>
                <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                <input type="text" name="pekerjaan" id="pekerjaan" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div class="col-span-1 md:col-span-3">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div>
                <label for="hari_kematian" class="block text-sm font-medium text-gray-700">Hari Kematian</label>
                <input type="text" name="hari_kematian" id="hari_kematian" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div>
                <label for="tanggal_kematian" class="block text-sm font-medium text-gray-700">Tanggal Kematian</label>
                <input type="date" name="tanggal_kematian" id="tanggal_kematian" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div class="col-span-1 md:col-span-3">
                <label for="tempat_kematian" class="block text-sm font-medium text-gray-700">Tempat Kematian</label>
                <input type="text" name="tempat_kematian" id="tempat_kematian" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div class="col-span-1 md:col-span-3">
                <label for="sebab_kematian" class="block text-sm font-medium text-gray-700">Sebab Kematian</label>
                <input type="text" name="sebab_kematian" id="sebab_kematian" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
        </div>

        <!-- Informasi Tambahan -->
      <!-- Informasi Tambahan -->
<h2 class="text-lg font-semibold mt-8 mb-4">Informasi Tambahan</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div>
        <label for="rt" class="block text-sm font-medium text-gray-700">RT</label>
        <select name="rt" id="rt" class="mt-1 p-2 w-full border rounded-md" required onchange="updateCombinedSkRt()">
            <option value="">Pilih RT</option>
            @for ($i = 1; $i <= 33; $i++)
                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
            @endfor
        </select>
    </div>
    <div>
        <label for="no_sk_rt" class="block text-sm font-medium text-gray-700">NO SK RT</label>
        <input type="text" name="no_sk_rt" id="no_sk_rt" class="mt-1 p-2 w-full border rounded-md" oninput="updateCombinedSkRt()" required>
    </div>
    <div>
        <label for="combined_sk_rt" class="block text-sm font-medium text-gray-700">RT dan NO SK RT</label>
        <input type="text" id="combined_sk_rt" class="mt-1 p-2 w-full border rounded-md bg-gray-100" readonly>
    </div>
    <div>
        <label for="tanggal_sk" class="block text-sm font-medium text-gray-700">Tanggal SK</label>
        <input type="date" name="tanggal_sk" id="tanggal_sk" class="mt-1 p-2 w-full border rounded-md" required>
    </div>
    <!-- Tambahkan Nomor Surat -->
    <input type="hidden" name="nomor_surat" value="473.3">
</div>


        <!-- Nama Pelapor -->
        <div class="col-span-1 md:col-span-3">
            <label for="nama_pelapor" class="block text-sm font-medium text-gray-700">Nama Pelapor</label>
            <input type="text" name="nama_pelapor" id="nama_pelapor" class="mt-1 p-2 w-full border rounded-md" required>
        </div>

        <!-- Hubungan dengan Orang yang Meninggal -->
        <div class="col-span-1 md:col-span-3">
            <label for="hubungan" class="block text-sm font-medium text-gray-700">Hubungan dengan yang Meninggal</label>
            <input type="text" name="hubungan" id="hubungan" class="mt-1 p-2 w-full border rounded-md" required>
        </div>

        <!-- KASI yang bertanggung jawab -->
        <h2 class="text-lg font-semibold mt-8 mb-4">KASI yang bertanggung jawab :</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="kasi_id" class="block text-sm font-medium text-gray-700">Nama KASI</label>
                <select name="kasi_id" id="kasi_id" class="mt-1 p-2 w-full border rounded-md" required onchange="updateKasiDetails()">
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

    function updateCombinedSkRt() {
        const rt = document.getElementById('rt').value;
        const noSkRt = document.getElementById('no_sk_rt').value;
        const combinedSkRt = document.getElementById('combined_sk_rt');

        if (rt && noSkRt) {
            combinedSkRt.value = `${rt}/${noSkRt}/KEL-TLI`;
        } else {
            combinedSkRt.value = "";
        }
    }
</script>

@endsection
