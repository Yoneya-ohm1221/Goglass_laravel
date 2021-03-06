@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">order {{ $order->orderID }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/order') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/order/' . $order->orderID . '/edit') }}" title="Edit order"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/order' . '/' . $order->orderID) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete order" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">


                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $order->orderID }}</td>
                                    </tr>
                                    <tr><th> OrderID </th><td> {{ $order->orderID }} </td></tr><tr><th> UserID </th><td> {{ $order->userID }} </td></tr><tr><th> Order Date </th><td> {{ $order->order_date }} </td></tr>
                                </tbody>
                            </table>

                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
