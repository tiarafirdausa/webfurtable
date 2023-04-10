<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

/**
 * Summary of produkController
 */
class produkController extends Controller
{
    /**
     * Summary of index
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {

        $barang = barang::oldest();

        //category
        $barang->when($request->kategori, function($query) use ($request){
            return $query->where('kategori', $request->kategori);
        });

        if($request->harga==1){
            $barang->when($request->harga, function($query) use ($request){
                return $query->whereBetween('harga',[0, 1000000])->get();
            });
            
        }

        if($request->harga==2){
            $barang->when($request->harga, function($query) use ($request){
                return $query->whereBetween('harga',[1000000, 5000000])->get();
            });
            
        }

        if($request->harga==3){
            $barang->when($request->harga, function($query) use ($request){
                return $query->where('harga','>',5000000)->get();
            });
            
        
        }

        $barang->when($request->bahan, function($query) use ($request){
            return $query->where('bahan','like','%'.$request->bahan.'%');
        });

        //flashsale

        //search
        if(request('search')){
            $barang->where('nama_barang', 'like', '%' . request('search') . '%')
                ->orWhere('bahan', 'like', '%' . request('search') . '%')
                    ->orWhere('sku', 'like', '%' . request('search') . '%')
                    ->orWhere('kategori', 'like', '%' . request('search') . '%')
                    ->orWhere('stok', 'like', '%' . request('search') . '%')
                    ->orWhere('warna', 'like', '%' . request('search') . '%')
                    ->orWhere('flashsale', 'like', '%' . request('search') . '%')
                    ->orWhere('harga', 'like', '%' . request('search') . '%')
                    ->orWhere('harga_diskon', 'like', '%' . request('search') . '%')
                    ->orWhere('deskripsi_produk', 'like', '%' . request('search') . '%')
                    ->orWhere('ukuran', 'like', '%' . request('search') .'%');
                }

        return view('catalog.product', [
            'barangs' => $barang->paginate(8)->withQueryString()
        ]);

    }
}
