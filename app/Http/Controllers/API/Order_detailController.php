<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order_detail;
use DB;

class Order_detailController extends Controller
{
 
    public function viewdetail($id)
    {
        $sql="SELECT order_detail.*,lens.*,product.image,product.productname,band.bandName,product_type.typename,
         SUM((order_detail.quantity*product.price)+lens.lensprice) AS totalPrice 
         FROM order_detail 
        INNER JOIN lens ON lens.lensID=order_detail.LensID
        INNER JOIN product ON product.productID=order_detail.productID
        INNER JOIN band ON product.bandID=band.bandID
        INNER JOIN product_type ON product_type.producttypeID=product.producttypeID
        AND order_detail.orderID = $id";
        $sql.=" GROUP BY order_detail.orderID,order_detail.productID,order_detail.LensID,
        order_detail.Quantity,order_detail.price_total,order_detail.created_at,product_type.typename,
        lens.lensID,lens.lenstype,lens.lensprice,product.image,product.productname,band.bandName";
        $detail=DB::select($sql);         
        return response()->json($detail);
    }
    public function addorderdetail(Request $request)
    {
        
        //add user data into users table
        $detail = new Order_detail();
        $detail->orderID= $request->get('orderID');
        $detail->productID= $request->get('productID');
        $detail->LensID= $request->get('LensID');
        $detail->Quantity= $request->get('Quantity');
        $detail->save();                
        return response()->json(array(
            'message' => 'add a order_detail successfully', 
            'status' => 'true'));  
    }

}