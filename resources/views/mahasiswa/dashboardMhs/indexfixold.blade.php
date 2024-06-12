<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Mahasiswa</title>
   
{{-- feather icons --}}
<script src="https://unpkg.com/feather-icons"></script>

{{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- My Style --}}
    <link rel="stylesheet" href="/css/dashboardmhs.css">
</head>
<body>
   <div class="container">
    {{-- Sidebar --}}
    <div class="sidebar">
        <div class="header">
            <div class="list-item">
                <img src="/img/yohanes.jpg" alt="">
                <a href="#">Ubah</a>
            </div>
        </div>
        <div class="main mt-4">
            <div class="list-item">
                <a href="/profilmhs">
                    <img src="/img/user.svg" alt="" class="icon">
                    <span class="description">Profil</span>
                </a>
            </div>
            <div class="list-item">
                <a href="/dafulmhs">
                    <img src="/img/file-text.svg" alt="" class="icon">
                    <span class="description">Daftar Ulang</span>
                </a>
            </div>

            <div class="list-item">
            <form action="/logout" method="post">
                @csrf
            
                <button class="logout-button">
                    <img src="/img/log-out.png" class="logout-img">

                    <span class="description-logout">Keluar</span>
                </button>
            </div>  
            </form>
        </div>
    </div>
   </div>
  



     {{-- Main Content --}}
    


     {{-- feather icons --}}
     <script>
        feather.replace();
      </script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="/js/dashboardmhs.js"></script>
</body>
</html>