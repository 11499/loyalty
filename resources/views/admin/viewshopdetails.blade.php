@extends('admin.header')
@section('adminbody')
<div class="row"><center><h1>SHOP</h1></center>
<div class="card">
                  <div class="card-body">
                    <h4 class="card-title"></h4>
                
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>SHOP NAME</th>
                          <th>MANAGER NAME</th>
                       
                        </tr>
                      </thead>
                      <tbody> 
                      @foreach($result as $value)
                        <tr>
                          <td>{{$value->shopname}}</td>
                          <td>{{$value->name}}</td>
                       
                        </tr>@endforeach
                
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>@endsection