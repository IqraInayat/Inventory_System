@extends('Staff.staff')
@section('myheading')
    Products Data
@endsection
@section('mycontent')
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Discount: %</th>
            <th>Current Status</th>
            <th>Product Image</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ optional(App\Models\Category::find($product->category))->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>Rs. {{ $product->original_price }}</td>
                <td>{{ $product->discount }}%</td>
                @if($product->quantity > 0)
                    <td class="text-success">{{ $product->current_status}}</td>
                @else
                    <td class="text-danger">Out of Stock</td>
                @endif
                <td><img src="{{ asset('./admin/productimages/' . $product->image) }}" alt="User Image" height="120px" height="120px"></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection