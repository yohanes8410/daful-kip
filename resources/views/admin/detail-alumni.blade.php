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
                <th>Angkatan</th>
                <td>{{ $user->angkatan->tahun }}</td>
            </tr>
            <tr>
                <th>Fakultas</th>
                <td>{{ $user->fakultas->nama }}</td>
            </tr>
            <tr>
                <th>Program Studi</th>
                <td>{{ $user->prodi->nama }}</td>
            </tr>
            <tr>
                <th>WA mahasiswa</th>
                <td>{{ $user->no_mhs }}</td>
            </tr>
            <tr>
                <th>WA orang tua</th>
                <td>{{ $user->no_ortu }}</td>
            </tr>
            <tr>
                <th>Jenis kelamin</th>
                <td>{{ $user->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $user->alamat }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $status->nama }}</td>
            </tr>
            <tr>
                <th>Periode</th>
                <td>{{ $user->periode->periode }}</td>
            </tr>
        </table>
        <a href="{{ route('info.users-alumni', ['status_id' => $status_id, 'skema_id' => $skema_id, 'periode_id' => $periode_id]) }}"
            class="btn btn-primary">Kembali</a>
    </div>
@endsection
