<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;
use DB;

class ProductTypeController extends Controller
{
    public function index()
    {
        $ProdcutType =ProductType::all(); 
        return response()->json($ProdcutType);
     
    }
}