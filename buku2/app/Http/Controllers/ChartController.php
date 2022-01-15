<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Chart;
use App\Models\Order;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index(){
        return view('cart',[
            'order'=>Order::all()
        ]);
    }



public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect('/cart')->with('success','hapus item');
    }

}
