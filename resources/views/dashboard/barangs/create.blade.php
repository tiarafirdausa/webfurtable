@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Barang</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/barangs" class="mb-5" enctype="multipart/form-data"> {{-- mengarah ke method store --}}
        @csrf
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input name="nama_barang" type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" required autofocus value="{{ old('nama_barang') }}">
            @error('nama_barang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id"  id="category_id" onchange="updateSku()">
                <option value="">Pilih Category</option>
                @foreach ($categories as $category)
                    @if (old('category_id') == $category->id)
                        <option value="{{ $category->id}}">{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id}}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="sku" class="form-label">Sku</label>
            <input name="sku" type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" value="{{ old('sku') }}">
        </div>

        <div class="mb-3">
            <label for="warna" class="form-label">Warna</label>
            <input name="warna" type="text" class="form-control @error('warna') is-invalid @enderror" id="warna" required value="{{ old('warna') }}">
            @error('warna')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <img class="img-preview img-fluid mb-3 col-sm-5" style="max-height: 500px; overflow:hidden">
            <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" onchange="previewImage()">
            @error('gambar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="flashsale" class="form-label">Flashsale</label>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="flashsale" id="yes" type="radio" value="yes">
                    <label for="yes" class="form-check-label">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="flashsale" id="no" value="no">
                    <label for="no" class="form-check-label">No</label>
                </div>
            </div>
        </div>

        {{-- <div class="mb-3">
            <label for="flashsale" class="form-label">Flashsale</label>
            <select class="form-select" name="flashsale"  id="flashsale">
                <option value="">Pilih</option>
                <option value="yes" selected>Yes</option>
                <option value="no">No</option>
            </select>
        </div> --}}

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input name="harga" type="number" min="0" class="form-control @error('harga') is-invalid @enderror" id="harga" required value="{{ old('harga') }}">
            @error('harga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga_diskon" class="form-label">Harga Diskon</label>
            <input name="harga_diskon" type="number" min="0" class="form-control @error('harga_diskon') is-invalid @enderror" id="harga_diskon" value="{{ old('harga_diskon') }}">
            @error('harga_diskon')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
            <textarea name="deskripsi_produk" type="text-are" class="form-control @error('deskripsi_produk') is-invalid @enderror" id="deskripsi_produk" value="{{ old('deskripsi_produk') }}"></textarea>
            @error('deskripsi_produk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ukuran" class="form-label">Ukuran</label>
            <textarea name="ukuran" type="text-area" class="form-control @error('ukuran') is-invalid @enderror" id="ukuran" value="{{ old('ukuran') }}"></textarea>
            @error('ukuran')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    function updateSku() {
        var category = document.getElementById("category_id").value;
        var skuInput = document.getElementById("sku");

        if (category === "1") {
            var randNum = Math.floor(Math.random() * 1000);
            skuInput.value = "MJ-JT-" + randNum;

        } else if (category === "2") {
            var randNum = Math.floor(Math.random() * 1000);
            skuInput.value = "MJ-JP-" + randNum;

        } else if (category === "3") {
            var randNum = Math.floor(Math.random() * 1000);
            skuInput.value = "MJ-KN-" + randNum;
        } else {
            skuInput.value = "MJ-";
        }
    }

    function previewImage(){
        const image = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'blok';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.file[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection
