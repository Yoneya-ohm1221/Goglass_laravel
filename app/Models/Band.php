<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'band';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'bandID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['bandName'];
    public $timestamps = false;
    
}
