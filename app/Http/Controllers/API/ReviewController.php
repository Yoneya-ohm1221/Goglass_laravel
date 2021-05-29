<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use DB;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $productD= $request->get('productID');
        $sql="SELECT product.productID,review.comment,users.firstname,review.date_time,users.image FROM review 
        INNER JOIN users ON review.userID = users.userID
        INNER JOIN product ON review.productID = product.productID";
        if($productD != ""){
        $sql.=" AND review.productID = $productD";
        }
        $sql.=" ORDER BY review.reviewID DESC";
        $review=DB::select($sql);         
        return response()->json($review);
       
     
    }
    public function count($id)
    {

        $sql="SELECT COUNT(reviewID) as countCommnet FROM review WHERE userID=$id";
        $recount=DB::select($sql)[0];         
        return response()->json($recount);
    }
    
    
    public function insertcomment(Request $request)
    {

        //add user data into users table
        $review = new Review();
        $review->productID = $request->get('productID');
        $review->comment = $request->get('comment');        
        $review->date_time = $request->get('date_time');
        $review->userID = $request->get('userID');
       // $user->gender = $request->get('gender');                  
        $review->save();                
        return response()->json(array(
            'message' => 'add comment successfully', 
            'status' => 'true'));
    }

}