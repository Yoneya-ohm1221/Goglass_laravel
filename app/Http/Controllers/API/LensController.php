<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lens;
use DB;

class LensController extends Controller
{
    public function index()
    {
        $Lens = Lens::all(); 
        return response()->json($Lens);
     
    }
}