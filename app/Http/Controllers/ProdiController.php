<?php

namespace App\Http\Controllers;

use index;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ['nama' => "maysa", 'foto' => 'avatar2.png'];
        $prodi = Prodi::all();
        return view('Prodi.index', compact('data', 'prodi'));
        
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = ['nama' => "maysa", 'foto' => 'avatar2.png'];
        $prodi = Prodi::All();
        return view('prodi.create', compact('data', 'prodi')); 
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'id'=> 'required',
                'Nama' => 'required|max:100',
                'kaprodi' => 'required',
                'jurusan' => 'required|max:20',
            ],
            [
                'id.required' => 'ID Prodi harus diisi',
                'Nama.required' => 'wajib diisi',
                'kaprodi' => 'wajib diisi',
                'jurusan' => 'wajib diisi',
            ]
        );
        
        $data = $request->only(['id', 'Nama', 'kaprodi', 'jurusan']);
        Prodi::create($data);
        return redirect('/prodi');
    }
        //
    

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
        $prodi = Prodi::find($id);
        return view('prodi.edit', compact('data', 'prodi'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validateData = $request->validate(
            [
                'id'=> 'required',
                'Nama' => 'required|max:100',
                'kaprodi' => 'required',
                'jurusan' => 'required|max:20',
            ],
            [
                'id.required' => 'ID Prodi harus diisi',
                'Nama.required' => 'wajib diisi',
                'kaprodi' => 'wajib diisi',
                'jurusan' => 'wajib diisi',
            ]
        );
        
        $data = $request->only(['id', 'Nama', 'kaprodi', 'jurusan']);
        Prodi::create($data);
        return redirect('/prodi');

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $prodi = Prodi::find($id);
        if ($prodi) {
            $prodi->delete();
        }
        Prodi::destroy($id);
        return redirect('/prodi');
        //
    }
}