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
        $validatedData = $request->validate([
            'nama_barang' => 'required|max:255',
            'sku' => 'required|unique:barangs',
            'warna' => 'required|max:255',
            'category' => 'required',
            'stok' => 'numeric|min:0|required',
            'gambar.*' => 'image|file|max:10240',
            'gambarWarna.*' => 'image|file|max:10240',
            'flashsale' => 'required',
            'harga' => 'required|max:20',
            'harga_diskon' => 'max:20',
            'deskripsi_produk' => 'required',
            'ukuran' => 'required',
            'bahan' => 'required'
        ]);

        //gambar
        if($request->hasFile('gambar')){
            $gambarPaths = [];
            foreach($request->file('gambar') as $gambar){
                $gambarPath = $gambar->store('post-gambar');
                array_push($gambarPaths, $gambarPath);
            }
            $validatedData['gambar'] = json_encode($gambarPaths);
        }

        //gambarWarna
        if($request->hasFile('gambarWarna')){
            $gambarPaths = [];
            foreach($request->file('gambarWarna') as $gambar){
                $gambarPath = $gambar->store('post-gambar');
                array_push($gambarPaths, $gambarPath);
            }
            $validatedData['gambarWarna'] = json_encode($gambarPaths);
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
        $rules = [
            'nama_barang' => 'required|max:255',
            'warna' => 'required|max:255',
            'gambar.*' => 'image|file|max:10240',
            'gambarWarna.*' => 'image|file|max:10240',
            'stok' => 'numeric|min:0|required',
            'flashsale' => 'required',
            'harga' => 'required|max:20',
            'harga_diskon' => 'max:20',
            'deskripsi_produk' => 'required',
            'ukuran' => 'required',
            'bahan' => 'required',
            'category' => 'sometimes|required',
        ];

        //update sku
        if($request->sku != $barang->sku){
            $rules['sku'] = 'required|unique:barangs';
        };

        $validatedData = $request->validate($rules);

        //update image
        if($request->hasFile('gambar')){
            $gambarPaths = [];
            foreach($request->file('gambar') as $gambar){
                $gambarPath = $gambar->store('post-gambar');
                array_push($gambarPaths, $gambarPath);
            }
            $validatedData['gambar'] = json_encode($gambarPaths);
        }

        //update image
        if($request->hasFile('gambarWarna')){
            $gambarPaths = [];
            foreach($request->file('gambarWarna') as $gambar){
                $gambarPath = $gambar->store('post-gambar');
                array_push($gambarPaths, $gambarPath);
            }
            $validatedData['gambarWarna'] = json_encode($gambarPaths);
        }

        // Update the database, including only the fields that have been changed
        $updateData = [
            'nama_barang' => $validatedData['nama_barang'],
            'warna' => $validatedData['warna'],
            'flashsale' => $validatedData['flashsale'],
            'stok' => $validatedData['stok'],
            'category' => $validatedData['category'],
            'harga' => $validatedData['harga'],
            'harga_diskon' => $validatedData['harga_diskon'],
            'deskripsi_produk' => $validatedData['deskripsi_produk'],
            'ukuran' => $validatedData['ukuran'],
            'bahan' => $validatedData['bahan'],
        ];

        if (isset($validatedData['sku'])) {
            $updateData['sku'] = $validatedData['sku'];
        }

        if (isset($validatedData['gambar'])) {
            $updateData['gambar'] = json_encode($validatedData['gambar']);
        }

        if (isset($validatedData['gambarWarna'])) {
            $updateData['gambarWarna'] = json_encode($validatedData['gambarWarna']);
        }

        Barang::where('id', $barang->id)->update($updateData);

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
