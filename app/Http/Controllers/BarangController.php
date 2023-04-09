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

        $barang = Barang::latest();

        //category
        $barang->when($request->category, function($query) use ($request){
            return $query->where('category', $request->category);
        });

        //flashsale
        $barang->when($request->flashsale, function($query) use ($request){
            return $query->where('flashsale', $request->flashsale);
        });

        //search
        if(request('search')){
            $barang->where('nama_barang', 'like', '%' . request('search') . '%')
                    ->orWhere('sku', 'like', '%' . request('search') . '%')
                    ->orWhere('ukuran', 'like', '%' . request('search') . '%')
                    ->orWhere('deskripsi_produk', 'like', '%' . request('search') . '%')
                    ->orWhere('category', 'like', '%' . request('search') . '%')
                    ->orWhere('warna', 'like', '%' . request('search') . '%')
                    ->orWhere('bahan', 'like', '%' . request('search') . '%')
                    ->orWhere('stok', 'like', '%' . request('search') . '%')
                    ->orWhere('flashsale', 'like', '%' . request('search') . '%')
                    ->orWhere('harga', 'like', '%' . request('search') . '%')
                    ->orWhere('harga_diskon', 'like', '%' . request('search') . '%');
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
        // dd($request->all());

        // $this->validate($request, [
        //     'gambar' => 'required',
        //     'gambar.*' => 'image'
        // ]);

        // $files = [];
        // if($request->hasfile('gambar'))
        // {
        //     foreach($request->file('gambar') as $file)
        //     {
        //         $name = time().rand(1,50).'.'.$file->extension();
        //         $file->move(public_path('files'), $name);
        //         $files[] = $name;
        //     }
        // }

        // $file= new Barang();
        // $file->gambar = $files;
        // $file->nama_barang = $request->nama_barang;
        // $file->sku = $request->sku;
        // $file->warna = $request->warna;
        // $file->category = $request->category;
        // $file->stok = $request->stok;
        // $file->flashsale = $request->flashsale;
        // $file->harga = $request->harga;
        // $file->harga_diskon = $request->harga_diskon;
        // $file->deskripsi_produk = $request->deskripsi_produk;
        // $file->ukuran = $request->ukuran;
        // $file->bahan = $request->bahan;
        // $file->save();

        // return back()->with('success', 'Barang berhasil ditambahkan!');

        $validatedData = $request->validate([
            'nama_barang' => 'required|max:255',
            'sku' => 'required|unique:barangs',
            'warna' => 'required|max:255',
            'category' => 'required',
            'stok' => 'numeric|min:0|required',
            'gambar' => 'image|file|max:1024',
            'flashsale' => 'required',
            'harga' => 'required|max:20',
            'harga_diskon' => 'max:20',
            'deskripsi_produk' => 'required|max:255',
            'ukuran' => 'required|max:255',
            'bahan' => 'required'
        ]);

        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('post-gambar');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Barang::create($validatedData);

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
        // dd($request->all());

        // $this->validate($request, [
        //     'gambar' => 'required',
        //     'gambar.*' => 'image'
        // ]);

        // $files = [];
        // if($request->hasfile('gambar'))
        // {
        //     foreach($request->file('gambar') as $file)
        //     {
        //         $name = time().rand(1,50).'.'.$file->extension();
        //         $file->move(public_path('files'), $name);
        //         $files[] = $name;
        //     }
        // }

        // $file= Barang::where('id', $barang->id)->first();
        // $file->gambar = $files;
        // $file->nama_barang = $request->nama_barang;
        // $file->sku = $request->sku;
        // $file->warna = $request->warna;
        // $file->category = $request->category;
        // $file->stok = $request->stok;
        // $file->flashsale = $request->flashsale;
        // $file->harga = $request->harga;
        // $file->harga_diskon = $request->harga_diskon;
        // $file->deskripsi_produk = $request->deskripsi_produk;
        // $file->ukuran = $request->ukuran;
        // $file->bahan = $request->bahan;
        // $file->save();

        $rules = [
            'nama_barang' => 'required|max:255',
            'warna' => 'required|max:255',
            'gambar' => 'image|file|max:1024',
            'category' => 'required',
            'flashsale' => 'required',
            'harga' => 'required|max:20',
            'harga_diskon' => 'max:20',
            'deskripsi_produk' => 'required|max:255',
            'ukuran' => 'required|max:255'
        ];

        //update sku
        if($request->sku != $barang->sku){
            $rules['sku'] = 'required|unique:barangs';
        };

        $validatedData = $request->validate($rules);

        //update image dan hapus yang lama
        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('post-gambar');
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
        if($barang->image){
            Storage::delete($barang->image);
        }

        Barang::destroy($barang->id);

        return redirect('/dashboard/barangs')->with('success', 'Barang telah berhasil dihapus!');
    }
}
