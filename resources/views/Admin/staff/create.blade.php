@extends('Admin.layouts.app')
@section('title', 'Buat Akun Staff')
@section('content')

<div class="flex justify-center items-center mt-8">
    <div class="w-full max-w-lg bg-white shadow-lg rounded-2xl p-8 mx-4 lg:mx-0">
        <h2 class="text-2xl font-semibold text-center text-gray-800">Buat Akun Staff</h2>
        <p class="text-center text-gray-500 text-sm mb-6">Silakan isi formulir di bawah ini untuk mendaftarkan staff baru.</p>

        <form action="{{ route('Admin.staff.create.store') }}" method="POST" class="space-y-5">
            @csrf
            <div class="space-y-1">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-100 focus:border-indigo-300" placeholder="Nama lengkap" required>
            </div>

            <div class="space-y-1">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-100 focus:border-indigo-300" placeholder="Alamat">
            </div>

            <div class="space-y-1">
                <label for="noHp" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                <input type="text" name="noHp" id="noHp" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-100 focus:border-indigo-300" placeholder="Nomor HP">
            </div>

            <div class="space-y-1">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-100 focus:border-indigo-300" placeholder="Email" required>
            </div>

            <div class="space-y-1">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-100 focus:border-indigo-300" placeholder="Password" required>
            </div>

            <div class="mb-3">
                <label for="password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-100 focus:border-indigo-300" placeholder="Confirm Password" aria-label="Confirm Password">
            </div>
            

            <button type="submit" class="w-full py-3 mt-4 text-white bg-indigo-600 rounded-lg font-semibold hover:bg-indigo-700 transition duration-200">Daftar</button>
        </form>
    </div>
</div>

@endsection
