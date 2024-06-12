@extends('admin.main')

@section('container')
    <button type="button" class="add-button" data-bs-toggle="modal" data-bs-target="#modalTambah">
        Tambah +
    </button>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Angkatan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tambah_admin.profil-mahasiswa-angkatan') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input type="number" name="tahun" class="form-control" id="tahun">
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
        @foreach ($angkatans as $angkatan)
            <div class="card mb-3">
                <div class="content">
                    <div class="text-area">
                        <a
                            href="{{ route('show.fakultas', ['status_id' => $status_id, 'skema_id' => $skema_id, 'angkatan_id' => $angkatan->id]) }}">
                            <h3>Angkatan</h3>
                            <h1>{{ $angkatan->tahun }}</h1>
                        </a>
                    </div>


                    <a href="{{ route('hapus_admin.profil-mahasiswa-angkatan', $angkatan->id) }}"
                        onclick="return confirm('Anda yakin menghapus angkatan {{ $angkatan->tahun }} ?')">
                        <img src="/img/delete.png" class="delete-icon">
                    </a>

                </div>
            </div>
        @endforeach





    </div>
@endsection
