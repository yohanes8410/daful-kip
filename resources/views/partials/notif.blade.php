{{-- @if (session('add'))
    <script type="text/javascript">
        document.getElementById('top-right');
        Toastify({
            text: "Data berhasil di tambahkan",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "#4fbe87",
        }).showToast();
    </script>
@endif --}}

{{-- NOTIF LOGIN --}}
<script>
    @if (session('success'))
        Swal.fire({
            title: 'Registrasi Berhasil !',
            icon: 'success',
            type: 'success',
            text: '{{ Session::get('success') }}',
            timerProgressBar: true,
            timer: 3000
        })
    @endif
</script>

<script>
    @if (session('loginError'))
        Swal.fire({
            title: 'Login Gagal !',
            icon: 'error',
            type: 'error',
            text: '{{ Session::get('loginError') }}',
            timerProgressBar: true,
            timer: 5000
        })
    @endif
</script>

<script>
    @if (session('loginGagal'))
        Swal.fire({
            title: 'Login Gagal !',
            icon: 'error',
            type: 'error',
            text: '{{ Session::get('loginError') }}',
            timerProgressBar: true,
            timer: 5000
        })
    @endif
</script>


{{-- NOTIF ADMIN --}}

<script>
    @if (session('addFakultas'))
        swal.fire({
            position: "top-end",
            icon: "success",
            title: "Fakultas berhasil ditambahkan !",
            showConfirmButton: true,
            timerProgressBar: true,
            timer: 3000
        })
    @endif
</script>

<script>
    @if (session('addProdi'))
        swal.fire({
            position: "top-end",
            icon: "success",
            title: "Program Studi berhasil ditambahkan !",
            showConfirmButton: true,
            timerProgressBar: true,
            timer: 3000
        })
    @endif
</script>


<script>
    @if (session('del'))
        swal.fire({
            position: "top-end",
            icon: "success",
            title: "Data berhasil dihapus !",
            showConfirmButton: true,
            timerProgressBar: true,
            timer: 3000
        })
    @endif
</script>

<script>
    @if (session('diberhentikan'))
        swal.fire({
            position: "top-end",
            icon: "success",
            title: "Mahasiswa diberhentikan !",
            showConfirmButton: true,
            timerProgressBar: true,
            timer: 3000
        })
    @endif
</script>

<script>
    @if (session('alumni'))
        swal.fire({
            position: "top-end",
            icon: "success",
            title: "Mahasiswa menjadi alumni !",
            showConfirmButton: true,
            timerProgressBar: true,
            timer: 3000
        })
    @endif
</script>

<script>
    @if (session('delete-user'))
        swal.fire({
            position: "top-end",
            icon: "success",
            title: "Akun berhasil dihapus !",
            showConfirmButton: true,
            timerProgressBar: true,
            timer: 3000
        })
    @endif
</script>

<script>
    @if (session('diaktifkan'))
        swal.fire({
            position: "top-end",
            icon: "success",
            title: "Mahasiswa diaktifkan kembali !",
            showConfirmButton: true,
            timerProgressBar: true,
            timer: 3000
        })
    @endif
</script>

{{-- NOTIF FORM --}}
<script>
    @if (session('success_add_form'))
        Swal.fire({
            title: 'Berhasil !',
            icon: 'success',
            type: 'success',
            text: '{{ Session::get('success_add_form') }}',
            timerProgressBar: true,
            timer: 3000
        })
    @endif
</script>
