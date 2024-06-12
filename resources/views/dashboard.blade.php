<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/logoUntan.png">
    <title>Daftar Ulang KIP</title>

    {{-- Fonts --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="{{ url('css') }}/sweetalert2.min.css">
    <script src="{{ url('js') }}/sweetalert2.min.js"></script>

    {{-- My Style --}}
    <link rel="stylesheet" href="/css/landingPageStyle.css">

    {{-- Feather Icons --}}
    <script src="https://unpkg.com/feather-icons"></script>

    {{-- About Section --}}
    {{-- <link rel="stylesheet" href="/css/aboutSection.css"> --}}

</head>

<body>
    @include('partials.notif')

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div class="d-inline">
                    <img src="img/logoUntan.png" class="float-start me-2" style="height: 50px;" alt="Logo UNTAN">
                </div>
                <div style="font-weight: 700">
                    <div class="text-white">BIRO AKADEMIK DAN KEMAHASISWAAN</div>
                    <div class="text-white" style="margin-top: -0.5rem">UNIVERSITAS TANJUNGPURA</div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="home" id="home">
        <div class="container">

            @include('partials.login')

            <div class="home-img d-inline-block">
                <img src="img/landingPageCard.png" alt="Kartu KIP">
            </div>

        </div>
    </section>

    {{-- About Section --}}

    <section id="about" class="about">
        <h2>Tentang Kami</h2>
        <h3>Kartu Indonesia Pintar Kuliah (KIP Kuliah) adalah program pemerintah Indonesia yang diadakan dengan tujuan
            untuk memberikan bantuan biaya pendidikan kepada mahasiswa perguruan tinggi yang ditujukan bagi keluarga
            kurang mampu.</h3>
        <h3>KIP Kuliah diperuntukkan bagi mahasiswa yang memenuhi kriteria tertentu seperti memiliki Kartu Keluarga
            Sejahtera (KKS), memiliki surat keterangan tidak mampu, serta memiliki prestasi akademik yang baik.</h3>
        <div class="circle-2"></div>
    </section>



    {{-- Contact Section --}}
    <section id="contact" class="contact">

        <div class="contact-section">

            <img src="img/shape.png" class="square" alt="" />
            <div class="form">
                <div class="contact-info">
                    <h3 class="title">Ada pertanyaan ?</h3>
                    <p class="text">
                        Silahkan hubungi kami di jam kerja.<br>(08.00 WIB - 16.00 WIB)
                    </p>

                    <div class="info">
                        <div class="information">
                            <img src="/img/google-maps.png" class="icon loc" alt="" />
                            <p>Bansir Laut, Kec. Pontianak Tenggara, Kota Pontianak, Kalimantan Barat </p>
                        </div>
                        <div class="information">
                            <img src="/img/telegram.png" class="icon telegram" alt="" />
                            <p>@Rahmawatiariyanto</p>
                        </div>
                        <div class="information">
                            <img src="/img/whatsapp.png" class="icon whatsapp" alt="" />
                            <p>0857-0556-3741</p>
                        </div>
                    </div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.816122844432!2d109.3422849097765!3d-0.060134735513223354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d59904f7e33ef%3A0xae24d9b9416cd964!2sBiro%20Akademik%20dan%20Kemahasiswaan%20(BAK)!5e0!3m2!1sid!2sid!4v1716191668448!5m2!1sid!2sid"
                        width="350" height="150" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    {{-- <div class="social-media">
                        <p>Connect with us :</p>
                        <div class="social-icons">
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div> --}}
                </div>

                <div class="contact-form">
                    <span class="circle one"></span>
                    <span class="circle two"></span>

                    <form>
                        <h3 class="title">Terhubung melalui WhatsApp !</h3>

                        <div class="input-container">
                            <input type="text" name="nama" id="nama" class="input" />
                            <label for="nama">Nama</label>
                            <span>Nama</span>
                        </div>
                        <div class="input-container">
                            <input type="text" name="nomor_induk" id="nomor_induk" class="input" />
                            <label for="nomor_induk">NIM</label>
                            <span>NIM</span>
                        </div>
                        <div class="input-container">
                            <input type="text" name="skema" id="skema" class="input" />
                            <label for="skema">Skema</label>
                            <span>Skema</span>
                        </div>
                        <div class="input-container">
                            <input type="text" name="fakultas" id="fakultas" class="input" />
                            <label for="fakultas">Fakultas</label>
                            <span>Fakultas</span>
                        </div>
                        <div class="input-container textarea">
                            <textarea name="pesan" id="pesan" class="input"></textarea>
                            <label for="pesan">Pesan</label>
                            <span>Pesan</span>
                        </div>
                        <button type="button" onclick="sendwhatsapp();" class="btn">Kirim</button>
                    </form>
                </div>
            </div>
        </div>


        <div class="circle-3"></div>
    </section>



    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    {{-- Feather Icons --}}
    <script>
        feather.replace();
    </script>


    <script src="/js/aboutSection.js"></script>

    <script>
        function sendwhatsapp() {
            let number = "+6285348322696"

            let nama = document.getElementById('nama').value;
            let nim = document.getElementById('nomor_induk').value;
            let skema = document.getElementById('skema').value;
            let fakultas = document.getElementById('fakultas').value;
            let pesan = document.getElementById('pesan').value;

            var url = "https://wa.me/" + number + "?text=" + "Permisi admin, maaf mengganggu. Saya " + nama + "%0a%0a" +
                "NIM : " + nim + "%0a" +
                "Skema : " + skema + "%0a" +
                "Fakultas : " + fakultas + "%0a" +
                "Pesan : " + pesan + "%0a";

            window.open(url, '_blank').focus();
        }
    </script>

</body>

</html>
