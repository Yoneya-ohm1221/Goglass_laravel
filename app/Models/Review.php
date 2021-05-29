<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Review extends Model
{

    protected $table = 'review';
    protected $primaryKey = 'reviewID';
    public $timestamps = false;


}