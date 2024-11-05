@extends('Staff.layouts.app')
@section('title', 'Data RT')
@section('content')

<div x-data="{ showModal: false, showEditModal: false, editData: {}, showDeleteModal: false, deleteData: {} }">
    <!-- Table -->
    <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border mb-4 draggable" draggable="true">
        <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl flex justify-between items-center">
            <h6>Data RT</h6>
            <!-- Button to open Add Modal -->
            <button @click="showModal = true" class="px-4 py-2 bg-green-500 text-white rounded-lg">Tambah</button>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                        <tr>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 text-xxs text-slate-400">RT</th>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 text-xxs text-slate-400">Nama</th>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 text-xxs text-slate-400">Alamat</th>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 text-xxs text-slate-400">No Telpon</th>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 text-xxs text-slate-400">Email</th>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 text-xxs text-slate-400">Jenis Kelamin</th>
                            <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 text-xxs text-slate-400">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rts as $rt)
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">{{ $rt->rt }}</td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">{{ $rt->nama }}</td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">{{ $rt->alamat }}</td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">{{ $rt->no_telpon }}</td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">{{ $rt->email }}</td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">{{ $rt->jenis_kelamin }}</td>
                            <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap">
                                <!-- Edit Button to open Edit Modal -->
                                <button @click="showEditModal = true; editData = {{ $rt }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Edit</button>
                                <!-- Delete Button to open Delete Modal -->
                                <button @click="showDeleteModal = true; deleteData = {{ $rt }}" class="px-4 py-2 bg-red-500 text-white rounded-lg">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Success Notification -->
    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
        <p class="font-bold">Berhasil</p>
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <!-- Add RT Modal -->
    <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg w-1/3 p-6">
            <h2 class="text-xl font-bold mb-4">Tambah Data RT</h2>
            <form action="{{ route('Staff.datart.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="rt" class="block text-sm font-medium text-gray-700">RT</label>
                    <input type="number" name="rt" id="rt" class="mt-1 p-2 w-full border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" id="nama" class="mt-1 p-2 w-full border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="mt-1 p-2 w-full border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="no_telpon" class="block text-sm font-medium text-gray-700">No Telpon</label>
                    <input type="text" name="no_telpon" id="no_telpon" class="mt-1 p-2 w-full border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 p-2 w-full border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="mt-1 p-2 w-full border rounded-md" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="text-right">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Simpan</button>
                    <button @click="showModal = false" type="button" class="px-4 py-2 bg-red-500 text-white rounded-lg">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit RT Modal -->
    <div x-show="showEditModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg w-1/3 p-6">
            <h2 class="text-xl font-bold mb-4">Edit Data RT</h2>
            <form :action="`{{ route('Staff.datart.update', '') }}/${editData.id}`" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="edit_rt" class="block text-sm font-medium text-gray-700">RT</label>
                    <input type="number" name="rt" id="edit_rt" x-model="editData.rt" class="mt-1 p-2 w-full border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="edit_nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" id="edit_nama" x-model="editData.nama" class="mt-1 p-2 w-full border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="edit_alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <input type="text" name="alamat" id="edit_alamat" x-model="editData.alamat" class="mt-1 p-2 w-full border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="edit_no_telpon" class="block text-sm font-medium text-gray-700">No Telpon</label>
                    <input type="text" name="no_telpon" id="edit_no_telpon" x-model="editData.no_telpon" class="mt-1 p-2 w-full border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="edit_email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="edit_email" x-model="editData.email" class="mt-1 p-2 w-full border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="edit_jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="edit_jenis_kelamin" x-model="editData.jenis_kelamin" class="mt-1 p-2 w-full border rounded-md" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="text-right">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Simpan Perubahan</button>
                    <button @click="showEditModal = false" type="button" class="px-4 py-2 bg-red-500 text-white rounded-lg">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div x-show="showDeleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg w-1/3 p-6">
            <h2 class="text-xl font-bold mb-4">Hapus Data RT</h2>
            <p>Apakah Anda yakin ingin menghapus data RT ini?</p>
            <div class="text-right mt-4">
                <form :action="`{{ route('Staff.datart.destroy', '') }}/${deleteData.id}`" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg">Hapus</button>
                    <button @click="showDeleteModal = false" type="button" class="px-4 py-2 bg-gray-500 text-white rounded-lg">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
