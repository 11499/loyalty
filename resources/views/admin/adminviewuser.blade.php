@extends('admin.header')
@section('adminbody')
<div class="row"><center><h1>USER</h1></center>
<div class="card">
                  <div class="card-body">
                    <h4 class="card-title"></h4>
                
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>NAME</th>
                          <th>EMAIL</th>
                          <th>PHONE</th>
                          <th>PLACE</th>
                          <th>GENDER</th>
                        </tr>
                      </thead>
                      <tbody> 
                      @foreach($result as $value)
                        <tr>
                          <td>{{$value->name}}</td>
                          <td>{{$value->email}}</td>
                          <td>{{$value->phone}}</td>
                          <td>{{$value->place}}</td>
                          <td>{{$value->gender}}</td>
                        </tr>@endforeach
                
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>@endsection