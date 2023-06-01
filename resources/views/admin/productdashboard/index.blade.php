@extends('admin.layout1.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
           proudcts
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>product_name</th>
                        <th>product_description</th>
                         <th>product_price</th>
                        <th>status</th>
                        <th>product_type</th>
                        <th>category_id</th>
                        <th>image1</th>
                        <th>image2</th>
                        <th>image3</th>
                        <th>lessors_id </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->product_name }}</td>
                            <td>{{  $product->product_description}}</td>
                             <td>{{ $product->product_price }}</td>
                            <td>{{ $product->status }}</td>
                            <td>{{ $product->product_type }}</td>
                            <td>{{ $product->category_id}}</td>
                            <td>{{ $product->image1 }}</td>
                            <td>{{ $product->image2 }}</td>
                            <td>{{ $product->image3 }}</td>
                            <td>{{ $product->lessors_id }}</td>
                            <td>
                                <a href="{{ route('productdashboard.show', $product->id) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('productdashboard.edit', $product->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('productdashboard.destroy', $product->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
