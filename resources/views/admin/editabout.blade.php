@extends('admin.header')
@section('adminbody')
<div class="row">
<div class="card-body">
                    <h4 class="card-title"><center><h1>ADD ABOUT</h1></center></h4>
                    <p class="card-description">  </p>@foreach($result as $value)
                    <form class="forms-sample" action="/editaboutaction/{{$value->id}}" method="POST">@csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="{{$value->title}}" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Description</label>@endforeach
                        <input type="text" class="form-control" name="des" id="des" placeholder="{{$value->description}}" >
                      </div>
                      
                      <button type="submit" name="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
            </div>@endsection