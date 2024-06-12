@extends('mahasiswa.main')

@section('container')
    <div class="card text-dark bg-light mb-3 shadow-sm">
        <div class="card-header text-center">
            <strong>EDIT PROFIL MAHASISWA</strong>
        </div>
        <div class="card-body bg-white">
            <form action="{{ route('mahasiswa.update', $users->id) }}" method="post" class="mt-2 mb-5">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" value="{{ $users->nama }}" name="nama" id="nama"
                        class="form-control @error('nama') is-invalid @enderror" readonly>
                    @error('nama')
                        <small class="invalid-feedback" style="position: absolute; margin-top: -1px">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" value="{{ $users->nim }}" name="nim" id="nim"
                        class="form-control @error('nim') is-invalid @enderror" readonly>
                    @error('nim')
                        <small class="invalid-feedback" style="position: absolute; margin-top: -1px">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="skema" class="form-label">Skema</label>
                            <select class="form-control" name="skema" id="skema" disabled>
                                <option value="kip" @if ($users->skema == 'kip') selected @endif>KIP-Kuliah Penuh
                                </option>
                                <option value="bbp" @if ($users->skema == 'bbp') selected @endif>Bantuan Biaya
                                    Pendidikan</option>
                            </select>
                            <input type="hidden" name="skema" value="{{ $users->skema }}">
                        </div>
                        <div class="mb-3">
                            <label for="fakultas_id" class="form-label">Fakultas</label>
                            <input type="text" value="{{ $users->fakultas->nama }}" name="fakultas_id" id="fakultas_id"
                                class="form-control" readonly>
                            <input type="hidden" value="{{ $users->fakultas->id }}" name="fakultas_id">
                        </div>
                        <div class="mb-3">
                            <label for="no_mhs" class="form-label">WA Mahasiswa</label>
                            <div class="input-group">
                                <input type="text" value="{{ $users->no_mhs }}" name="no_mhs" id="no_mhs"
                                    class="form-control @error('no_mhs') is-invalid @enderror">
                            </div>
                            @error('no_mhs')
                                <small class="invalid-feedback"
                                    style="position: absolute; margin-top: -1px">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="angkatan_id" class="form-label">Angkatan</label>
                            <select class="form-control @error('angkatan_id') is-invalid @enderror" name="angkatan_id"
                                id="angkatan_id">
                                <option value="">- Pilih Angkatan -</option>
                                @foreach ($angkatans as $angkatan)
                                    <option value="{{ $angkatan->id }}"
                                        {{ $angkatan->id == $users->angkatan_id ? 'selected' : '' }}>
                                        {{ $angkatan->tahun }}</option>
                                @endforeach
                            </select>
                            @error('angkatan_id')
                                <small class="invalid-feedback"
                                    style="position: absolute; margin-top: -1px">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="prodi_id" class="form-label">Program Studi</label>
                            <input type="text" value="{{ $users->prodi->nama }}" name="prodi_id" id="prodi_id"
                                class="form-control" readonly>
                            <input type="hidden" value="{{ $users->prodi->id }}" name="prodi_id">
                        </div>
                        <div class="mb-3">
                            <label for="no_ortu" class="form-label">WA Orang Tua/Wali</label>
                            <div class="input-group">
                                <input type="text" value="{{ $users->no_ortu }}" name="no_ortu" id="no_ortu"
                                    class="form-control @error('no_ortu') is-invalid @enderror">
                            </div>
                            @error('no_ortu')
                                <small class="invalid-feedback"
                                    style="position: absolute; margin-top: -1px">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                        id="jenis_kelamin">
                        <option value="lk" @if ($users->jenis_kelamin == 'lk') selected @endif>Laki - laki</option>
                        <option value="pr" @if ($users->jenis_kelamin == 'pr') selected @endif>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <small class="invalid-feedback"
                            style="position: absolute; margin-top: -1px">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email (untan.ac.id)</label>
                    <input type="email" value="{{ $users->email }}" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <small class="invalid-feedback"
                            style="position: absolute; margin-top: -1px">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" value="{{ $users->alamat }}" name="alamat" id="alamat"
                        class="form-control @error('alamat') is-invalid @enderror">
                    @error('alamat')
                        <small class="invalid-feedback"
                            style="position: absolute; margin-top: -1px">{{ $message }}</small>
                    @enderror
                </div>
                <div class="edit-button">
                    <input type="submit" name="submit" value="Update" class="btn">
                </div>
            </form>
        </div>
    </div>
@endsection
