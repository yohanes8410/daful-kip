<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use App\Http\Requests\StoreSkemaRequest;
use App\Http\Requests\UpdateSkemaRequest;
use App\Models\Angkatan;
use App\Models\Fakultas;

class SkemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($skema_id)
    {
        session(['skema_id' => $skema_id]);
        return redirect()->route('show.angkatan');
    }

    /**
     * Display the specified resource.
     */
    public function show($status_id)
    {
        $skemas = Skema::all();
        return view('admin.profilMhsAdmin', compact('skemas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skema $skema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkemaRequest $request, Skema $skema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skema $skema)
    {
        //
    }
}
