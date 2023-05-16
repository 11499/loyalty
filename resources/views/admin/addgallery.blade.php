@extends('admin.header')
@section('adminbody')
<div class="row">
<div class="card">
<h4 class="card-title"><center><h1>ADD GALLERY</h1></center></h4>
                    <p class="card-description">  </p>
                    <form class="forms-sample" action="/galleryaction" method="POST" enctype="multipart/form-data">@csrf
                           <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Name">
                      </div>
                    
                      <div class="form-group">
                        <label for="exampleInputName1">Image</label>
                        <input type="file" class="form-control" id="img" name="img" placeholder="img">
                      </div>
                     
                   
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>@endsection