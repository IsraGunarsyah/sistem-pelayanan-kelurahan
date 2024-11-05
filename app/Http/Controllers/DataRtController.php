<?php

namespace App\Http\Controllers;
use App\Models\Rt;
use Illuminate\Http\Request;

class DataRtController extends Controller
{
    public function store(Request $request)
    {
       $validatedData = $request->validate([
           'rt' => 'required|integer',
           'nama' => 'required|string|max:255',
           'alamat' => 'required|string|max:255',
           'no_telpon' => 'required|string|max:15',
           'email' => 'required|email|unique:rts,email',
           'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
       ]);
       Rt::create($validatedData);
       
    
       return redirect()->route('Staff.datart')->with('success', 'Data RT berhasil ditambahkan.');
    }
    
    
    public function update(Request $request, $id)
    {
        $rt = Rt::findOrFail($id);

        $validatedData = $request->validate([
            'rt' => 'required|integer',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telpon' => 'required|string|max:15',
            'email' => 'required|email|unique:rts,email,' . $rt->id,
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        $rt->update($validatedData);

        return redirect()->route('Staff.datart')->with('success', 'Data RT berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rt = Rt::findOrFail($id);
        $rt->delete();

        return redirect()->route('Staff.datart')->with('success', 'Data RT berhasil dihapus.');
    }
    
}
