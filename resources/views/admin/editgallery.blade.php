@extends('admin.header')
@section('adminbody')
<div class="row">
<div class="card">
<h4 class="card-title"><center><h1>EDIT GALLERY</h1></center></h4>
                    <p class="card-description">  </p>@foreach($result as $value)
                    <form class="forms-sample" action="/editgalleryaction/{{$value->id}}" method="POST" enctype="multipart/form-data">@csrf
                           <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="{{$value->title}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">image</label>
                        <td><img src= "/gallery/{{$value->image}}" alt="" width="100px"></td>
                       </div>@endforeach
                      <div class="form-group">
                        <label for="exampleInputName1">Image</label>
                        <input type="file" class="form-control" id="img" name="img" placeholder="img">
                      </div>
                     
                   
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>@endsection