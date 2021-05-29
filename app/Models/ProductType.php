<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class ProductType extends Model
{

    protected $table = 'product_type';
    protected $primaryKey = 'producttypeID';
    public $timestamps = false;


}
