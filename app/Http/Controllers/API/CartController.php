<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use DB;

class CartController extends Controller
{
 
    public function insert(Request $request)
    {
        //add user data into users table
        $cart = new Cart();
        $cart->productID = $request->get('productID');      
        $cart->userID = $request->get('userID');
        $cart->lensID = $request->get('lensID');
       // $user->gender = $request->get('gender');                  
        $cart ->save();                
        return response()->json(array(
            'message' => 'add cart successfully', 
            'status' => 'true'));
    }
    public function viewcart($id)
    {
      //  SUM(lens.lensprice+product.price) AS totalPrice 
        $sql="SELECT lens.lensprice,lens.lenstype,lens.lensID,product.productName,shopping_cart.productID,shopping_cart.userID,shopping_cart.lensID,
        product_type.typename,band.bandname,product.image,product.price as productPrice,shopping_cart.cartID,shopping_cart.amount,product.stock
        
        FROM shopping_cart 
        INNER JOIN lens ON lens.lensID=shopping_cart.lensID
        INNER JOIN product ON product.productID=shopping_cart.productID
        INNER  JOIN band ON band.bandID=product.bandID
        INNER JOIN product_type ON product_type.producttypeID=product.producttypeID
        WHERE shopping_cart.UserID=$id";
       // $sql.=" GROUP BY lens.lensprice,product.productName,shopping_cart.productID,shopping_cart.userID,shopping_cart.lensID,
      //  product_type.typename,lens.lenstype,lens.lensID,band.bandname,product.image";
      $sql.=" ORDER BY shopping_cart.cartID DESC ";
        $cart =DB::select($sql);         
        return response()->json($cart);
    }
    public function countcart($id)
    {
      //  SUM(lens.lensprice+product.price) AS totalPrice 
        $sql="SELECT COUNT(cartID)
        FROM shopping_cart
        WHERE userID=$id";
        $cart =DB::select($sql)[0];         
        return response()->json($cart);
    }
    
    public static function deleteCart($id)
    {
        $sql="DELETE FROM shopping_cart WHERE cartID=$id";
        $cart=DB::delete($sql);         
        return response()->json(array(
          'message' => 'delete successfully', 
          'status' => 'true'));
    
    }
    public function updatequaty(Request $request, $id)
    {       
  
        $cart = Cart::find($id);
        $cart->amount = $request->get('amount');  
        $cart->save();

        return response()->json(array(
            'message' => 'add  successfully', 
            'status' => 'true'));
    }
    public static function deleteallCart($id)
    {
        $sql="DELETE FROM shopping_cart WHERE userID=$id";
        $cart=DB::delete($sql);         
        return response()->json(array(
          'message' => 'delete successfully', 
          'status' => 'true'));
    
    }
}