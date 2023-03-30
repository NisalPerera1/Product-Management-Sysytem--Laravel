@extends('product.layout')

@section('content')
<br>
<h2>Enter Your New Product Details</h2><br>
<!--this form is for create products  -->

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<!--onsubmit sending inputs to the productcontroller's store function with POST method  -->
<form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">

<div class="col-lg-12">
<div class= " form-group"> 
<label>Product Name</label>
<input type="text" class="form-control" id="productname" name="name" value="{{$product->name}}" >
<br>
</div>
</div>

<div class="col-lg-12">
<div class= " form-group"> 
<label>product Description</label>
<input type="text" class="form-control" id="productdescription" name="description" value="{{$product->description}}" >
<br>
</div>
</div>

<div class="col-lg-12">
<div class= " form-group"> 
<label>product Price</label>
<input type="text" class="form-control" id="productprice" name="price" value="{{$product->price}}" >
<br>
</div>
</div>

<div class="col-lg-12">
<div class= " form-group"> 
<label for="image">Upload an Image of the Product:</label>
<input type="file" id="image" name="image" accept="image/*">
<br>
</div>
</div>

<div class="col-lg-12">
<div class= " form-group"> 
<button type="submit" class="btn btn-primary" >Submit</button>

<!--href is assigned tovindex-->
<a class="btn btn-danger" href="{{route('product.index')}}">Back</a>

</div>
</div>

</div>
</form>

@endsection