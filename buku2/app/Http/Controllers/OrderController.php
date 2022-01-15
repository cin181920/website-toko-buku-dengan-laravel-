<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('order',[
            'title'=>'order',
        ]);
    }
     public function store(Request $request){
        // return $request;
         $validateData= $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'sinopsis' => 'required',
            'harga'=>'required',
            'jumlah'=>'required'
        ]);

        Order::create($validateData);

         return redirect('/cart')->with('success','Order is added !');
    }



public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect('/cart')->with('success','hapus item');
    }


public function detail($id){
         $data=Order::find($id);
         return view('detail3',[
             'order'=>$data
        ]) ;
     }


}
