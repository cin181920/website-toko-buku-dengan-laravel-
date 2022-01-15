<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
          $data=Buku::latest();
          if(request('search')){
             $data->where('judul','like','%'.request('search').'%');
         }


         return view('home',[
               'judul'=>'home',
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
         return view('detail2',[
             'buku'=>$data
        ]) ;
     }

    public function adminhome(){
        // return view('admin-home');
    }
}
