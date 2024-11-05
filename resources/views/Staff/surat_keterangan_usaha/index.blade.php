@extends('Staff.layouts.app')
@section('title', 'Buat Surat Keterangan Usaha')

@section('content')
@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
    {{ session('success') }}
</div>
@endif

<form action="{{ route('Staff.surat_keterangan_usaha.store') }}" method="POST" class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    @csrf
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
            <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
            <input type="text" name="agama" id="agama" class="mt-1 p-2 w-full border rounded-md" required>
        </div>
        <div>
            <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
            <input type="text" name="pekerjaan" id="pekerjaan" class="mt-1 p-2 w-full border rounded-md" required>
        </div>
        <div class="col-span-1 md:col-span-2">
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="mt-1 p-2 w-full border rounded-md" required>
        </div>
    </div>

    <h2 class="text-lg font-semibold mt-8 mb-4">Usaha</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label for="usaha" class="block text-sm font-medium text-gray-700">Usaha</label>
            <input type="text" name="usaha" id="usaha" class="mt-1 p-2 w-full border rounded-md" required>
        </div>
        <div>
            <label for="modal_usaha" class="block text-sm font-medium text-gray-700">Modal Usaha</label>
            <input type="number" name="modal_usaha" id="modal_usaha" class="mt-1 p-2 w-full border rounded-md" required>
        </div>
        <div>
            <label for="alamat_usaha" class="block text-sm font-medium text-gray-700">Alamat Usaha</label>
            <input type="text" name="alamat_usaha" id="alamat_usaha" class="mt-1 p-2 w-full border rounded-md" required>
        </div>
    </div>

    <h2 class="text-lg font-semibold mt-8 mb-4">Informasi Tambahan</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label for="rt" class="block text-sm font-medium text-gray-700">RT</label>
            <select name="rt" id="rt" class="mt-1 p-2 w-full border rounded-md" required>
                <option value="">Pilih RT</option> <!-- Tambahkan opsi default -->
                @for ($i = 1; $i <= 33; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        
        <div>
            <label for="no_sk_rt" class="block text-sm font-medium text-gray-700">NO SK RT</label>
            <input type="text" name="no_sk_rt" id="no_sk_rt" class="mt-1 p-2 w-full border rounded-md" readonly required>
        </div>
        <div>
            <label for="tanggal_sk" class="block text-sm font-medium text-gray-700">Tanggal SK</label>
            <input type="date" name="tanggal_sk" id="tanggal_sk" class="mt-1 p-2 w-full border rounded-md" required>
        </div>
    </div>

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

    <div class="flex justify-end mt-8">
        <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-150">Buat Surat</button>
    </div>
</form>

<script>
    function updateKasiDetails() {
        const kasiSelect = document.getElementById('kasi_id');
        const selectedOption = kasiSelect.options[kasiSelect.selectedIndex];
        document.getElementById('jabatan').value = selectedOption.getAttribute('data-jabatan');
        document.getElementById('nip').value = selectedOption.getAttribute('data-nip');
    }

    document.getElementById('rt').addEventListener('change', function() {
        const rt = this.value;
        const type = 'keterangan_usaha';  // Jenis surat yang sedang dibuat

        if (rt === "") {
            document.getElementById('no_sk_rt').value = "";  // Reset nomor SK jika RT tidak dipilih
        } else {
            generateNoSkRt(rt, type);
        }
    });


    async function generateNoSkRt(rt, type) {
        try {
            const timestamp = new Date().getTime();  // Tambahkan timestamp untuk menghindari cache
            const response = await fetch(`/staff/generate-no-sk-rt/${rt}/${type}?t=${timestamp}`);
            
            if (!response.ok) {
                throw new Error("HTTP error " + response.status);
            }

            const data = await response.json();
            document.getElementById('no_sk_rt').value = data.no_sk_rt;
        } catch (error) {
            console.error("Error generating no_sk_rt:", error);
        }
    }
</script>
@endsection
