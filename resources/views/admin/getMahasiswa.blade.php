@extends('admin.main')

@section('container')
    <div class="container mt-5">

        <h3>Mahasiswa aktif fakultas {{ $fakultas->nama }} </h3>
        <h3>Angkatan {{ $angkatan->tahun }}</h3>
        <div class="mid-row">
            <small>Total {{ $total_users }} mahasiswa.</small>
            <!-- Tombol Cetak -->
            <div class="cetak-button">
                <button id="cetakDataButton" class="btn btn-primary mb-3">Cetak Data</button>
            </div>

        </div>

        <!-- Form Pencarian -->
        <form
            action="{{ route('info.users', ['status_id' => $status_id, 'skema_id' => $skema_id, 'angkatan_id' => $angkatan_id, 'fakultas_id' => $fakultas_id]) }}"
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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                        <td>{{ $user->nim }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->skema->nama }}</td>
                        <td>{{ $user->prodi->nama }}</td>
                        <td>

                            <div class="row-aksi">
                                <a href="{{ route('detail.user', ['status_id' => $status_id, 'skema_id' => $skema_id, 'angkatan_id' => $angkatan_id, 'fakultas_id' => $fakultas_id, 'user_id' => $user->id]) }}"
                                    class="badge bg-info rounded-pill" title="Lihat"> <span
                                        class="material-symbols-outlined">visibility</span></a>




                                <button class="aksi-button badge bg-warning rounded-pill  border-0" title="Berhentikan"
                                    data-bs-toggle="modal" data-bs-target="#modalBerhenti" data-nama="{{ $user->nama }}"
                                    data-nim="{{ $user->nim }}" data-id="{{ $user->id }}"> <span
                                        class="material-symbols-outlined ">close</span></button>



                                <!-- Modal -->
                                <div class="modal fade" id="modalBerhenti" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Berhentikan Mahasiswa
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('diberhentikan.mahasiswa', ['id' => $user->id]) }}"
                                                method="post">

                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="periode_id">Periode</label>
                                                        <select name="periode_id" id="periode_id" class="form-select"
                                                            required>
                                                            @foreach ($periodes as $periode)
                                                                <option value="{{ $periode->id }} ">
                                                                    {{ $periode->periode }}
                                                                </option>
                                                            @endforeach
                                                        </select>


                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="alasan">Alasan</label>
                                                        <textarea name="alasan" id="alasan" class="form-control" rows="3" required></textarea>

                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success">Berhentikan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <button class="aksi-button badge bg-success rounded-pill  border-0" data-bs-toggle="modal"
                                    data-bs-target="#modalAlumni" title="Alumni"> <span
                                        class="material-symbols-outlined">school</span></button>

                                <!-- Modal -->
                                <div class="modal fade" id="modalAlumni" data-bs-backdrop="static" data-bs-keyboard="false"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Alumni Mahasiswa</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action=" {{ route('alumni.mahasiswa', ['id' => $user->id]) }}"
                                                method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="periode_id">Periode</label>
                                                        <select name="periode_id" id="periode_id" class="form-select">
                                                            @foreach ($periodes as $periode)
                                                                <option value="{{ $periode->id }}">
                                                                    {{ $periode->periode }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success">Alumnikan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <form action="{{ route('hapus.mahasiswa', ['id' => $user->id]) }}" method="post"
                                    style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge bg-danger  rounded-pill" title="Hapus"
                                        style="border: none"
                                        onclick="return confirm('Anda yakin menghapus data akun {{ $user->nama }} ?')"><span
                                            class="material-symbols-outlined">delete</span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-2 mb-2">
            {{ $users->links() }} <!-- Link pagination -->
        </div>
    </div>

    <script>
        document.getElementById('cetakDataButton').addEventListener('click', function() {
            fetch(
                    "{{ route('export.mahasiswa-aktif', ['status_id' => $status_id, 'skema_id' => $skema_id, 'angkatan_id' => $angkatan_id, 'fakultas_id' => $fakultas_id]) }}"
                )
                .then(response => response.json())
                .then(data => {
                    window.open(data.url, '_blank');
                })
                .catch(error => console.error('Error:', error));
        });
    </script>

    <style>
        .container {
            width: 80vw;
            margin: 0;
            padding: 0;
        }
    </style>
@endsection
