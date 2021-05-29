<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class Payment extends Model
{
protected $table='payment';
protected $primaryKey='paymentID';
public $timestamps = false;
}
