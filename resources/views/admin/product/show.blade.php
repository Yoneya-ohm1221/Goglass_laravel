@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Product {{ $product->productID }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/product') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/product/' . $product->productID . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/product' . '/' . $product->productID) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $product->productid }}</td>
                                    </tr>
                                    <tr><th> ProductID </th><td> {{ $product->productID }} </td></tr><tr><th> ProductName </th><td> {{ $product->productName }} </td></tr><tr><th> Price </th><td> {{ $product->price }} </td></tr>
                                    <tr><th> ProductID </th><td> {{ $product->productID }} </td></tr><tr><th> Productname </th><td> {{ $product->productname }} </td></tr><tr><th> Stock </th><td> {{ $product->stock }} </td></tr><tr><th> Price </th><td> {{ $product->price }} </td></tr><tr><th> Image </th><td> {{ $product->image }} </td></tr><tr><th> Likes </th><td> {{ $product->Likes }} </td></tr><tr><th> ProducttypeID </th><td> {{ $product->producttypeID }} </td></tr><tr><th> BandID </th><td> {{ $product->bandID }} </td></tr><tr><th> Image </th><td> <img src="{{ url('/') }}/assets/uploadfile/product/{{ $product->image }}" width='500px' height='500px'>{{ $product->imageFileName }}</td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
