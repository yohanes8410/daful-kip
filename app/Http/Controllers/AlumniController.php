<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\Skema;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class AlumniController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }



    public function showSkema($status_id)
    {
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        $skemas = Skema::all();
        return view('admin.profilAlumniAdmin', compact('skemas', 'status_id', 'total_users_konfirmasi'));
    }

    public function showPeriode($status_id, $skema_id)
    {
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        $periodes = Periode::all();
        return view('admin.profilAlumniPeriodeAdmin', compact('periodes', 'status_id', 'skema_id', 'total_users_konfirmasi'));
    }

    public function viewUsers(Request $request, $status_id, $skema_id, $periode_id)
    {
        $search = $request->input('search');
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        $periode = Periode::find($periode_id);
        $statusModel = Status::findOrFail($status_id);
        $periodeModel = Periode::find($periode_id);
        $usersQuery = User::where('status_id', $status_id)
            ->where('skema_id', $skema_id)
            ->where('periode_id', $periode_id)
            ->where('is_active', true);
        $total_users = $usersQuery->count();

        if ($search) {
            $usersQuery->where(function ($query) use ($search) {
                $query->where('nim', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%")
                    ->orWhereHas('prodi', function ($q) use ($search) {
                        $q->where('nama', 'like', "%{$search}%");
                    });
            });
        }

        $users = $usersQuery->orderBy('nim', 'asc')->paginate(10);



        return view('admin.getAlumni', compact('status_id', 'skema_id', 'periode_id', 'users', 'statusModel', 'total_users', 'periodeModel', 'total_users_konfirmasi', 'periode'));
    }

    public function diaktifkan($id)
    {

        $user = User::findOrFail($id);
        $diaktifkanStatus = Status::where('nama', 'Mahasiswa Aktif')->first();

        if ($diaktifkanStatus) {
            $user->status_id = $diaktifkanStatus->id;
            $user->save();
        }

        return back()->with('diaktifkan', 'User diaktifkan.');
    }

    public function hapus($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('delete-user', 'User dihapus.');
    }

    public function detailUser($status_id, $skema_id, $periode_id, $user_id)
    {
        $user = User::where('status_id', $status_id)
            ->where('skema_id', $skema_id)
            ->where('periode_id', $periode_id)
            ->where('id', $user_id)
            ->get();
        $total_users = $user->count();
        $status = Status::find($status_id);
        $user = User::findOrFail($user_id);

        return view('admin.detail-alumni', compact(
            'status',
            'status_id',
            'skema_id',
            'periode_id',
            'user_id',
            'user'
        ));
    }
}