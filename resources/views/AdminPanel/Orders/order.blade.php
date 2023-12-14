@extends('AdminPanel.main')
@section('myheading')
   New Orders
   <a href="{{ url('orders/order-history') }}" class="btn btn-warning float-end">Order History</a>
@endsection

@section('mycontent')
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
{{-- Table --}}
<table class="table">
    <thead>
        <tr>
            <th>Order Date</th>
            <th>Tracking Number</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ date('d-m-y',strtotime($order->created_at))}}</td>
                <td>{{ $order->tracking_no }}</td>
                <td>{{ $order->total_price }}</td>
                <td>{{ $order->status == 'placed' ? 'Pending' : 'Completed' }}</td>
                <td>
                    <a href="{{ route('view_orders',['id' => $order->id ]) }}" class="btn btn-info">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection