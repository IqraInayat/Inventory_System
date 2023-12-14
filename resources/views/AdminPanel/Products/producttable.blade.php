@extends('AdminPanel.main')
@section('myheading')
    Product's Data
@endsection

@section('mycontent')
    {{-- Search --}}
<form action="{{route('search')}}" method="POST">
    @csrf
        <div class="input-group text-danger mb-3">
            <input type="text" name="search" id="search" placeholder="Search Products" value="{{ $search }}">
            <button type="submit" class="input-group-text btn btn-info"><i class="fa-solid fa-magnifying-glass text-light"></i></button>
        </div>
</form>
{{-- Success message --}}
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
{{-- Table --}}
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
                <th>Actions</th>
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
                    <td>
                        <a href="{{ route('delete_product',['id' => $product->id ])}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        <a href="{{ route('edit_product',['id' => $product->id ])}}" class="btn btn-info"><i class="fa-solid fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection