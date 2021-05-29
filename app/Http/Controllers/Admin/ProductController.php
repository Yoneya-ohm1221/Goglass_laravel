<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $product = Product::where('productID', 'LIKE', "%$keyword%")
                ->orWhere('producttypeID', 'LIKE', "%$keyword%")
                ->orWhere('bandID', 'LIKE', "%$keyword%")
                ->orWhere('productname', 'LIKE', "%$keyword%")
                ->orWhere('stock', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('Likes', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $product = Product::latest()->paginate($perPage);
        }

        return view('admin.product.index', compact('product'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([

            'productname'         =>  'required',
            'price'         =>  'required',
            'stock'         =>  'required',
            'image'         =>  'required|image|max:2048',
            'producttypeID'         =>  'required',
            'bandID'         =>  'required',
            'Likes'         =>  'required',
        ]);
       
        $image = $request->file('image');
 
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/uploadfile/product'), $image->getClientOriginalName());
        $imageFileName = $image->getClientOriginalName();
        $form_data = array(
            'productID'       =>   $request->productID,
            'productname'        =>   $request->productname,
            'price'        =>   $request->price,
            'stock'        =>   $request->stock,
            'image'            =>   $imageFileName,
            'producttypeID'        =>   $request->producttypeID,
            'bandID'        =>   $request->bandID,
            'Likes'        =>   $request->Likes
        );
       
        /*
        $requestData = $request->all();
        $image = $request->file('imageFileName');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image);
        */
        Product::create($form_data);
       
        return redirect('admin/product')->with('flash_message', 'Product added!');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
         
            'productname'         =>  'required',
            'price'         =>  'required',
            'stock'         =>  'required',
            'image'         =>  'required|image|max:2048',
            'producttypeID'         =>  'required',
            'bandID'         =>  'required',
            'Likes'         =>  'required',
        ]);
       
        $image = $request->file('image');
 
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/uploadfile/product'),$image->getClientOriginalName());
        $imageFileName = $image->getClientOriginalName();
        $form_data = array(
                'productID'       =>   $request->productID,
            'productname'        =>   $request->productname,
            'price'        =>   $request->price,
            'stock'        =>   $request->stock,
            'image'            =>   $imageFileName,
            'producttypeID'        =>   $request->producttypeID,
            'bandID'        =>   $request->bandID,
            'Likes'        =>   $request->Likes
        );
       
        $product = Product::findOrFail($id);
        $product->update($form_data);
 
        return redirect('admin/product')->with('flash_message', 'Product updated!');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect('admin/product')->with('flash_message', 'Product deleted!');
    }


  
    
}
