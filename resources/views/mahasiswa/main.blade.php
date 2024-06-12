<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logoUntan.png">
    <title>Dashboard Mahasiswa</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/dashboardmahasiswa.css" rel="stylesheet">


    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- feather icons --}}
    <script src="https://unpkg.com/feather-icons"></script>

    {{-- Google Icon --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="{{ url('css') }}/sweetalert2.min.css">
    <script src="{{ url('js') }}/sweetalert2.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->


        <ul class="sidebar navbar-nav  sidebar-dark accordion" id="accordionSidebar" style="background-color: #0F0529;">


            <div class="flex-shrink-0 p-3" style="width: 280px">
                <div class="header">
                    <div class="list-item">
                        <img src="/img/logoUntan.png" alt="Universitas Tanjungpura">
                    </div>
                </div>
                <ul class="list-unstyled ps-0">
                    <li style="margin-bottom: -.5rem; position: relative;">
                        <a class="nav-link" href="{{ route('mahasiswa.profil') }}">
                            <button class="btn d-inline-flex align-items-center fw-bold">
                                Profil Mahasiswa
                            </button>
                        </a>
                    </li>
                    <li class="mb-0" style="position: relative;">
                        @if ($isProfileComplete)
                            <a class="nav-link" href="{{ route('mahasiswa.forms') }}">
                                <button class="btn d-inline-flex align-items-center fw-bold position-relative">
                                    Daftar Ulang
                                </button>
                            </a>
                        @else
                            <button class="btn d-inline-flex align-items-center fw-bold position-relative" disabled>
                                Daftar Ulang
                            </button>
                        @endif
                    </li>
                    <li class="mb-0">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn d-inline-flex align-items-center fw-bold">
                                <span class="description-logout">Keluar</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>


    </div>




    {{-- <div class="nav-group mt-3">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('mahasiswa.profil') }}">
                        <i data-feather="user"></i>
                        <span>Profil</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('mahasiswa.forms') }}">
                        <i data-feather="file-text"></i>
                        <span>Daftar Ulang</span></a>
                </li>
                <li class="nav-item active">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="nav-link">
                            <i data-feather="log-out"></i>
                            <span class="description-logout">Keluar</span>
                        </button>
                    </form>
                </li>
            </div> --}}


    </ul>


    <!-- End of Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <form class="form-inline">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </form>
                <marquee direction="left">Selamat Datang di Aplikasi Daftar Ulang KIP-Kuliah Universitas
                    Tanjungpura, semoga harimu menyenangkan !</marquee>
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo, {{ $users->nama }} !</span>
                        </a>
                        {{-- <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../controllers/logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div> --}}
                    </li>

                </ul>

            </nav>

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @yield('container')
                <!-- main content -->
            </div>
        </div>

    </div>

    </div>


    </div>
    <!-- End of Page Wrapper -->

    <style>
        .flex-shrink-0 {
            color: #000;
        }

        .badge {
            right: 300px !important;
            padding: 0.5em 0.7em;
            font-size: 1em !important;
            font-weight: 700;
            color: #fff;
            text-align: center;
            border-radius: 50%;
        }

        .badge-danger {
            background-color: #dc3545;
        }

        .position-absolute {
            position: absolute !important;
        }

        .top-0 {
            top: 0 !important;
        }

        .end-0 {
            right: 0 !important;
        }
    </style>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    {{-- feather icons --}}
    <script>
        feather.replace();
    </script>

    {{-- Sweet Alert --}}
    <script>
        @if (session('success_update'))
            Swal.fire({
                title: 'Update Berhasil !',
                icon: 'success',
                type: 'success',
                text: '{{ Session::get('success_update') }}'
            })
        @endif
    </script>



    {{-- Otomatis menampilkan fakultas sesuai inputan prodi mahasiswa --}}
    {{-- <script>
        document.getElementById('prodi_id').addEventListener('change', function() {
            var prodiId = this.value;
            fetch(`/get-fakultas/${prodiId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('fakultas').value = data.fakultas;
                });
        });
    </script> --}}

    {{-- <script>
        document.getElementById('prodi_id').addEventListener('change', function() {
            var prodiId = this.value;
            fetch(`/get-fakultas/${prodiId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('fakultas_nama').value = data.fakultas.nama;
                    document.getElementById('fakultas_id').value = data.fakultas.id;
                });
        });
    </script>
</body> --}}

</html>
