<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller{

    public function index(){


        $totalStaff = User::where('role', 'staff')->count();
        return view('Admin.index', compact('totalStaff'));

    }

    public function daftarstaff(){

        // Mengambil semua pengguna dengan peran 'staff'
         $staffs = User::where('role', 'staff')->get();
    
        // Mengirim data staff ke view
        return view('Admin.staff.daftarstaff', compact('staffs'));
    
        }

    public function create()
    {
            // Menampilkan halaman form registrasi staff baru
            return view('Admin.staff.create');
        }


        public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'alamat' => 'nullable|string',
        'noHp' => 'nullable|string|max:15',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'alamat' => $request->alamat,
        'noHp' => $request->noHp,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'staff',
    ]);

    Log::info('User created: ', $user->toArray());

    return redirect()->route('Admin.staff.daftarstaff')->with('success', 'Staff berhasil didaftarkan.');
}

        


        public function edit($id)
        {
            // Mengambil data staff berdasarkan ID dan memastikan role adalah 'staff'
            $staff = User::where('id', $id)->where('role', 'staff')->firstOrFail();
    
            // Menampilkan halaman edit dengan data staff
            return view('Admin.staff.daftarstaff.edit', compact('staff'));
        }

        public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'position' => 'required|string|max:255',
            'status' => 'required|string|in:online,offline',
            'profile_picture' => 'nullable|image|max:2048'
        ]);

        // Mengambil data staff berdasarkan ID
        $staff = User::where('id', $id)->where('role', 'staff')->firstOrFail();

        // Menyimpan gambar jika ada
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $staff->profile_picture = $profilePicturePath;
        }

        // Memperbarui data staff
        $staff->update([
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        // Redirect ke halaman daftar staff dengan pesan sukses
        return redirect()->route('Admin.staff.daftarstaff')->with('success', 'Data staff berhasil diperbarui.');
    }

  
    public function destroy($id)
    {
        $staff = User::where('id', $id)->where('role', 'staff')->firstOrFail();
        $staff->delete();

        // Redirect ke halaman daftar staff dengan pesan sukses
        return redirect()->route('Admin.staff.daftarstaff')->with('success', 'Staff berhasil dihapus.');
    }

   

}



?>