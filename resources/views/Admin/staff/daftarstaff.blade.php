@extends('Admin.layouts.app')
@section('title', 'Daftar Staff')
@section('content')

<div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border mb-4 draggable" draggable="true">
    <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl flex justify-between items-center">
        <h6>Daftar Staff</h6>
        <a href="{{ route('Admin.staff.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white text-xs font-bold rounded shadow-md hover:bg-blue-600 transition-all duration-150 ease-in-out">
            <i class="fas fa-user-plus mr-2"></i> Buat Akun Staff
        </a>
    </div>
    
    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                <thead class="align-bottom">
                    <tr>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama</th>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Email</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jabatan</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No Hp</th>
                        <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $staff)
                    <tr>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 py-1">
                                <div class="flex flex-col justify-center">
                                    <h6 class="mb-0 leading-normal text-sm">{{ $staff->name }}</h6>
                                </div>
                            </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 leading-tight text-xs text-slate-400">{{ $staff->email }}</p>
                        </td>
                        <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                            <p class="mb-0 font-semibold leading-tight text-xs">{{ $staff->role }}</p>
                        </td>
                        <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <span class="font-semibold leading-tight text-xs text-slate-400">{{ $staff->noHp }}</span>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                            <div class="flex justify-center space-x-2">
                                <button onclick="openEditModal({{ $staff }})" class="text-white bg-blue-500 hover:bg-blue-600 font-semibold text-xs px-3 py-1 rounded transition-all duration-150 ease-in-out">
                                    Edit
                                </button>
                                <form action="{{ route('Admin.staff.daftarstaff.destroy', $staff->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus staff ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white bg-red-500 hover:bg-red-600 font-semibold text-xs px-3 py-1 rounded transition-all duration-150 ease-in-out">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div id="editModal" class="fixed inset-0 hidden bg-gray-900 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white rounded-lg p-6 w-1/3">
        <h3 class="text-lg font-bold mb-4">Edit Data Staff</h3>
        <form id="editForm" action="" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="editName" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="editName" name="name" class="w-full px-4 py-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="editEmail" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="editEmail" name="email" class="w-full px-4 py-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="editNoHp" class="block text-sm font-medium text-gray-700">No Hp</label>
                <input type="text" id="editNoHp" name="noHp" class="w-full px-4 py-2 border border-gray-300 rounded">
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeEditModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Batal</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(staff) {
        document.getElementById('editForm').action = `/Admin/staff/${staff.id}`;
        document.getElementById('editName').value = staff.name;
        document.getElementById('editEmail').value = staff.email;
        document.getElementById('editNoHp').value = staff.noHp || '';
        
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>

@endsection
