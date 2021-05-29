<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use DB;

class ReportController extends Controller
{
    //ยอดการสั่งซื้อรายเดือน (บาท)    
    public function monthlySale(Request $request)    
    {
        //date("Y");
        $year= $request->get('year');
        $sql = "SELECT SUBSTRING(`orders`.order_date,6,2) AS month, 
                    SUM(order_detail.quantity*product.price) AS totalAmount 
                FROM product 
                    INNER JOIN order_detail ON product.productID=order_detail.productID
                    INNER JOIN `orders` ON order_detail.orderID=`orders`.orderID ";
                
             if($year!=""){
                $sql .="WHERE SUBSTRING(`orders`.order_date,1,4)='$year' ";
                }

                $sql .=" GROUP BY SUBSTRING(`orders`.order_date,6,2)
                ORDER BY SUBSTRING(`orders`.order_date,6,2) ASC";        
        return response()->json( DB::select($sql) );
    }

    //สินค้าที่มียอดการสั่งซื้อ 5 อันดับแรก (บาท)
    public function topFiveProduct(Request $request)
    {
        $year= $request->get('year');
        $sql = "SELECT product.productID, productName, 
                        SUM(order_detail.quantity) AS totalAmount 
                FROM product 
                    INNER JOIN order_detail ON product.productID=order_detail.productID
                    INNER JOIN `orders` ON order_detail.orderID=`orders`.orderID ";

                if($year!=""){
                $sql .="WHERE SUBSTRING(`orders`.order_date,1,4)='$year' ";
                }    

                $sql .="GROUP BY product.productID, productName 
                ORDER BY SUM(order_detail.quantity) DESC LIMIT 5";
        return response()->json( DB::select($sql) );
    }
 
}