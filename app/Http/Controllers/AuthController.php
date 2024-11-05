<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Cek apakah kredensial pengguna benar
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Cek role pengguna dan redirect sesuai role
            if ($user->role === 'Staff') {
                return redirect()->route('Staff.index');
            } elseif ($user->role === 'Admin') {
                return redirect()->route('Admin.index');
            }

            // Jika role tidak dikenali, redirect ke halaman default (opsional)
            return redirect()->route('home');
        }

        // Jika kredensial salah, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'email or password is incorrect.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Redirect user to login page after logout
        return redirect()->route('login')->with('status', 'Anda telah berhasil logout.');
    }
}
