<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminHome extends Model
{
     use HasFactory;
    protected $guarded=['id'];

    public function scopeFilter($query){
      if(request('search')){
        $query->where('judul','like','%'.request('search').'%');
       }
    }
}
