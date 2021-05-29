<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lens extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lens';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'lensID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    public $timestamps = false;
    
}