@extends('product.layout')

@section('content')
<br>
<h2>Enter Your Product Details</h2><br>
<!--this form is for create items  -->

<!--onsubmit sending inputs to the itemcontroller's store function with POST method  -->
<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
@csrf

<div class="row">

<div class="col-lg-12">
<div class= " form-group"> 
<label>Product Name</label>
<input type="text" class="form-control" id="Productname" name="name" placeholder="Enter Product Name">
<br>
</div>
</div>

<div class="col-lg-12">
<div class= " form-group"> 
<label>Product Description</label>
<input type="text" class="form-control" id="Productdescription" name="description" placeholder="Enter Product Description">
<br>
</div>
</div>

<div class="col-lg-12">
<div class= " form-group"> 
<label>Product Price</label>
<input type="text" class="form-control" id="Productprice" name="price" placeholder="Enter Product Price">
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

<!--href is assigned to index-->
<a class="btn btn-danger" href="{{route('product.index')}}">Back</a>

</div>
</div>

</div>
</form>

@endsection