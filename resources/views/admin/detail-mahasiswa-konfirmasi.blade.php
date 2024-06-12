@extends('admin.main')

@section('container')
    <div class="container mt-5">
        <h1>Detail Mahasiswa</h1>
        <table class="table table-bordered">
            <tr>
                <th>NIM</th>
                <td>{{ $user->nim }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $user->nama }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Skema</th>
                <td>{{ $user->skema->nama }}</td>
            </tr>
            <tr>
                <th>Fakultas</th>
                <td>{{ $user->fakultas->nama }}</td>
            </tr>
            <tr>
                <th>Program Studi</th>
                <td>{{ $user->prodi->nama }}</td>
            </tr>
        </table>
        <a href="{{ route('admin.konfirmasi-akun') }}" class="btn btn-primary mb-3">Kembali</a>
    </div>
@endsection
