@extends('admin.header')
@section('adminbody')
<div class="row">
<div class="card">
<h4 class="card-title"><center><h1>ADD SHOP</h1></center></h4>
                    <p class="card-description">  </p>
                    <form class="forms-sample" action="/shopaction" method="POST">@csrf
                           <div class="form-group">
                        <label for="exampleInputName1">Shop Name</label>
                        <input type="text" class="form-control" name="sname" id="sname" placeholder="Name">
                      </div>
                    
                      
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>@endsection