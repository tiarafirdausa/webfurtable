<?php

namespace App\Http\Controllers;

use App\Models\Barang;
// use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $barang = Barang::oldest();

        //bahan
        $barang->when($request->bahan, function($query) use ($request){
            return $query->where('bahan', $request->bahan);
        });

        //kategori
        $barang->when($request->kategori, function($query) use ($request){
            return $query->where('kategori', $request->kategori);
        });

        //flashsale
        $barang->when($request->flashsale, function($query) use ($request){
            return $query->where('flashsale', $request->flashsale);
        });

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
                    ->orWhere('ukuran', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.barangs.index', [
            'barangs' => $barang->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.barangs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|max:255',
            'bahan' => 'required',
            'sku' => 'required|unique:barangs',
            'kategori' => 'required',
            'stok' => 'numeric|min:0|required',
            'warna' => 'required|max:255',
            'flashsale' => 'required',
            'harga' => 'required|max:20',
            'harga_diskon' => 'max:20',
            'deskripsi_produk' => 'required',
            'ukuran' => 'required',
        ]);

        //gambar
        $files = [];
        if($request->hasfile('gambar')){
            foreach($request->file('gambar') as $file){
                $name = time().rand(1,50).'.'.$file->extension();
                $file->move(public_path('gambar'), $name);
                $files[] = $name;
            }
        }

        $file= new Barang();

        $file->nama_barang = $validatedData['nama_barang'];
        $file->bahan = $validatedData['bahan'];
        $file->sku = $validatedData['sku'];
        $file->kategori = $validatedData['kategori'];
        $file->stok = $validatedData['stok'];
        $file->warna = $validatedData['warna'];
        $file->gambar = $files;
        $file->flashsale = $validatedData['flashsale'];
        $file->harga = $validatedData['harga'];
        $file->harga_diskon = $validatedData['harga_diskon'];
        $file->deskripsi_produk = $validatedData['deskripsi_produk'];
        $file->ukuran = $validatedData['ukuran'];
        $file->save();

        return redirect('/dashboard/barangs')->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return view('dashboard.barangs.detail',[
            'barang' => $barang
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('dashboard.barangs.edit',[
            'barang' => $barang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $rules = [
            'nama_barang' => 'required|max:255',
            'bahan' => 'required',
            'kategori' => 'required',
            'stok' => 'numeric|min:0|required',
            'warna' => 'required|max:255',
            'flashsale' => 'required',
            'harga' => 'required|max:20',
            'harga_diskon' => 'max:20',
            'deskripsi_produk' => 'required',
            'ukuran' => 'required',
        ];

        //update sku
        if($request->sku != $barang->sku){
            $rules['sku'] = 'required|unique:barangs';
        };

        $validatedData = $request->validate($rules);

        //update image
        if($request->hasfile('gambar'))
        {
            //hapus gambar lama jika ada
            $oldFiles = $barang->gambar;
            if($oldFiles != null){
                foreach($oldFiles as $oldFile){
                    $file_path = public_path('gambar/'.$oldFile);
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
            }

            //simpan gambar baru
            $files = [];
            foreach($request->file('gambar') as $file){
                $name = time().rand(1,50).'.'.$file->extension();
                $file->move(public_path('gambar'), $name);
                $files[] = $name;
            }
            $validatedData['gambar'] = $files;
        }

        Barang::where('id', $barang->id)->update($validatedData);

        return redirect('/dashboard/barangs')->with('success', 'Barang berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        //hapus image
        if($barang->gambar){
            Storage::delete($barang->gambar);
        }

        if($barang->gambarWarna){
            Storage::delete($barang->gambarWarna);
        }

        Barang::destroy($barang->id);

        return redirect('/dashboard/barangs')->with('success', 'Barang telah berhasil dihapus!');
    }
}
