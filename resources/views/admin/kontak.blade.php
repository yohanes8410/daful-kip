@extends('admin.main')

@section('container')
    <div class="container mt-5">

        <h3>Kontak Mahasiswa dan Orang Tua/Wali</h3>
        <div class="mid-row">
            <small>Total {{ $total_users }} mahasiswa.</small>
            <!-- Tombol Cetak -->
            <div class="cetak-button">
                <button id="cetakDataButton" class="btn btn-primary mb-3">Cetak Data</button>
            </div>

        </div>



        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>No. WhatsApp Mahasiswa</th>
                    <th>No. WhatsApp Orang Tua/Wali</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                        <td>{{ $user->nim }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->prodi->nama }}</td>
                        <td>{{ $user->no_mhs }}</td>
                        <td>{{ $user->no_ortu }}</td>


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
