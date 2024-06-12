@extends('admin.main')

@section('container')
    <div class="container mt-5">

        <h3>Mahasiswa diberhentikan periode {{ $periode->periode }}</h3>
        <small>Total {{ $total_users }} mahasiswa.</small>

        <!-- Form Pencarian -->
        <form
            action="{{ route('info.users-pasif', ['status_id' => $status_id, 'skema_id' => $skema_id, 'periode_id' => $periode_id]) }}"
            method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                    placeholder="Cari berdasarkan NIM, Nama, atau Program Studi" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Skema</th>
                    <th>Prodi</th>
                    <th>Alasan</th>
                    <th>Aksi</th>
                    {{-- <th>Aksi</th> --}}

                    {{-- <th>Angkatan</th>
                    <th>Fakultas</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->nim }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->skema->nama }}</td>
                        <td>{{ $user->prodi->nama }}</td>
                        <td>{{ $user->alasan }}</td>

                        <td>


                            <a href="{{ route('detail.mahasiswa-pasif', ['status_id' => $status_id, 'skema_id' => $skema_id, 'periode_id' => $periode_id, 'user_id' => $user->id]) }}"
                                class="badge bg-info rounded-pill" title="Lihat"> <span
                                    class="material-symbols-outlined">visibility</span></a>

                            <a href="{{ route('aktifkan.mahasiswa', ['id' => $user->id]) }}"
                                class="badge bg-warning rounded-pill" title="Aktifkan kembali"
                                onclick="return confirm('Anda yakin mengkatifkan kembali data akun {{ $user->nama }} ?')">
                                <span class="material-symbols-outlined">recycling</span></a>

                            <form action="{{ route('hapus.mahasiswa-pasif', ['id' => $user->id]) }}" method="post"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge bg-danger  rounded-pill" title="Hapus"
                                    style="border: none"><span class="material-symbols-outlined"
                                        onclick="return confirm('Anda yakin menghapus data akun {{ $user->nama }} ?')">delete</span></button>
                            </form>
                        </td>
                        {{-- <td>{{ $user->prodi->nama }}</td>
                        
                         --}}
                        {{-- <td>{{ $user->angkatan->tahun }}</td>
                        <td>{{ $user->fakultas->nama }}</td> --}}
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-2 mb-2">
            {{ $users->links() }} <!-- Link pagination -->
        </div>
    </div>

    <style>
        .container {
            width: 80vw;
            margin: 0;
            padding: 0;
        }
    </style>
@endsection
