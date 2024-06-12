<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createFakultas(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:fakultas',
            'slug' => 'required|unique:fakultas',
        ]);

        $fakultas = new fakultas;
        $fakultas->nama = $request->nama;
        $fakultas->slug = $request->slug;
        $fakultas->save();

        return back()->with('addFakultas', '-');
    }

    public function createProdi(Request $request)
    {
        $request->validate([
            'fakultas_id' => 'required',
            'nama' => 'required|unique:prodis'
        ]);

        $prodi = new prodi;
        $prodi->fakultas_id = $request->fakultas_id;
        $prodi->nama = $request->nama;
        $prodi->save();

        return back()->with('addProdi', '-');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($fakultas_id)
    {
        session(['fakultas_id' => $fakultas_id]);
        return redirect()->route('index.mahasiswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        $fakultas = Fakultas::all();
        return view('admin.profilMhsFakultasAdmin', [
            'fakultas' => $fakultas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_fakultas)
    {
        Fakultas::where('id', $id_fakultas)->delete();
        return back()->with('del', '-');
    }
}
