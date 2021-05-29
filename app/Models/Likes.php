<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{

    protected $table = 'like_product';
    protected $primaryKey = 'likesID';
    public $timestamps = false;

    
}
