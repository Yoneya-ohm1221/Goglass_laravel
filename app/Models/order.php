<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'orderID';
    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['order_date', 'order_ship', 'status'];
    public $timestamps = false;

    
}
