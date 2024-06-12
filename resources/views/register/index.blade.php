<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    {{-- Feather Icons --}}
    <script src="https://unpkg.com/feather-icons"></script>

    {{-- CSS --}}
    <link rel="stylesheet" href="/css/registPageStyle.css">




    <link rel="icon" href="img/logoUntan.png">
    <title>Registrasi</title>
</head>

<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100 mt-2">
        <div class="flash" data-flash="@if (session()->has('success')) {{ session('success') }} @endif"></div>

        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #0F0529; height:770px">
                <p class="text-white fs-2" style="font-weight: 600;">APLIKASI DAFTAR ULANG KIP</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;">UNIVERSITAS TANJUNGPURA</small>
            </div>

            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box">

                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>BUAT AKUN SEKARANG !</h2>
                    </div>

                    {{-- Form --}}
                    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-2">
                            <input type="text" name="nama"
                                class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                                placeholder="Nama" value="{{ old('nama') }}" autofocus>
                            <label for="nama">Nama</label>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror"
                                id="nim" placeholder="NIM" value="{{ old('nim') }}">
                            <label for="nim">NIM</label>
                            @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-2">

                            {{-- <select id="prodi_id" name="prodi_id" class="form-select"> --}}
                            {{-- @foreach ($fakultass as $fakultas)
                                    <optgroup label="{{ $fakultas->nama }}">
                                        @foreach ($fakultas->prodi as $prodi) --}}
                            {{-- <option value="{{ $prodi->id }}" {{ $users->prodi_id == $prodi->id ? 'selected' : '' }}>
                                {{ $prodi->nama }}
                            </option> --}}
                            {{-- @if (old('prodi_id') == $prodi->id)
                                                <option value="{{ $prodi->id }}" selected>{{ $prodi->nama }}
                                                </option>
                                            @else
                                                <option value="{{ $prodi->id }}">{{ $prodi->nama }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select> --}}
                            <select id="prodi_id" name="prodi_id" class="form-select">
                                <option value="">Pilih Prodi (Bisa diketik)</option>
                                @foreach ($prodi as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                @endforeach
                            </select>
                            <label for="prodi_id">Program Studi</label>
                        </div>
                        <div class="form-floating mb-2">

                            {{-- <select class="form-select" name="fakultas_id" id="fakultas_id">
                                @foreach ($fakultass as $fakultas)
                                    @if (old('fakultas_id') == $fakultas->id)
                                        <option value="{{ $fakultas->id }}" selected>{{ $fakultas->nama }}</option>
                                    @else
                                        <option value="{{ $fakultas->id }}">{{ $fakultas->nama }}</option>
                                    @endif
                                @endforeach
                            </select> --}}

                            <input type="text" id="fakultas_name" class="form-control" readonly>
                            <input type="hidden" id="fakultas_id" name="fakultas_id">
                            <label for="fakultas_id">Fakultas</label>
                        </div>
                        <div class="form-floating mb-2">
                            <select class="form-select" name="skema_id" id="skema_id">
                                @foreach ($skemas as $skema)
                                    @if (old('skema_id') == $skema->id)
                                        <option value="{{ $skema->id }}" selected>{{ $skema->nama }}</option>
                                    @else
                                        <option value="{{ $skema->id }}">{{ $skema->nama }}</option>
                                    @endif
                                    {{-- <option value="kip">KIP-Kuliah Penuh</option>
                                <option value="bbp">Bantuan Biaya Pendidikan</option> --}}
                                @endforeach
                            </select>
                            <label for="skema_id">Skema</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="Email" value="{{ old('email') }}">
                            <label for="email">Email (untan.ac.id)</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class="form-floating mb-2">
                            <input type="text" name="no_mhs"
                                class="form-control @error('no_mhs') is-invalid @enderror" id="no_mhs"
                                placeholder="WhatsApp Mahasiswa" value="{{ old('no_mhs') }}">
                            <label for="no_mhs">WA Mahasiswa</label>
                            @error('no_mhs')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        {{-- <div class="form-floating mb-2">
                            <input type="text" name="no_ortu"
                                class="form-control @error('no_ortu') is-invalid @enderror" id="no_ortu"
                                placeholder="WhatsApp Orang Tua/Wali" value="{{ old('no_ortu') }}">
                            <label for="no_ortu">WA Orang Tua/Wali</label>
                            @error('no_ortu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        <div class="form-floating mb-4">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="Password">
                            <label for="password">Password</label>
                            <img src="img/eye-off.svg" id="eyeicon">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- <div class="input-group mb-3">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="NIM">
                </div>

                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                  </div> --}}
                        <div class="input-group mb-2">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Buat Akun</button>
                        </div>
                    </form>
                    <div class="login">
                        <small class="d-block text-center">Sudah punya akun?<a href="/dashboard"> Masuk</a>.</small>
                    </div>
                </div>
            </div>

        </div>
    </div>




    {{-- Sweet Alert --}}
    <script>
        const Alert = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
        Alert.fire({
            title: "Registrasi Berhasil !",
            text: "Silahkan menunggu konfirmasi dari admin.",
            icon: "success",
            showCancelButton: true,
            confirmButtonText: "Ok",
            reverseButtons: true
        });
        let flash = $('.flash').data('flash');
        if (flash) {
            Alert.fire({
                icon: "success",
                title: flash,
            });
        }
    </script>



    {{-- Feather Icons --}}
    <script>
        feather.replace();
    </script>

    {{-- Script Eye Icon --}}
    <script>
        let eyeicon = document.getElementById("eyeicon");
        let password = document.getElementById("password");

        eyeicon.onclick = function() {
            if (password.type == "password") {
                password.type = "text";
                eyeicon.src = "img/eye.svg";
            } else {
                password.type = "password";
                eyeicon.src = "img/eye-off.svg";
            }
        }
    </script>


    {{-- Otomatis menampilkan fakultas sesuai inputan prodi mahasiswa --}}
    <script>
        document.getElementById('prodi_id').addEventListener('change', function() {
            var prodiId = this.value;
            if (prodiId) {
                fetch(`/get-fakultas-by-prodi/${prodiId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.fakultas) {
                            document.getElementById('fakultas_name').value = data.fakultas.nama;
                            document.getElementById('fakultas_id').value = data.fakultas.id;
                        } else {
                            document.getElementById('fakultas_name').value = '';
                            document.getElementById('fakultas_id').value = '';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching fakultas:', error);
                        document.getElementById('fakultas_name').value = '';
                        document.getElementById('fakultas_id').value = '';
                    });
            } else {
                document.getElementById('fakultas_name').value = '';
                document.getElementById('fakultas_id').value = '';
            }
        });
    </script>
</body>

</html>
