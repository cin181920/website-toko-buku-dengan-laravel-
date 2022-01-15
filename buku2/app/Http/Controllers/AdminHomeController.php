<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{

 public function adminhome(){
        // return view('admin-home');
         $data=Buku::latest();
          if(request('search')){
             $data->where('judul','like','%'.request('search').'%');
         }


         return view('admin-home',[
               'judul'=>'adminhome',
               'buku'=>Buku::latest()->filter(request('search'))->paginate(5)
         ]);
    }


      public function show($id){
        return view('admin-home',
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

}
