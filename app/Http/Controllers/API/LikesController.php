<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Likes;
use DB;

class LikesController extends Controller
{
 
    public function insertlike(Request $request)
    {
        //add user data into users table
        $likes = new Likes();
        $likes->productID = $request->get('productID');
        $likes->likes = 1;        
        $likes->userID = $request->get('userID');
       // $user->gender = $request->get('gender');                  
        $likes ->save();                
        return response()->json(array(
            'message' => 'add likes successfully', 
            'status' => 'true'));
    }
    public function countlikes($id)
    {

        $sql="SELECT COUNT(likesID) as countLike FROM like_product WHERE productID=$id";
        $recount=DB::select($sql)[0];         
        return response()->json($recount);
    }



    public static function view(Request $request)
    {
        $productID = $request->get('productID');
        $userID= $request->get('userID');
       // $sql="SELECT * FROM like_product WHERE productID=$productID AND userID =$userID";
        $likes = DB::table('like_product')
                ->select('*')
                ->where('productID', $productID)
                ->Where('userID', $userID)
                ->first();
        //$likes=DB::select($sql)[0];         
        return response()->json($likes);
    
    }
    public static function delete(Request $request)
    {
        $productID = $request->get('productID');
        $userID= $request->get('userID');
        $sql="DELETE FROM like_product WHERE productID=$productID AND userID = $userID;";

        $likes=DB::delete($sql);         
        return response()->json($likes);
    
    }
    public static function userLike(Request $request)
    {
        $userID = $request->get('userID');
        $productID = $request->get('productID');
        if($userID!=""){
        $sql = "SELECT * FROM like_product WHERE userID=$userID ORDER BY likesID";
        }if($productID!=""){
            $sql = "SELECT * FROM like_product 
            INNER JOIN users ON like_product.userID = users.userID
            WHERE productID=$productID ORDER BY likesID";
        }
        
        $likes=DB::select($sql);         
        return response()->json($likes);
    
    }
    public function countLike($id)
    {

        $sql="SELECT COUNT(likesID) as countLike FROM like_product WHERE productID=$id";
        $recount=DB::select($sql)[0];         
        return response()->json($recount);
    }
    
}