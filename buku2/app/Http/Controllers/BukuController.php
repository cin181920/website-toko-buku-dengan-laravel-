<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
     public function index(){

         $data=Buku::latest();
          if(request('search')){
             $data->where('judul','like','%'.request('search').'%');
         }


         return view('welcome',[
               'judul'=>'welcome',
               'buku'=>Buku::latest()->filter(request('search'))->paginate(5)
         ]);
     }


      public function show($id){
        return view('welcome',
        [
            "judul"=>"singlepost",
            "buku"=>Buku::find($id)
        ]);
    }

     public function detail($id){
         $data=Buku::find($id);
         return view('detail',[
            'judul'=>'Detail',
             'buku'=>$data
        ]) ;
     }

     public function destroy($id)
    {
        $buku= Buku::find($id);
        $buku->delete();
        return redirect('/insertbuku')->with('success','hapus item');
    }

}
