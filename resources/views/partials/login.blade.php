{{-- PART OF DASHBOARD VIEW --}}


<main class="content">
    <div class="circle"></div>
    <h1>
        APLIKASI DAFTAR
    </h1>
    <h1>ULANG KIP</h1>
</main>

{{-- Input Group --}}
<form action="{{ route('login') }}" method="post">
    @csrf
    <div class="input-group mt-3 mb-3">
        <input type="text" name="nim" class="form-control form-control-lg" id="nim"
            placeholder="Username ( NIM bagi mahasiswa)" autofocus required value="{{ old('nim') }}">

    </div>
    <div class="input-group mb-2">
        <input type="password" name="password"
            class="form-control form-control-lg @error('password') is-invalid @enderror" id="password"
            placeholder="Password" required>
    </div>

    {{-- Link Lupa Password --}}
    <div class="btn-forget mb-2">
        <a href="{{ route('password.request') }}" target="_blank">Lupa Password?</a>
    </div>
    {{-- Button Group --}}
    <div class="btn-group">
        <div class="btn-1">
            <button class="btn" type="submit">MASUK</button>
        </div>



        <div class="btn-2">
            <a href="/register" class="btn">DAFTAR</a>
        </div>

</form>





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
