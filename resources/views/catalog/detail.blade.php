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
    <!-- Navbar start -->
    <nav class="navbar">
        <div>
            <a href="#" class="navbar-logo">
                <img src="img/tentang/logo.png" alt="logo" width="30" height="24" class="d-inline-block align-text-top">
                FURTABLE
            </a>

            <div class="navbar-nav">
                <a href="/">Home</a>
                <a href="/product">Product</a>
                <a href="/Tentang">Tentang</a>
            </div>
        </div>

        <div class="navbar-extra">
            <div class="search-box">
                <a><img src="img/tentang/assets(svg)/icon-search-search-normal.svg" /></a>
                <input type="search" placeholder="Search" />
            </div>
            <a href="#" id="hamburger-menu" class="menu"><i data-feather="menu"></i></a>
        </div>
    </nav>
    <!-- Navbar end -->

    {{-- tombol back --}}
    <div class="back">
        <a href="#"><img src="img/detail/back.png"><a>
    </div>

    <div class="column">
        <section class="left">
            <div class="big-img">
                <img src="{{ asset('/gambar/' . $barang->gambar[0])}}"/>
            </div>
            <div class="images">
                @foreach ($barang->gambar as $gambar)
                    <div class="small-img">
                        <img src="{{ asset('/gambar/'.$gambar)}}" alt="sofa" onclick="showImg(this.src);">
                    </div>   
                @endforeach
                {{-- <div class="small-img">
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
                </div> --}}
            </div>
            <div class="big-img">
                <img src="{{ asset('/gambar/' . $barang->gambar[3])}}"/>
            </div>
            <div class="big-img">
                <img src="{{ asset('/gambar/' . $barang->gambar[4])}}"/>
            </div>
        </section>
        <section class="Right">
            <div class="judul">
                <h1>{{ $barang->nama_barang }}</h1>
                <h2>{{ $barang->kategori }}</h2>
                <div class="harga">
                    @if($barang->flashsale=="yes")
                    <div class="price">
                      <span class="original-price">Rp {{ number_format($barang->harga, 0, ',', '.') }}</span>
                      <span class="flashsale-price">Rp {{ number_format($barang->harga_diskon, 0, ',', '.') }}</span>
                    </div>
                  @else
                    <div class="price">
                      <span class="normal-price">Rp {{ number_format($barang->harga, 0, ',', '.') }}</span>
                    </div>
                  @endif
                </div>
            </div>
            <div class="warna">
                <h2>Warna</h2>
                <h3>{{ $barang->warna }}</h3>
            </div>
            <div class="deskripsi">
                <h2>Deskripsi Produk</h2>
                <h3>{{ $barang->deskripsi_produk }}</h3>
            </div>
            <div class="Bahan">
                <h3>Bahan</h3>
                <h3>{{ $barang->bahan }}</h3>
            </div>
            <div class="ukuran">
                <h3>Ukuran</h3>
                <h3>{!! $barang->ukuran !!}</h3>
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
    <!-- Produk populer start -->
    <section class="populer">
        <h1>Produk yang mirip dengannya</h1>
        <div class="container">
            @foreach ($populer as $barang )
            <div class="card">
                <img src="{{ asset('/gambar/' . $barang->gambar[0]) }}"/>
                <div class="deskripsi">
                    <h4>{{ $barang->kategori }}</h4>

                    <h3>{{ $barang->nama_barang }}</h3>
                    
                    @if($barang->flashsale=="yes")
                    <div class="price">
                      <span class="original-price">Rp {{ number_format($barang->harga, 0, ',', '.') }}</span>
                      <span class="flashsale-price">Rp {{ number_format($barang->harga_diskon, 0, ',', '.') }}</span>
                    </div>
                  @else
                    <div class="price">
                      <span class="normal-price">Rp {{ number_format($barang->harga, 0, ',', '.') }}</span>
                    </div>
                  @endif
                </div>
                <a href="/detail/{{ $barang->id }}">Lihat detail</a>
            </div>
            @endforeach
        </div>
        <div class="cta">
            <a href="#" >Lihat Semua</a>
        </div>
    </section>
    <!-- Produk populer end-->


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