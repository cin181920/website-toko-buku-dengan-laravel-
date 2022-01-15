<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
      protected $guarded=['id'];
    /**
 * The table associated with the model.
 *
 * @var string
 */
protected $table = 'orders';


}
