@extends('admin.header')
@section('adminbody')
<div class="row">
<div class="card">
<h4 class="card-title"><center><h1>ASSIGN SHOP</h1></center></h4>
                    <p class="card-description">  </p>@foreach($result as $value)
                    <form class="forms-sample" action="/shopassignaction/{{$value->id}}" method="POST" enctype="multipart/form-data">@csrf
                     <div class="form-group">
                        <label for="exampleInputName1">NAME</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="{{$value->name}}">
                      </div>
                    
                      <div class="form-group">
                        <label for="exampleInputName1">EMAIL</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="{{$value->email}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">PHONE</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="{{$value->phone}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">shopname</label>
                      <select name="shop" id="shop">
                        @foreach($result2 as $val)
                        <option value="{{$val->id}}">{{$val->shopname}}</option>
                        @endforeach
                      </select> </div>
                   @endforeach
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>@endsection