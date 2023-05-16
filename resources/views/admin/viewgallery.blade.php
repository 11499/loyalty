@extends('admin.header')
@section('adminbody')
<div class="row"><center><h1>GALLERY</h1></center>
<div class="card">
                  <div class="card-body">
                    <h4 class="card-title"></h4>
                
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>TITLE</th>
                          <th>IMAGE</th>
                          <th>EDIT</th>
                          <th>DELETE</th>
                        </tr>
                      </thead>
                      <tbody> 
                      @foreach($result as $value)
                        <tr>
                          <td>{{$value->title}}</td>
                       
                          <td><img src= "gallery/{{$value->image}}" alt="" width="100px"></td>
                          <td><a href="/editgallery/{{$value->id}}"><label class="badge badge-warning">
                            EDIT</label></a></td>
                       <td><a href="/deletegallery/{{$value->id}}"><label class="badge badge-danger">
                           DELETE</label></a></td>
                        </tr>@endforeach
                
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>@endsection