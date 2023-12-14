@extends('AdminPanel.main')
@section('myheading')
   View Order Details
@endsection

@section('mycontent')
<div class="row">
    <div class="col-md-6">
        <h3 class="fw-bold">Shipping Details</h3>
        <label for="" class="fw-bold mt-3">First Name</label>
        <div class="border p-2">{{$orders->fname}}</div>
        <label for="" class="fw-bold mt-3">Last Name</label>
        <div class="border p-2">{{$orders->lname}}</div>
        <label for="" class="fw-bold mt-3">Email</label>
        <div class="border p-2">{{$orders->email}}</div>
        <label for="" class="fw-bold mt-3">Contact No</label>
        <div class="border p-2">{{$orders->phone}}</div>
        <label for="" class="fw-bold mt-3">Shipping Address</label>
        <div class="border p-2">
            {{$orders->address1}},
            {{$orders->address2}},
            {{$orders->city}},
            {{$orders->state}},
            {{$orders->country}},
        </div>
        <label for="" class="fw-bold mt-3">Zip Code</label>
        <div class="border p-2">{{$orders->pincode}}</div>
        <label for="" class="fw-bold mt-3">Order By:</label>
        <div class="border p-2">{{$orders->order_by}}</div>
    </div>
    <div class="col-md-6">
        <h3 class="fw-bold">Order Details</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders->orderitems as $item)
                    <tr>
                        <td>{{ $item->products->name }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <img src="{{ asset('./admin/productimages/' . $item->products->image) }}" width="70px" height="60px" alt="Product Image">
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th>Grand Total: Rs. {{ $orders->total_price}}</th>
            </tfoot>
        </table>
            <form action="{{ route('update_order',['id' => $orders->id ])}}" method="POST">
                @csrf
                @method('PUT')
            <label for="" class="mt-3 fw-bold">Order Status</label>
                <select name="order_status" class="form-select">
                    <option value="">Order Status</option>
                    <option {{ $orders->status =='placed' ? 'selected':''}} value="placed">Pending</option>
                    <option {{ $orders->status =='completed' ? 'selected':''}} value="completed">Completed</option>
                </select>
                <button type="submit" class="btn btn-info mt-3 float-right">Update</button>
            </form>
            <a href="{{ url('/orders')}}" class="btn btn-danger mt-3 mx-3 float-right">Back</a>
    </div>
</div>               
         
       
  


@endsection