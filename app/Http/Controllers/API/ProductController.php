<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Product;
use Illuminate\Http\Request;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public static function shop(Request $request) 
    {
        $query= $request->get('query');
        $productTypeID = $request->get('productTypeID');       
        $bandID = $request->get('bandID'); 

        $sql="SELECT product.*,product_type.*,band.*,COUNT(DISTINCT review.reviewID) as commentCount,COUNT(DISTINCT like_product.likesID)as likesCount
          FROM product 
        INNER JOIN product_type ON product_type.productTypeID=product.productTypeID
        INNER JOIN band ON band.bandID=product.bandID
        LEFT JOIN review ON review.productID = product.productID
        LEFT JOIN like_product ON like_product.productID = product.productID
        WHERE 1 ";
        if($query!=""){
            $sql.="AND product.productName LIKE '%$query%' OR 
                       product_type.typename LIKE '%$query%' ";
        }

        if($productTypeID!=""){            
            $sql.="AND product.productTypeID=$productTypeID ";            
        } 
        if($bandID!=""){            
            $sql.="AND product.bandID=$bandID ";            
        } 
        $sql.=" GROUP BY product.productID,product.producttypeID,product.bandID,product.productname,product.stock,
        product.price,product.image,product.Likes,product.created_at,product_type.producttypeID,product_type.typename,
        band.bandID,.band.bandName,band.created_at";

        
        $product=DB::select($sql);         
        return response()->json($product);

    }  
    public function view($id)
    {
        $sql="SELECT product_type.*,band.*,product.*,COUNT(DISTINCT like_product.likesID) as countLike FROM product 
        INNER JOIN product_type ON product_type.productTypeID=product.productTypeID
        INNER JOIN band ON band.bandID=product.bandID
        LEFT JOIN like_product ON like_product.productID = product.productID 
        WHERE product.productID = $id";
         $sql.=" GROUP BY product.productID,product.producttypeID,product.bandID,product.productname,product.stock,
         product.price,product.image,product.Likes,product.created_at,product_type.producttypeID,product_type.typename,
         band.bandID,.band.bandName,band.created_at";
        $product=DB::select($sql)[0];         
        return response()->json($product);
    }

    
    public function updateStock(Request $request, $id)
        {       
 
            $product = Product::find($id);
            $product->stock = $request->get('stock'); 
            $product->save();
    
            return response()->json(array(
                'message' => 'update stock successfully', 
                'status' => 'true'));
        }
        public function Recommentproduct()
    {
        $sql="SELECT productname,`image` FROM `product` ORDER BY RAND()  LIMIT 7";
        $product=DB::select($sql);         
        return response()->json($product);
    }
}
