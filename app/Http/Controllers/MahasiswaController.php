<?php

namespace App\Http\Controllers;


use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = ['nama' => "maysa", 'foto' => 'avatar2.png'];
        $mahasiswa = Mahasiswa::with('prodi')->get();
        return view('Mahasiswa.index', compact('data', 'mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = ['nama' => "maysa", 'foto' => 'avatar2.png'];
        $prodi = Prodi::All();
        return view('mahasiswa.create', compact('data', 'prodi'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'NIM' => 'required|unique:mahasiswa|max:10',
                'password' => 'required',
                'Nama' => 'required|max:100',
                'Tanggal_Lahir' => 'required',
                'No_hp' => 'required|max:20',
                'email' => 'required|max:100',
                'foto' => 'image|file|max:2048'
            ],
            [
                'NIM.required' => 'NIM harus diisi',
                'NIM.unique' => 'NIM sudah terdaftar',
                'NIM.max' => 'NIM maksimal 10 karakter',
                'password.required' => 'Password wajib diisi',
                'Nama.required' => 'wajib diisi',
                'Tanggal_Lahir.required' => 'wajib diisi',
                'No_hp.required' => 'wajib diisi',
                'email.required' => 'wajib diisi',
                'foto.required' => 'wajib diisi'

            ]
        );
        if ($request->file('foto')) {
            $validateData['foto'] = $request->file('foto')->store('images'); 
        }
        $validateData['password'] = Hash::make($validateData['password']);
        $data = array_merge($validateData, $request->only('id'));
        Mahasiswa::create($data);
        return redirect('/mahasiswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = ['nama' => "maysa", 'foto' => 'avatar2.png'];
        $mahasiswa = Mahasiswa::find($id);
        $prodi = Prodi::All();
        return view('mahasiswa.edit', compact('data', 'mahasiswa', 'prodi'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $validateData = $request->validate(
            [
                'Nama' => 'required|max:100',
                'Tanggal_Lahir' => 'required',
                'No_hp' => 'required|max:20',
                'email' => 'required|max:100',
                'foto' => 'image|file|max:2048'
            ],
            [
                'Tanggal_Lahir.required' => 'wajib diisi',
                'No_hp.required' => 'wajib diisi',
                'email.required' => 'wajib diisi',
                'foto.required' => 'wajib diisi'

            ]
        );
        $mahasiswa = Mahasiswa::find($id);
        if ($request->file('foto')) {
            if ($mahasiswa->foto) {
                Storage::delete($mahasiswa->foto);
            }
            $validateData['foto'] = $request->file('foto')->store('images'); 
        }
        if ($request->input(['password'])) {
            $validateData['password'] = Hash::make($request->password);
        }
        $data=array_merge($validateData, $request->only('id'));
        Mahasiswa::where('NIM', $id)->update($data);
        return redirect('/mahasiswa');
        //
    
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $mahasiswa = Mahasiswa::find($id);
        if ($mahasiswa->foto) {
            Storage::delete($mahasiswa->foto);
        }
        Mahasiswa::destroy($id);
        return redirect('/mahasiswa');
    }
}
