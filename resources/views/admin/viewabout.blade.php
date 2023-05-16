@extends('admin.header')
@section('adminbody')
<div class="row"><center><h1>ABOUT</h1></center>
<div class="card">
                  <div class="card-body">
                    <h4 class="card-title"></h4>
                
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>TITLE</th>
                          <th>DESCRIPTION</th>
                          <th>EDIT</th>
                          <th>DELETE</th>
                        </tr>
                      </thead>
                      <tbody> 
                      @foreach($result as $value)
                        <tr>
                          <td>{{$value->title}}</td>
                          <td>{{$value->description}}</td>
                          <td><a href="/editabout/{{$value->id}}"><label class="badge badge-warning">
                            EDIT</label></a></td>
                       <td><a href="/deleteabout/{{$value->id}}"><label class="badge badge-danger">
                           DELETE</label></a></td>
                        </tr>@endforeach
                
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>@endsection