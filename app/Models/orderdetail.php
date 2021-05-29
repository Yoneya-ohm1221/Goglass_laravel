<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_detail';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'order_detailID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['order_detailID', 'orderID', 'productID', 'LensID', 'Quantity', 'price_total'];
    public $timestamps = false;

    
}
