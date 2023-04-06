@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome {{ auth()->user()->name }}</h1>
    </div>

    {{-- analytic count --}}
    <div class="analytic-jumlah">
        <div class="row">
            <div class="card" >
                <a class="card-body btn" href="#">
                    <div class="card-main">
                        <div class="card-left">
                            <h5 class="card-title">Barang</h5>
                            <h1>{{ $barang_count }}</h1>
                        </div>
                        <div class="card-right">
                            <span data-feather="box" class="feather-size4"></span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="card" >
                <a class="card-body btn" href="#">
                    <div class="card-main">
                        <div class="card-left">
                            <h5 class="card-title">Cart</h5>
                            <h1>20</h1>
                        </div>
                        <div class="card-right">
                            <span data-feather="shopping-cart" class="feather-size4"></span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="card" >
                <a class="card-body btn" href="#">
                    <div class="card-main">
                        <div class="card-left">
                            <h5 class="card-title">Transaksi</h5>
                            <h1>20</h1>
                        </div>
                        <div class="card-right">
                            <span data-feather="dollar-sign" class="feather-size4"></span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="card" >
                <a class="card-body btn" href="#">
                    <div class="card-main">
                        <div class="card-left">
                            <h5 class="card-title">User</h5>
                            <h1>{{ $user }}</h1>
                        </div>
                        <div class="card-right">
                            <span data-feather="user" class="feather-size4"></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="analytic-produk mt-4">
        <div class="row ">
            {{-- Flashsale Products --}}
            <div class="card-flashsale col-lg-6">
                <div class="col-md-15" style="border-style: inset">
                    <h5>Flashsale Products</h5>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">SKU</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang_flashsale as $barang )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->sku }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Recently Added Products --}}
            <div class="card-latest col-lg-6">
                <div class="col-md-15" style="border-style: inset">
                    <h5>Recently Added Products</h5>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">SKU</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang_latest as $barang )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->sku }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
