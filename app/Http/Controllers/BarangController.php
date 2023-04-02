<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.barangs.index', [
            'barangs' => Barang::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.barangs.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'nama_barang' => 'required|max:255',
            'sku' => 'required|unique:barangs',
            'category_id' => 'required',
            'warna' => 'required|max:255',
            'gambar' => 'image|file|max:1024',
            'flashsale' => 'required',
            'harga' => 'required|max:20',
            'harga_diskon' => 'max:20',
            'deskripsi_produk' => 'required|max:255',
            'ukuran' => 'required|max:255'
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
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        // dd($request->all());


        $rules = [
            'nama_barang' => 'required|max:255',
            'warna' => 'required|max:255',
            'gambar' => 'image|file|max:1024',
            'category_id' => 'required',
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
        if($barang->image){
            Storage::delete($barang->image);
        }

        Barang::destroy($barang->id);

        return redirect('/dashboard/barangs')->with('success', 'Barang telah berhasil dihapus!');
    }
}
