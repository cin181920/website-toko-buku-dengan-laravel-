<?php

namespace App\Models;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function buku(){
        return $this->hasMany(Buku::class);
    }

      /**
 * The table associated with the model.
 *
 * @var string
 */
protected $table = 'genres';
}
