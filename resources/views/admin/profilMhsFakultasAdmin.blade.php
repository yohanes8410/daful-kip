@extends('admin.main')

@section('container')
    <div class="btn-fakultas d-flex">
        <button type="button" class="add-button" data-bs-toggle="modal" data-bs-target="#modalTambahFakultas">
            + Fakultas
        </button>

        <button type="button" class="add-button ml-2" data-bs-toggle="modal" data-bs-target="#modalTambahProdi">
            + Prodi
        </button>
    </div>
    <!-- Modal  Fakultas-->
    <div class="modal fade" id="modalTambahFakultas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Fakultas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tambah_admin.profil-mahasiswa-fakultas') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Fakultas</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Singkatan</label>
                            <input type="text" name="slug" class="form-control" id="slug">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Prodi-->
    <div class="modal fade" id="modalTambahProdi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Program Studi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tambah_admin.profil-mahasiswa-prodi') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="fakultas_id" class="form-label">Pilih Fakultas</label>
                            <select name="fakultas_id" id="fakultas_id" class="form-select" required>
                                @foreach ($fakultas as $fk)
                                    <option value="{{ $fk->id }}">{{ $fk->nama }}</option>
                                @endforeach
                            </select>

                            {{-- <input type="text" name="fakultas_id" class="form-control" id="fakultas_id"> --}}
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Program Studi</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-profil">

        @foreach ($fakultas as $fk)
            <div class="card mb-3">
                <div class="content">
                    <div class="text-area">
                        <a
                            href="{{ route('info.users', ['status_id' => $status_id, 'skema_id' => $skema_id, 'angkatan_id' => $angkatan_id, 'fakultas_id' => $fk->id]) }}">
                            <h3>Fakultas</h3>
                            <h1>{{ $fk->nama }}</h1>
                        </a>
                    </div>


                    <a href="{{ route('hapus_admin.profil-mahasiswa-fakultas', $fk->id) }}"
                        onclick="return confirm('Anda yakin menghapus fakultas {{ $fk->nama }} ?')">
                        <img src="/img/delete.png" class="delete-icon">
                    </a>

                </div>
            </div>
        @endforeach
    </div>
@endsection
