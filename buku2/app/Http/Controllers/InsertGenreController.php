<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class InsertGenreController extends Controller
{


public function index(){
        return view('insertgenre',[
            'genre'=>Genre::all()
        ]);
    }


     public function store(Request $request){
        // return $request;
         $validateData= $request->validate([
            'name' => 'required',
            'penjelasan'=>'required'
        ]);

         Genre::create($validateData);

         return redirect('/insertgenre')->with('success','buku berhasil di tambahkan !');
    }

  public function detail($id){
         $data=Genre::find($id);
         return view('detailgenre',[
            'judul'=>'Detail',
             'genre'=>$data
        ]) ;
     }

      public function destroy($id)
    {
        $genre= Genre::find($id);
        $genre->delete();
        return redirect('/insertgenre')->with('success','hapus item');
    }
}
