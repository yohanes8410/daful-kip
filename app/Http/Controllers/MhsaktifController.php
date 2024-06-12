<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\Fakultas;
use App\Models\Periode;
use App\Models\Skema;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class MhsaktifController extends Controller
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
        $skemas = Skema::all();
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        return view('admin.profilMhsAdmin', compact('skemas', 'status_id', 'total_users_konfirmasi'));
    }

    public function showAngkatan($status_id, $skema_id)
    {
        $angkatans = Angkatan::orderBy('tahun', 'desc')->get();
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        return view('admin.profilMhsAngkatanAdmin', compact('angkatans', 'status_id', 'skema_id', 'total_users_konfirmasi'));
    }

    public function showFakultas($status_id, $skema_id, $angkatan_id)
    {
        $fakultas = Fakultas::all();
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        return view('admin.profilMhsFakultasAdmin', compact('fakultas', 'status_id', 'skema_id', 'angkatan_id', 'total_users_konfirmasi'));
    }

    public function viewUsers(Request $request, $status_id, $skema_id, $angkatan_id, $fakultas_id)
    {


        $search = $request->input('search');
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        $periodes = Periode::all();
        $fakultas = Fakultas::find($fakultas_id);
        $angkatan = Angkatan::find($angkatan_id);
        $statusModel = Status::findOrFail($status_id);

        $usersQuery = User::where('status_id', $status_id)
            ->where('skema_id', $skema_id)
            ->where('angkatan_id', $angkatan_id)
            ->where('fakultas_id', $fakultas_id)
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

        return view('admin.getMahasiswa', compact('status_id', 'skema_id', 'angkatan_id', 'fakultas_id', 'periodes', 'users', 'statusModel', 'total_users', 'fakultas', 'angkatan', 'total_users_konfirmasi'));
    }


    public function detailUser($status_id, $skema_id, $angkatan_id, $fakultas_id, $user_id)
    {
        // $status_id = $request->status_id;
        // $skema_id = $request->skema_id;
        // $angkatan_id = $request->angkatan_id;
        // $fakultas_id = $request->fakultas_id;
        $total_users_konfirmasi = User::where('role', 'mahasiswa')->where('is_active', false)->count();
        $user = User::where('status_id', $status_id)
            ->where('skema_id', $skema_id)
            ->where('angkatan_id', $angkatan_id)
            ->where('fakultas_id', $fakultas_id)
            ->where('id', $user_id)
            ->get();
        $status = Status::find($status_id);
        $user = User::findOrFail($user_id);

        return view('admin.detail-mahasiswa', compact('status', 'status_id', 'skema_id', 'angkatan_id', 'fakultas_id', 'user_id', 'user', 'total_users_konfirmasi'));
    }
}