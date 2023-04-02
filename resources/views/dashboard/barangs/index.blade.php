@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Barang</h1>
    </div>

    {{-- alert tambah barang berhasil --}}
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="table-responsive">
        <a href="/dashboard/barangs/create" class="btn btn-primary mb-3">Tambah Barang</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">SKU</th>
                    <th scope="col">Warna</th>
                    <th scope="col">Category</th>
                    <th scope="col">Flashsale</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Harga Diskon</th></th>
                    <th scope="col">Action</th></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $barang )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div>
                                {{ $barang->nama_barang }}
                            </div>
                            <div>
                                <img src="{{ asset('storage/'.$barang->gambar) }}" style="width: 5rem" class="img-fluid">
                            </div>
                        </td>
                        <td>{{ $barang->sku }}</td>
                        <td>{{ $barang->warna }}</td>
                        {{-- <td>
                            <img src="{{ asset('storage/'.$barang->gambar) }}" style="width: 5rem" class="img-fluid">
                        </td> --}}
                        <td>{{ $barang->category->name}}</td>
                        <td>{{ $barang->flashsale }}</td>
                        <td>{{ $barang->harga }}</td>
                        <td>{{ $barang->harga_diskon }}</td>
                        <td>
                            <a href="/dashboard/barangs/{{ $barang->id }}" class="badge bg-info"><span data-feather="eye"></span></a>

                            <a href="/dashboard/barangs/{{ $barang->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>

                            <form action="/dashboard/barangs/{{ $barang->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Yakin hapus?')"><span data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
