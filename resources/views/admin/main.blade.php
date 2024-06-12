<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logoUntan.png">
    <title>Dashboard Admin</title>





    <!-- Custom styles for this template -->
    <link href="/css/dashboardadmin.css" rel="stylesheet">
    <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="/css/sidebars.css" rel="stylesheet">

    {{-- Google Icon --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    {{-- feather icons --}}
    <script src="https://unpkg.com/feather-icons"></script>

    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="{{ url('css') }}/sweetalert2.min.css">
    <script src="{{ url('js') }}/sweetalert2.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav  sidebar-dark accordion" id="accordionSidebar" style="background-color: #0F0529;">


            {{-- <li>
                <div class="header">
                    <div class="list-item">
                        <img src="/img/logoUntan.png" alt="Universitas Tanjungpura">
                    </div>
                </div>
            </li>

            <div class="nav-group mt-3">
                <li class="nav-item active">
                    <a class="nav-link" href="/halaman-utama">
                        <i data-feather="grid"></i>
                        <span>Halaman Utama</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/profil-mahasiswa-admin">
                        <i data-feather="user"></i>
                        <span>Profil Mahasiswa</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/pesan-otomatis">
                        <i data-feather="message-square"></i>
                        <span>Pesan Otomatis</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/konfirmasi-akun">
                        <i data-feather="user-check"></i>
                        <span>Konfirmasi Akun</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/daful-mahasiswa-admin">
                        <i data-feather="file-text"></i>
                        <span>Daftar Ulang</span></a>
                </li>
                <li class="nav-item active">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="nav-link">
                            <i data-feather="log-out"></i>
                            <span class="description-logout">Keluar</span>
                        </button>
                    </form>
                </li>
            </div> --}}

            <div class="flex-shrink-0 p-3" style="width: 280px">
                <div class="header">
                    <div class="list-item">
                        <img src="/img/logoUntan.png" alt="Universitas Tanjungpura">
                    </div>
                </div>
                <ul class="list-unstyled ps-0">
                    <li class="mb-0">
                        <a class="nav-link" href="/halaman-utama">
                            <button class="btn d-inline-flex align-items-center fw-bold">
                                Halaman Utama
                            </button>
                        </a>
                    </li>
                    <li class="drop-down mb-0">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                            data-bs-toggle="collapse" data-bs-target="#orders-collapse">
                            <span>Profil Mahasiswa</span>
                        </button>
                        <div class="collapse" id="orders-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li>
                                    <a href="{{ route('show.skema-aktif', ['status_id' => 1]) }}"
                                        class="link-body-emphasis d-inline-flex text-decoration-none rounded"><span>Mahasiswa
                                            Aktif</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('show.skema-pasif', ['status_id' => 2]) }}"
                                        class="link-body-emphasis d-inline-flex text-decoration-none rounded"><span>Diberhentikan</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('show.skema-alumni', ['status_id' => 3]) }}"
                                        class="link-body-emphasis d-inline-flex text-decoration-none rounded"><span>Alumi</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="drop-down mt-2">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed "
                            data-bs-toggle="collapse" data-bs-target="#dashboard-collapse">
                            <span>Pesan Otomatis</span>
                        </button>
                        <div class="collapse" id="dashboard-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li>
                                    <a href="{{ route('admin.kontak') }}"
                                        class="link-body-emphasis d-inline-flex text-decoration-none rounded"><span>Kontak</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('reminders.create') }}"
                                        class="link-body-emphasis d-inline-flex text-decoration-none rounded"><span>Broadcast</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-0">
                        <a class="nav-link" href="{{ route('admin.konfirmasi-akun') }}">
                            <button class="btn d-inline-flex align-items-center fw-bold position-relative">
                                Konfirmasi Akun
                                @if ($total_users_konfirmasi > 0)
                                    <span id="unconfirmed-count"
                                        class="position-absolute translate-middle badge rounded-pill bg-danger"
                                        style="left: 128px; top:5px">
                                        {{ $total_users_konfirmasi }}
                                    </span>
                                @endif
                            </button>
                        </a>
                    </li>
                    <li class="mb-0" style="margin-top: -7px">
                        <a class="nav-link" href={{ route('admin.forms') }}>
                            <button class="btn d-inline-flex align-items-center fw-bold">
                                Daftar Ulang
                            </button>
                        </a>
                    </li>
                    <li class="mb-0">
                        <form action="/logout" method="post">
                            @csrf
                            <button class="btn d-inline-flex align-items-center fw-bold">
                                <span class="description-logout">Keluar</span>
                            </button>

                    </li>
                    {{-- <li class="border-top my-3"></li> --}}

                </ul>
            </div>

        </ul>


        <div id="content-wrapper" class="d-flex flex-column">


            <div id="content">


                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                    <marquee direction="left">Selamat Datang Admin di Aplikasi Daftar Ulang KIP-Kuliah Universitas
                        Tanjungpura, semoga harimu menyenangkan !</marquee>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo, Admin !</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../controllers/logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('container')
                    <!-- main content -->

                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->

        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    @include('partials.notif')


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


    <script src="/js/sidebars.js"></script>

    <script src="/js/bootstrap/bootstrap.bundle.min.js"></script>
    {{-- Sweet Alert --}}

    {{-- <script>
        @if (session('delete'))
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelled",
                        text: "Your imaginary file is safe :)",
                        icon: "error"
                    });
                }
            });
        @endif
    </script> --}}



    <script>
        function konfirmasi(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: "Hapus data ?",
                // text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    // window.location.href = "profil-mahasiswa-aktif-admin/angkatan/hapus/" + id;

                    swalWithBootstrapButtons.fire({
                        title: "Terhapus !",
                        text: "Data berhasil dihapus.",
                        icon: "success"
                    });

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: "Dibatalkan",
                        text: "Data batal dihapus.",
                        icon: "error"
                    });
                }
            });
        }
    </script>



    <!-- resources/views/angkatan/index.blade.php -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.delete-angkatan').click(function() {
                var angkatanId = $(this).data('id');
                var token = $("meta[name='csrf-token']").attr("content");

                if (confirm("Are you sure you want to delete this angkatan?")) {
                    $.ajax({
                        url: '/angkatan/' + angkatanId,
                        type: 'DELETE',
                        data: {
                            "_token": token,
                        },
                        success: function(response) {
                            if (response.success) {
                                alert(response.success);
                                location.reload(); // Refresh halaman setelah menghapus
                            } else {
                                alert(response.error);
                            }
                        },
                        error: function(response) {
                            alert('Something went wrong.');
                        }
                    });
                }
            });
        });
    </script>


</body>

</html>
