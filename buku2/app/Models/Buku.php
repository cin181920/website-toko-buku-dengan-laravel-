<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{

    use HasFactory;
    protected $guarded=['id'];

      public function genre(){
        return $this->belongsTo(Genre::class);
    }
    public function scopeFilter($query){
      if(request('search')){
        $query->where('judul','like','%'.request('search').'%');
       }
    }



}
