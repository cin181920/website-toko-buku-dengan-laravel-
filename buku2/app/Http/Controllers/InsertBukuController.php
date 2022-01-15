<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Genre;
use Illuminate\Http\Request;

class InsertBukuController extends Controller
{

 public function index(){
        return view('insertbuku',[
            'genre'=>Genre::all(),
            'buku'=>Buku::all()

        ]);
    }
     public function store(Request $request){
        // return $request;
         $validateData= $request->validate([
            'genre_id' => 'required',
            'judul' => 'required',
            'penulis' => 'required',
            'sinopsis'=>'required',
            'harga' => 'required',
            'gambar'=>'required'
        ]);

         Buku::create($validateData);

         return redirect('/insertbuku')->with('success','buku berhasil di tambahkan !');
    }

  public function detail($id){
         $data=Buku::find($id);
         return view('detail',[
            'judul'=>'Detail',
             'buku'=>$data
        ]) ;
     }


}
