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
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Lato:wght@300;400;700&family=Noto+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />

    <!--Style-->
    <link rel="stylesheet" href="/css/stylecopy2.css" />

    <!-- Title of Site -->
    <title>Home | FURTABLE</title>

    <!-- Logo Web -->
    <link rel="shortcut icon" type="image/icon" href="img/logo.png" />

</head>

<body>
    
    <!-- Navbar start -->
    <nav class="navbar">
        <div>
            <a href="#" class="navbar-logo">
                <img src="img/header/logo.png" alt="logo" width="30" height="24" class="d-inline-block align-text-top">
                FURTABLE
            </a>

            <div class="navbar-nav">
                <a href="/home">Home</a>
                <a href="#Product">Product</a>
                <a href="/tentang">Tentang</a>
            </div>
        </div>
        <form>
            <div class="navbar-extra">
                <div class="search-box">
                    <button type="submit"><img src="img/header/search.svg" /></button>
                    <input name="search" type="search" placeholder="Search" />
                </div>
                <a href="#" id="hamburger-menu" class="menu"><i data-feather="menu"></i></a>
            </div>
        </form>
    </nav>

    <!-- Navbar end -->

    <!-- Hero Section start -->
    <section class="hero" id="home">
        <img src="img/produkiterasi/hero2.png">
        <main class="content">
            <p>Mau promo menarik dengan diskon yang pas di kantong? Ayo download aplikasinya sekarang! </p>
            <a href="https://play.google.com/store/apps?hl=id" class="cta">Belanja Sekarang!</a>

        </main>
    </section>

    <!-- lihat barang -->
    <section class="lihatbarang">
        <div class="container">
            <div class="card">
                <img src="img/produkiterasi/pi-1.png">
                <div class="deskripsi">
                    <h4>Mengobati rasa kangen dengan desain minimalist</h4>
                    <h5>Desain minimalist menjadi trending dikalangan sekarang, selain desain yang simpel terkadang
                        desain minimalist juga membuat mata lebih ringan karena denagan bentuk yang kecil membuat mata
                        bisa melihat luasnya ruangan</h5>
                </div>
                <div class="cta">
                    <a href="https://play.google.com/store/apps?hl=id">Lihat Barang</a>
                </div>


            </div>
            <div class="card">
                <img src="img/produkiterasi/pi-2.png">
                <div class="deskripsi">
                    <h4>Ditemani dengan interior klasik membuat lebih tenang</h4>
                    <h5>Desain minimalist menjadi trending dikalangan sekarang, selain desain yang simpel terkadang
                        desain minimalist juga membuat mata lebih ringan karena denagan bentuk yang kecil membuat mata
                        bisa melihat luasnya ruangan</h5>
                </div>
                <div class="cta">
                    <a href="https://play.google.com/store/apps?hl=id">Lihat Barang</a>
                </div>

            </div>
            <div class="card">
                <img src="img/produkiterasi/pi-3.png">
                <div class="deskripsi">
                    <h4>Modern furniture memberikan kesan indah senyaman senyumanmu</h4>
                    <h5>Desain minimalist menjadi trending dikalangan sekarang, selain desain yang simpel terkadang
                        desain minimalist juga membuat mata lebih ringan karena denagan bentuk yang kecil membuat mata
                        bisa melihat luasnya ruangan</h5>
                </div>
                <div class="cta">
                    <a href="https://play.google.com/store/apps?hl=id">Lihat Barang</a>
                </div>
            </div>

        </div>
    </section>




    <!--  kategori -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <section>
        <div class="container2">
            <div class="produk">
                <div class="atas">
                    <form action="/product">
                        @csrf
                        <select name="kategori" id="kategori"
                            class="w-full px-3 py-[7px] rounded-xl text-sm text-black font-poppins font-medium border border-[#8D72E1] focus:outline-none appearance-none cursor-pointer">
                            <option disabled selected value="">Kategori</option>
                            <option class="text-sm text-black font-poppins font-medium bg-white" value="" selected>
                                Kategori</option>
                            <option class="text-sm text-black font-poppins font-medium bg-white" value="Ruang Tamu">Ruang Tamu
                            </option>
                            <option class="text-sm text-black font-poppins font-medium bg-white" value="Kamar">kamar</option>
                            <option class="text-sm text-black font-poppins font-medium bg-white" value="Teras">Teras</option>
                            <option class="text-sm text-black font-poppins font-medium bg-white" value="Dapur">Dapur</option>

                            
                        </select>

                        <select name="harga" id="harga"
                            class="w-full px-3 py-[7px] rounded-xl text-sm text-black font-poppins font-medium border border-[#8D72E1] focus:outline-none appearance-none cursor-pointer">
                            <option disabled selected value="">harga</option>
                            <option class="text-sm text-black font-poppins font-medium bg-white" value="" selected>harga
                            </option>
                            <option class="text-sm text-black font-poppins font-medium bg-white" value="1">0 - 1 Juta
                            </option>
                            <option class="text-sm text-black font-poppins font-medium bg-white" value="2">1 Juta - 5
                                Juta</option>
                            <option class="text-sm text-black font-poppins font-medium bg-white" value="3"> 5 Juta
                            </option>

                            
                        </select>
 
                        <select name="bahan" id="bahan"
                            class="w-full px-3 py-[7px] rounded-xl text-sm text-black font-poppins font-medium border border-[#8D72E1] focus:outline-none appearance-none cursor-pointer">
                            <option disabled selected value="">Bahan</option>
                            <option class="text-sm text-black font-poppins font-medium bg-white" value="" selected>Bahan
                            </option>
                            <option class="text-sm text-black font-poppins font-medium bg-white" value="Jati">Kayu Jati
                            </option>
                            <option class="text-sm text-black font-poppins font-medium bg-white" value="Jepara">Kayu Jepara
                            </option>
                            <option class="text-sm text-black font-poppins font-medium bg-white" value="Trembesi">Kayu Trembesi
                            </option>

                            
                        </select>

                        <button type="submit">Submit</button>

                    </form>

                    
                    
                </div>

                <div class="bawah">
                    <div class="row">
                        @foreach($barangs as $barang)
                        <div class="column">
                            
                            <div class="card">
                                <img src="/gambar/{{$barang->gambar[0]}}">
                                <h3>{{$barang -> nama_barang}}</h3>
                                <p>{{$barang -> deskripsi_produk}}</p>
                                <p>{{$barang -> harga}}</p>
                                <a href="/">Lihat Barang</a>
                            </div>
                        </div>
                        @endforeach
                
                    </div>
                </div>
            </div>
                     





    </section>





    <!--  kategori -->
    <!-- Hamburger menu -->
    <script src="js/script.js"></script>
































































</body>

</html>