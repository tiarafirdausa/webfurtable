<?php 
 
namespace App\Http\Controllers; 
use App\Models\Barang; 
 
use Illuminate\Http\Request; 
 
 
class CatalogController extends Controller 
{ 
    public function tentang(){ 
        // dd($request->all()); 
        return view('catalog.tentang',[ 
            'populer' => Barang::orderBy('stok', 'desc')->paginate(4) 
        ]); 
    } 

    public function home(){ 
        // dd($request->all()); 
        return view('catalog.home',[ 
            'populer' => Barang::orderBy('stok', 'desc')->paginate(4) 
        ]); 
    }

    public function detail(Barang $barang){ 
        // dd($request->all()); 
        return view('catalog.detail',[ 
            'barang' => $barang,
            'populer' => Barang::orderBy('stok', 'desc')->paginate(4) 

        ]); 
    }
} 
