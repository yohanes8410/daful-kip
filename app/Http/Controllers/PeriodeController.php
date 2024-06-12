<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Http\Requests\StorePeriodeRequest;
use App\Http\Requests\UpdatePeriodeRequest;
use Illuminate\Http\Request;

class PeriodeController extends Controller
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
            'periode' => 'required|unique:periodes'
        ]);
        $periode = new Periode;
        $periode->periode = $request->periode;
        $periode->save();

        return back()->with('add', '-');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePeriodeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periode $periode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeriodeRequest $request, Periode $periode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_periode)
    {
        Periode::where('id', $id_periode)->delete();
        return back()->with('del', '-');
    }
}
