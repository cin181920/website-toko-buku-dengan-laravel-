<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserPageController extends Controller
{
        public function show(){
        // return Order::all();
        return view('/userpage',[
            'user'=>User::all()
        ]);
    }
     public function destroy($id)
    {
        $user= User::find($id);
        $user->delete();
        return redirect('/userpage')->with('success','hapus item');
    }
}
