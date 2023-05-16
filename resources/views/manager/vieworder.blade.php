@extends('manager.header')
@section('managerbody')

<div class="row"><center><h1>PRODUCT</h1></center>
<div class="card">
                  <div class="card-body">
                    <h4 class="card-title"></h4>
                
                    <table class="table table-hover">
                      <thead>
                        <tr>
                        <th>USER NAME</th>
                        <th>PRODUCT NAME</th>
                          <th>TOTAL</th>
                          <th>QUANTITY</th>
                          <th>STATUS</th>
                         
                        </tr>
                      </thead>
                      <tbody> 
                      @foreach($result as $value)
                        <tr>
                        <td>{{$value->name}}</td>
                        <td>{{$value->productname}}</td>
                          <td>{{$value->total}}</td>
                          <td>{{$value->quantity}}</td>
                          <td>{{$value->status}}</td>
                       
                        </tr>@endforeach
                
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>@endsection

         