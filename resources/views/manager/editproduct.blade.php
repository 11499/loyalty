@extends('manager.header')
@section('managerbody')
<div class="row">
<div class="card">
<h4 class="card-title"><center><h1>UPDATE PRODUCT</h1></center></h4>
                    <p class="card-description">  </p>@foreach($result as $value)
                    <form class="forms-sample" action="/editproductaction/{{$value->id}}" method="POST" enctype="multipart/form-data">@csrf
                           <div class="form-group">
                        <label for="exampleInputName1">Product Name</label>
                        <input type="text" class="form-control" name="pname" id="pname" value="{{$value->productname}}">
                      </div>
                    
                      <div class="form-group">
                        <label for="exampleInputName1">Price</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{$value->price}}">
                      </div>
                    
                      <div class="form-group">
                        <label for="exampleInputName1">Brand</label>
                        <input type="text" class="form-control" name="brand" id="brand" value="{{$value->brand}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Description</label>
                        <input type="text" class="form-control" name="des" id="des" value="{{$value->description}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Image</label>
                       <img src="/gallery/{{$value->image}}" alt="">
                      </div>@endforeach
                      <div class="form-group">
                        <label for="exampleInputName1">Image</label>
                        <input type="file" class="form-control" name="img" id="img" placeholder="image">
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
           @endsection