@extends('layout')
@section('title', 'Orders')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Order List</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Orders</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">Sl No</th>
                                        <th>Order Id</th>
                                        <th>Product</th>
                                        <th>Category</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Order Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $key => $order)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $order->order_id ?? '--' }}</td>
                                            <td>{{ $order->product->product_name ?? '--' }}</td>
                                            <td>{{ $order->product->category->category_name ?? '--' }}</td>
                                            <td>{{ $order->quantity ?? '--' }}</td>
                                            <td>RS {{ $order->total_price ?? '--' }}</td>
                                            <td>
                                                @if($order->order->status == 'pending')
                                                    <span class="badge badge-warning">{{ $order->order->status ?? '--' }}</span>
                                                @elseif($order->order->status == 'dispatched')
                                                    <span class="badge badge-primary">{{ $order->order->status ?? '--' }}</span>
                                                @elseif($order->order->status == 'delivered')
                                                    <span class="badge badge-success">{{ $order->order->status ?? '--' }}</span>
                                                @else
                                                    <span class="badge badge-secondary">{{ $order->order->status ?? '--' }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $order->order->order_date ?? '--' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
       
