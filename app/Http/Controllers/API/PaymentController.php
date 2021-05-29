<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use DB;
class PaymentController extends Controller
{
public function payment(Request $request)
{
        //validate image file
        $this->validate($request, ['file' => 'image']);
        //upload file
        $imageFileName = "receipt.jpg";
        $file = $request->file('file');
        if(isset($file)){
        $file->move('assets/uploadfile/payment',
        $file->getClientOriginalName());
        $imageFileName = $file->getClientOriginalName();
}

        //add user data into users table
        $user = new Payment();
        $user->orderID = $request->get('orderID');
        $user->paydate =date("Y-m-d");
        $user->price_total = $request->get('price');
        $user->comment = $request->get('comment');
        $user->image = $imageFileName;
        $user->save();
        return response()->json(array(
        'message' => 'add a payment successfully',
        'status' =>'true'));
}
public function index($id)
    {
        $sql="SELECT * FROM payment WHERE orderID =$id";
        $pay=DB::select($sql)[0];         
        return response()->json($pay);
       
    }
}