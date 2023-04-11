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
    <link rel="stylesheet" href="{{asset('css/detailStyle.css')}}"/>

    <!-- Title of Site -->
    <title>Detail | FURTABLE</title>

    <!-- Logo Web -->
    <link rel="shortcut icon" type="image/icon" href="img/header/logo.png" />

</head>
<body> 
    {{-- Navbar --}}
    @include('catalog.layout.navbar')

    {{-- tombol back --}}
    <div class="back">
        <a href="#"><img src="img/detail/back.png"><a>
    </div>

    <div class="column">
        <section class="left">
            <div class="big-img">
                <img src="img/detail/mainSofa.png" alt="sofa">
            </div>
            <div class="images">
                <div class="small-img">
                    <img src="img/detail/mainSofa.png" alt="sofa" onclick="showImg(this.src);">
                </div>
                <div class="small-img">
                    <img src="img/detail/slider1.png" alt="sofa" onclick="showImg(this.src);">
                </div>
                <div class="small-img">
                    <img src="img/detail/slide2.png" alt="sofa" onclick="showImg(this.src);">
                </div>
                <div class="small-img">
                    <img src="img/detail/slide3.png" alt="sofa" onclick="showImg(this.src);">
                </div>
                <div class="small-img">
                    <img src="img/detail/slide4.png" alt="sofa" onclick="showImg(this.src);">
                </div>
            </div>
            <div class="big-img">
                <img src="img/detail/detail1.png" alt="sofa">
            </div>
            <div class="big-img">
                <img src="img/detail/detail2.png" alt="sofa">
            </div>
        </section>
        <section class="Right">
            <div class="judul">
                <h1>LANDSOVER</h1>
                <h2>Sofa, Set mebel</h2>
                <div class="harga">
                    {{-- @if($product->flashsale_price)
                        <div class="price">
                            <span class="original-price">Rp {{ number_format($product->price, 0, '.', ',') }}</span>
                            <span class="flashsale-price">Rp {{ number_format($product->flashsale_price, 0, '.', ',') }}</span>
                        </div>
                    @else
                        <div c lass="price">
                            <span class="normal-price">Rp {{ number_format($product->price, 0, '.', ',') }}</span>
                        </div>
                    @endif                   --}}
                </div>
            </div>
            <div class="warna">
                <h2>Warna</h2>
                
            </div>
            <div class="deskripsi">
                <h2>Deskripsi Produk</h2>
                
            </div>
            <div class="Bahan">
                <h3>Bahan</h3>
                
            </div>
            <div class="ukuran">
                <h3>Ukuran</h3>
                
            </div>
            <div class="want">
                <h2>Ingin Mendapatkan Produk ini?</h2>
                <p>Anda bisa mendapatkan produk ini dengan gampang, serta yang diskon melimpah, setiap hari dan diskon lainnya.</p>
                <div class="link">
                    <button class="cta">Belanja Sekarang!</button>
                    <img src="img/home/playstore.png">
                </div>
            </div>
            <div class="estimasi">
                <h1>Estimasi Pengiriman</h1>
                <img src="img/detail/truck-fast.png" alt="truck">
                <h4>Ongkos kirim mulai dari Rp 250.000<h4>
                <h3>(Masih estimasi, bisa lebih murah dan mahal)</h3>
                <h2>Reguler<span> (Perkiraan pesanan datang paling cepat 3 hari setelah pengiriman)<span></h2>
                <img src="img/detail/setting.png" alt="setting">
                <h4>Gratis biaya perakitan<h4>
                <p>Gratis pemasangan untuk setiap pembelanjaan di Furtable dan gratis konsultasi.</p>
            </div>
        </section>
    </div>


    {{-- Footer --}}
    @include('catalog.layout.footer')

    <!-- Feather Icons -->
    <script>
        feather.replace()
    </script>

    <!-- Hamburger menu -->
    <script src="js/script.js"></script>

    {{-- slide img --}}
    <script>
        let bigImg = document.querySelector('.big-img img');
        function showImg(pic) {
            bigImg.src = pic;
        }
    </script>
</body>
</html>