@extends('admin.main')

@section('container')
    <div class="container">
        <h1>Konfirmasi Akun</h1>
        <h2>Total <span style="font-weight: 700">{{ $total_users_konfirmasi }}</span> akun menunggu konfirmasi.</h2>

        @if (session('success-activate'))
            <div class="alert
                alert-success alert-dismissible fade show">
                {{ session('success-activate') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('success-all-activate'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success-all-activate') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('hapus-akun'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('hapus-akun') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <form action="{{ route('admin.aktivasi-semua-akun') }}" method="POST">
            @csrf
            <div class="mt-3 mb-2">
                <button type="submit" class="btn btn-success mb-3"
                    onclick="return confirm ('Konfirmasi seluruh akun ?')">Konfirmasi seluruh akun</button>
            </div>
        </form>

        <!-- Form Pencarian -->
        <form action="{{ route('admin.konfirmasi-akun') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                    placeholder="Cari berdasarkan NIM, Nama, atau Program Studi" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                        <td>{{ $user->nim }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->prodi->nama }}</td>
                        <td>
                            <a href="{{ route('admin.detail-akun-konfirmasi', ['id' => $user->id]) }}"
                                class="badge bg-info rounded-pill" title="Lihat"><span
                                    class="material-symbols-outlined">visibility</span></a>

                            <form action="{{ route('admin.aktivasi-akun', $user->id) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                <button type="submit" class="badge bg-success rounded-pill" style="border: none"
                                    title="Konfirmasi"><span class="material-symbols-outlined"
                                        onclick="return confirm('Konfirmasi data akun {{ $user->nama }} ?')">task_alt</span></button>
                            </form>

                            <form action="{{ route('admin.hapus-akun', ['id' => $user->id]) }}" method="post"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge bg-danger  rounded-pill" title="Hapus"
                                    style="border: none"
                                    onclick="return confirm('Anda yakin menghapus data akun {{ $user->nama }} ?')"><span
                                        class="material-symbols-outlined">delete</span></button>
                            </form>
                        </td>
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
