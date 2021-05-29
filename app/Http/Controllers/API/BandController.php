<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Band;
use DB;

class BandController extends Controller
{
    public function index(Request $request)
    {
        $Band = Band::all(); 
        return response()->json($Band);
     
    }
}