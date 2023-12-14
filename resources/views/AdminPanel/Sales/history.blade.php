@extends('AdminPanel.main')
@section('myheading')
   Sales
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
            <th>Id</th>
            <th>Date</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total Revenue</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sales as $sale)
        <tr>
            <td>{{ $sale->id }}</td>
            <td>{{ $sale->sale_date }}</td>
            <td>{{ $sale->product->name }}</td>
            <td>{{ $sale->quantity }}</td>
            <td>{{ $sale->total_revenue }}</td>
            <td>
                <a href="{{ route('delete_sale',['id' => $sale->id ])}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                <a href="{{ route('edit_sale',['id' => $sale->id ])}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection