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
                <td>
                    @if ($user->jenis_kelamin == 'pr')
                        Perempuan
                    @elseif ($user->jenis_kelamin == 'lk')
                        Laki-laki
                    @else
                        Mahasiswa belum memilih
                    @endif
                </td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $user->alamat }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $status->nama }}</td>
            </tr>
        </table>
        <a href="{{ route('info.users', ['status_id' => $status_id, 'skema_id' => $skema_id, 'angkatan_id' => $angkatan_id, 'fakultas_id' => $fakultas_id]) }}"
            class="btn btn-primary mb-3">Kembali</a>
    </div>
@endsection
