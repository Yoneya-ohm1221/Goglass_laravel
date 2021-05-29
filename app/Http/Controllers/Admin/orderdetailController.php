<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\orderdetail;
use Illuminate\Http\Request;
use DB;

class orderdetailController extends Controller
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
            $orderdetail = orderdetail::where('order_detailID', 'LIKE', "%$keyword%")
                ->orWhere('orderID', 'LIKE', "%$keyword%")
                ->orWhere('productID', 'LIKE', "%$keyword%")
                ->orWhere('LensID', 'LIKE', "%$keyword%")
                ->orWhere('Quantity', 'LIKE', "%$keyword%")
                ->orWhere('price_total', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $orderdetail = orderdetail::latest()->paginate($perPage);
   
         

        }

        return view('admin.orderdetail.index', compact('orderdetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.orderdetail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        orderdetail::create($requestData);

        return redirect('admin/orderdetail')->with('flash_message', 'orderdetail added!');
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
        $orderdetail = orderdetail::findOrFail($id);
    
        return view('admin.orderdetail.show', compact('orderdetail'));
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
        $orderdetail = orderdetail::findOrFail($id);

        return view('admin.orderdetail.edit', compact('orderdetail'));
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
        
        $requestData = $request->all();
        
        $orderdetail = orderdetail::findOrFail($id);
        $orderdetail->update($requestData);

        return redirect('admin/orderdetail')->with('flash_message', 'orderdetail updated!');
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
        orderdetail::destroy($id);

        return redirect('admin/orderdetail')->with('flash_message', 'orderdetail deleted!');
    }
}
