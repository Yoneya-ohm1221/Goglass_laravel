<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $table = 'shopping_cart';
    protected $primaryKey = 'cartID';
    public $timestamps = false;

    
}
