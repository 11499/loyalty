@extends('admin.header')
@section('adminbody')
<div class="row">
<div class="card">
<h4 class="card-title"><center><h1>ADD ABOUT</h1></center></h4>
                    <p class="card-description">  </p>
                    <form class="forms-sample" action="/aboutaction" method="POST">@csrf
                           <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Name">
                      </div>
                    
                      <div class="form-group">
                        <label for="exampleInputName1">Description</label>
                        <input type="text" class="form-control" name="des" id="des" placeholder="Name">
                      </div>
                      
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>@endsection