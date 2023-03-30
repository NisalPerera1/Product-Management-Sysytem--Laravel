@extends('product.layout')

@section('content')
<br>

<ul class="nav justify-content-end">
 <div>
 <a class="btn btn-primary" href="{{route('home')}}">Go Back To Home</a>

 </div>
</ul>

<div class= "form-group row">
<div class="col-lg-12 margin-tb">
    <div class="float-right" alignment="absolute">
        <a class="btn btn-success" href="{{route('product.create')}}">Create a New Product</a>

    </div>
</div>
</div><br>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif




<!--this is for view details  -->
<table class="table table-bordered">
    <tr>
     <th>Product ID</th> 
     <th>Product Name</th>   
     <th>Product Description</th> 
     <th>Product Price</th>   
     <th>Product Image</th>   
  
    </tr>
       <!--this is for view details.data object assigned in the controller -->
       <tbody>
        @foreach ($data as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>
                                    @if ($product->image)
                                        <img src="{{ asset('storage/images/'.$product->image) }}" alt="Product Image" style="width: 100px;">
                                    @else
                                        No Image
                                    @endif
                                </td>
                <td>
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                        <!--Here is the edit button -->
                        <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">Edit</a>
                        <!--Here is the delete button -->
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



@endsection