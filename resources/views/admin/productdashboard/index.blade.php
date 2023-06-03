@extends('admin.layout1.master')
@section('content')
{{-- <div class="container"> --}}
    <div class="row">
      <div class="card col">

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
                        <th>category_name</th>
                        <th>image1</th>
                        <th>image2</th>
                        <th>image3</th>
                        <th>lessors_id </th>
                        <th>Action</th>
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
                            <td>{{ $product->category->category_name }}</td>
                            <td><img src="{{ $product->image1 }}" alt="product image" width="100" height="100"></td>
                            <td><img src="{{ $product->image2 }}" alt="product image" width="100" height="100"></td>
                            <td><img src="{{ $product->image3 }}" alt="product image" width="100" height="100"></td>

                            <td>{{ $product->lessor_id }}</td>
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
            <div class="d-flex justify-content-center">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
{{-- </div> --}}
@endsection
