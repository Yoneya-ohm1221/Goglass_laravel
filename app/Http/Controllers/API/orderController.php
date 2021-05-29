<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
use DB;

class orderController extends Controller
{
    public function index(Request $request,$id)
    {
        $date= $request->get('order_date');

        $sql="SELECT orders.orderID,orders.order_date,orders.status,orders.order_ship,orders.userID,
        SUM(order_detail.quantity) AS totalQuantity,
        SUM((order_detail.quantity*product.price)+lens.lensprice) AS totalPrice 
        FROM orders 
        INNER JOIN order_detail ON `orders`.`orderID`=order_detail.orderID 
        INNER JOIN product ON `product`.`productID`=order_detail.productID 
        INNER JOIN lens ON `lens`.`lensID`=order_detail.LensID 
        LEFT JOIN users ON users.userID=`orders`.userID  
        WHERE `orders`.userID=$id";
        if($date!=""){
            if($date=="-ALL-"){}else{
            $sql.=" AND order_date ='$date'";
            }
        }
        $sql.=" GROUP BY  orders.orderID,orders.order_date,orders.status,orders.order_ship,orders.userID     
         ORDER BY `orders`.orderID ASC ";
        $order=DB::select($sql);         
        return response()->json($order);
     
    }
    public function getdate()
    {
        $dateorder =order::all(); 
        return response()->json($dateorder);
     
    }

    
    public function addorder(Request $request)
    {
        
        //add user data into users table
        $order = new order();
        $order->userID= $request->get('userID');
        $order->status= 1;
        $order->order_date = date("Y-m-d");      
        $order->save();                
        return response()->json(array(
            'message' => 'add a order successfully', 
            'status' => 'true'));  
    }
    
    public function GetOrderID($id)
    {
        $sql="SELECT `orderID` FROM `orders` WHERE userID =$id ORDER BY orderID DESC";
        $order=DB::select($sql)[0];         
        return response()->json($order);
     
    }
    public function count($id)
    {

        $sql="SELECT COUNT(DISTINCT order_detail.orderID) as countorderdetail 
        FROM orders 
        INNER JOIN order_detail ON `orders`.`orderID`=order_detail.orderID 
        WHERE orders.userID=$id";
        $recount=DB::select($sql)[0];         
        return response()->json($recount);
    }
    public function indexadmin(Request $request)
    {
        $date= $request->get('order_date');
        $status= $request->get('status');

        $sql="SELECT orders.orderID,orders.order_date,orders.status,orders.order_ship,orders.userID,
        users.firstname,users.lastname,users.address,users.phone,
        SUM(order_detail.quantity) AS totalQuantity,
        SUM((order_detail.quantity*product.price)+lens.lensprice) AS totalPrice 
        FROM orders 
        INNER JOIN order_detail ON `orders`.`orderID`=order_detail.orderID 
        INNER JOIN product ON `product`.`productID`=order_detail.productID 
        INNER JOIN lens ON `lens`.`lensID`=order_detail.LensID 
        LEFT JOIN users ON users.userID=`orders`.userID WHERE 1";
        if($date!=""){
            if($date=="-DATE-"){}else{
            $sql.=" AND order_date ='$date'";
            }
        }
        if($status!=""){
            if($status=="-ALL-"){}else{
            $sql.=" AND orders.status =$status";
            }
        }
        $sql.=" GROUP BY  orders.orderID,orders.order_date,orders.status,orders.order_ship,orders.userID,users.firstname,users.lastname,
        users.address,users.phone     
         ORDER BY `orders`.orderID ASC ";
        $order=DB::select($sql);         
        return response()->json($order);
     
    }
    public function updatestatus(Request $request, $id)
    {       

        $status = order::find($id);
        $status->status = $request->get('status'); 
        $status->save();

        return response()->json(array(
            'message' => 'update status successfully', 
            'status' => 'true'));
    }
    public function updateship($id)
    {       

        $status = order::find($id);
        $status->order_ship = date("Y-m-d");
        $status->save();

        return response()->json(array(
            'message' => 'update  successfully', 
            'status' => 'true'));
    }
    public function updateshiped($id)
    {       

        $status = order::find($id);
        $status->order_shiped = date("Y-m-d");
        $status->save();

        return response()->json(array(
            'message' => 'update  successfully', 
            'status' => 'true'));
    }

}