@extends('mahasiswa.main')

@section('container')
    <div class="card text-dark bg-light mb-3 shadow-sm">
        <div class="card-header text-center">
            <strong>PROFIL MAHASISWA</strong>
        </div>
        <div class="card-body bg-white">
            @if (!$isProfileComplete)
                <div class="alert alert-warning">Profil Anda belum lengkap. Harap lengkapi profil untuk mengakses "Daftar
                    Ulang".</div>
            @endif
            <form action="#" method="POST" class="mt-2 mb-5">
                @csrf
                <!-- Form fields -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" value="{{ $users->nama }}" name="nama" id="nama" class="form-control"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" value="{{ $users->nim }}" name="nim" id="nim" class="form-control"
                        readonly>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="skema_id" class="form-label">Skema</label>
                            <input type="text" value="{{ $users->skema->nama }}" name="skema_id" id="skema_id"
                                class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="fakultas" class="form-label">Fakultas</label>
                            <input type="text" value="{{ $users->fakultas->nama }}" name="fakultas" id="fakultas"
                                class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="no_mhs" class="form-label">WA Mahasiswa</label>
                            <input type="text" value="{{ $users->no_mhs }}" name="no_mhs" id="no_mhs"
                                class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="angkatan" class="form-label">Angkatan</label>
                            <input type="text"
                                value="{{ $users->angkatan ? $users->angkatan->tahun : '- Pilih Angkatan -' }}"
                                name="angkatan" id="angkatan" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="prodi" class="form-label">Program Studi</label>
                            <input type="text" value="{{ $users->prodi->nama }}" name="prodi" id="prodi"
                                class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="no_ortu" class="form-label">WA Orang Tua/Wali</label>
                            <input type="text" value="{{ $users->no_ortu }}" name="no_ortu" id="no_ortu"
                                class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <input type="text" value="{{ $users->jenis_kelamin == 'lk' ? 'Laki - laki' : 'Perempuan' }}"
                        name="jenis_kelamin" id="jenis_kelamin" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email (untan.ac.id)</label>
                    <input type="email" value="{{ $users->email }}" name="email" id="email" class="form-control"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" value="{{ $users->alamat }}" name="alamat" id="alamat" class="form-control"
                        readonly>
                </div>
                <div class="edit-button">
                    <input type="button" name="submit" value="Edit" class="btn"
                        onclick="window.location.href = '{{ route('mahasiswa.edit') }}'">
                </div>
            </form>
        </div>
    </div>
@endsection
