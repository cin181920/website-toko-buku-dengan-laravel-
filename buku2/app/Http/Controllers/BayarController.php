<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use App\Models\Order;
use Illuminate\Http\Request;

class BayarController extends Controller
{
      public function index(){
        // return Order::all();
        return view('/bayar',[
            'order'=>Order::all()
        ]);
    }

     public function store(Request $request){
        // return $request;
         $validateData= $request->validate([
            'card_name' => 'required',
            'credit_card_number'=>'required',
            'expire_date' => 'required',
            'cvv' => 'required',
            'country'=>'required',
            'zip'=>'required',
            'total'=>'required'
        ]);

        Bayar::create($validateData);

         return redirect('/bayar')->with('success','Order is added !');
    }

}
