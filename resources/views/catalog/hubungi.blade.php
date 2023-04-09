<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Data -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Lato:wght@300;400;700&family=Noto+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
        crossorigin="anonymous"
    />

    <!--Style-->
    <link rel="stylesheet" href="{{asset('css/hubungiStyle.css')}}" />

    <!-- Title of Site -->
    <title>Hubungi Kami | FURTABLE</title>

    <!-- Logo Web -->
    <link rel="shortcut icon" type="image/icon" href="img/hubungi/logo.png" />
</head>

<body>
    <!-- Navbar start -->
    <nav class="navbar">
        <div>
            <a href="#" class="navbar-logo">
                <img src="img/logo.png" alt="logo" width="30" height="24" class="d-inline-block align-text-top">
                FURTABLE
            </a>
    
            <div class="navbar-nav">
                <a href="#home">Home</a>
                <a href="#Product">Product</a>
                <a href="#Tentang">Tentang</a>
            </div>
        </div>

        <div class="navbar-extra">
            <div class="search-box">
                <a><img src="img/hubungi/assets(svg)/icon-search-search-normal.svg" /></a>
                <input type="search" placeholder="Search" />
            </div>
            <a href="#" id="hamburger-menu" class="menu"><i data-feather="menu"></i></a>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Button Back -->
    <div class="back">
        <a href="#back"><img src="./img/hubungi/assets-icon/back.png" alt=""></a>
    </div>
    <!-- end Button -->

    <!-- hubungi kami -->
    <div class="kolom">
        <section class="kiri">
            <h1>Hubungi Kami</h1>
            <div class="gambar1">
                <img src="img/hubungi/hubungi-bangunan.png" alt="">
            </div>
            <div class="gambar2">
                <img src="img/hubungi/hubungi-bangunan2.png" alt="">
            </div>
        </section>
        <section class="kanan">
            <h2>Hubungi Kami  - Furtable Call Center</h2>
            <p class="desc">Jika terdapat pertanyaan, kami siap membantu. Hubungi layanan kami dibawah ini, jika anda mengalami kesulitan yang sangat berarti.</p>
            <p class="nomer">Layanan Pelanggan Furtable <br> Telepon +6281392413876 <br> Whatsapp +62813-9241-3876</p>
            <p class="anda">Anda dapat menghubungi kami Senin - Minggu: <br> 10:00 s/d 21:00</p>
            <p class="email">Kirim E-mail <br> furtableindonesia@gmail.com</p>
            <p class="desc-nomer">E-mail kami kapan pun dan kami akan membalasnya dalam 24 jam.</p>
            <p class="pengaduan">Layanan Pengaduan Konsumen</p>
            <p class="desc-pengaduan">Ditjen Perlindungan Konsumen dan Tertib Niaga Kementerian Perdagangan RI <br> No. Whatsapp : +6281392413876</p>
        </section>
    </div>

        <!-- Footer start -->
    <footer class="mainfooter" role="contentinfo">
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col">
                    <!--Column1-->
                        <div class="footer-pad">
                            <h4>BANTUAN</h4>
                            <ul class="list-unstyled">
                                <li><a href="#">Hubungi Kami</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <!--Column1-->
                        <div class="footer-pad">
                            <img src="./img/hubungi/assets-icon/logowhite.png">
                            <ul class="list-unstyled">
                                <li><a href="#">Tentang Kami</a></li>
                                <li><a href="#">Sosial Media</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <!--Column1-->
                        <div class="footer-pad">
                            <h4>Aplikasi Kami</h4>
                            <div class="list-unstyled" >
                                <h5>Download Furtable di Playstore dan dapatkan diskon melimpah.</h5>
                            </div>
                            <img src="img/hubungi/assets-icon/playstore.png">
                        </div>
                    </div>
                </div>
                <div class="copy">
                    <div class="col-md-12 copy">
                        <p class="text-center">&copy; Copyright 2023 - Furtable.  All rights reserved.</p>
                    </div>
                 </div>
            </div>
        </div>
      </footer>
    <!-- Footer end -->

    

    <!-- Feather Icons -->
    <script>
        feather.replace()
    </script>

    <!-- Hamburger menu -->
    <script src="js/script.js"></script>

</body>
</html>