<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class HistoryTransaksi extends Controller
{
     public function index(){
        // return Order::all();
        return view('/historytransaksi',[
            'order'=>Order::all()
        ]);
    }
}
