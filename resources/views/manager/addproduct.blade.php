@extends('manager.header')
@section('managerbody')
<div class="row">
<div class="card">
<h4 class="card-title"><center><h1>ADD PRODUCT</h1></center></h4>
                    <p class="card-description">  </p>
                    <form class="forms-sample" action="/productaction" method="POST" enctype="multipart/form-data">@csrf
                           <div class="form-group">
                        <label for="exampleInputName1">Product Name</label>
                        <input type="text" class="form-control" name="pname" id="pname" placeholder="Name">
                      </div>
                    
                      <div class="form-group">
                        <label for="exampleInputName1">Price</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="Name">
                      </div>
                    
                      <div class="form-group">
                        <label for="exampleInputName1">Brand</label>
                        <input type="text" class="form-control" name="brand" id="brand" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Description</label>
                        <input type="text" class="form-control" name="des" id="des" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Image</label>
                        <input type="file" class="form-control" name="img" id="img" placeholder="Name">
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
           @endsection