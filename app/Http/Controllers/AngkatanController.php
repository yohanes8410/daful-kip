<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Http\Requests\StoreAngkatanRequest;
use App\Http\Requests\UpdateAngkatanRequest;
use Illuminate\Http\Request;

class AngkatanController extends Controller
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
    public function create(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer|unique:angkatans',
        ]);

        $angkatan = new Angkatan;
        $angkatan->tahun = $request->tahun;
        $angkatan->save();

        return back()->with('add', '-');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($angkatan_id)
    {
        session(['angkatan_id' => $angkatan_id]);
        return redirect()->route('show.fakultas');
    }


    public function show(Angkatan $angkatan)
    {

        $angkatans = Angkatan::orderBy('tahun', 'desc')->get();
        return view(
            'admin.profilMhsAngkatanAdmin',
            compact('angkatans')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Angkatan $angkatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAngkatanRequest $request, Angkatan $angkatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_angkatan)
    {
        Angkatan::where('id', $id_angkatan)->delete();
        return back()->with('del', '-');
    }
}
