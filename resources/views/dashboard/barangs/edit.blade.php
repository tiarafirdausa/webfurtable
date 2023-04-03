@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Barang</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/barangs/{{ $barang->id }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input name="nama_barang" type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" required autofocus value="{{ old('nama_barang', $barang->nama_barang) }}">
            @error('nama_barang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category"  id="category" onchange="updateSku()" >
                <option value="">Pilih Category</option>
                <option value="Jati" {{ $barang->category == 'Jati' ? 'selected' : '' }}>Jati</option>
                <option value="Jepara" {{ $barang->category == 'Jepara' ? 'selected' : '' }}>Jepara</option>
                <option value="Kalimantan" {{ $barang->category == 'Kalimantan' ? 'selected' : '' }}>Kalimantan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="sku" class="form-label">Sku</label>
            <input name="sku" type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" value="{{ old('sku', $barang->sku) }}">
            @error('sku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input name="stok" type="number" min="0" class="form-control @error('stok') is-invalid @enderror" id="stok" required autofocus value="{{ old('stok', $barang->stok) }}">
            @error('stok')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="warna" class="form-label">Warna</label>
            <input name="warna" type="text" class="form-control @error('warna') is-invalid @enderror" id="warna" required value="{{ old('warna', $barang->warna) }}">
            @error('warna')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            @if ($barang->gambar)
                <img src="{{ asset('storage/'.$barang->gambar) }}" class="img-preview img-fluid mb-2 col-sm-5 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" onchange="previewImage()">
            @error('gambar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="flashsale" class="form-label">Flashsale</label>
            <div class="form-group" required value="{{ old('flashsale', $barang->flashsale) }}">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="flashsale" id="yes" type="radio" value="yes" {{ $barang->flashsale == 'yes' ? 'checked' : '' }} >
                    <label for="yes" class="form-check-label">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="flashsale" id="no" value="no" {{ $barang->flashsale == 'no' ? 'checked' : '' }}>
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
            <input name="harga" type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" required value="{{ old('harga', $barang->harga) }}">
            @error('harga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga_diskon" class="form-label">Harga Diskon</label>
            <input name="harga_diskon" type="number" class="form-control @error('harga_diskon') is-invalid @enderror" id="harga_diskon" value="{{ old('harga_diskon', $barang->harga_diskon) }}">
            @error('harga_diskon')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
            <textarea name="deskripsi_produk" type="text" class="form-control @error('deskripsi_produk') is-invalid @enderror" id="deskripsi_produk">{{ old('deskripsi_produk', $barang->deskripsi_produk) }}</textarea>
            @error('deskripsi_produk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ukuran" class="form-label">Ukuran</label>
            <textarea name="ukuran" type="text" class="form-control @error('ukuran') is-invalid @enderror" id="ukuran" >{{ old('ukuran', $barang->ukuran) }}</textarea>
            @error('ukuran')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="bahan" class="form-label">Bahan</label>
            <input id="bahan" type="hidden" name="bahan" value="{{ old('bahan', $barang->bahan) }}">
            <trix-editor input="bahan"></trix-editor>
            @error('bahan')
                <p class="text-danger"><small>{{ $message }}</small></p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    function updateSku() {
        var category = document.getElementById("category").value;
        var skuInput = document.getElementById("sku");

        if (category === "JT") {
            var randNum = Math.floor(Math.random() * 1000);
            skuInput.value = "MJ-JT-" + randNum;

        } else if (category === "JP") {
            var randNum = Math.floor(Math.random() * 1000);
            skuInput.value = "MJ-JP-" + randNum;

        } else if (category === "KN") {
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
        // const blob = URL.createObjectURL(image.files[0]);
        // imgPreview.src = blob;
    }
</script>

@endsection
