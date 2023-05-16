@extends('manager.header')
@section('managerbody')

<div class="row"><center><h1>PRODUCT</h1></center>
<div class="card">
                  <div class="card-body">
                    <h4 class="card-title"></h4>
                
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>PRODUCT NAME</th>
                          <th>PRICE</th>
                          <th>BRAND</th>
                          <th>DESCRIPTION</th>
                          <th>IMAGE</th>
                          <th>EDIT</th>
                          <th>DELETE</th>
                        </tr>
                      </thead>
                      <tbody> 
                      @foreach($result as $value)
                        <tr>
                          <td>{{$value->productname}}</td>
                          <td>{{$value->price}}</td>
                          <td>{{$value->brand}}</td>
                          <td>{{$value->description}}</td>
                          <td> <img src="/gallery/{{$value->image}}" alt=""></td>
                          <td><a href="/editproduct/{{$value->id}}"><label class="badge badge-warning">
                            EDIT</label></a></td>
                       <td><a href="/deleteproduct/{{$value->id}}"><label class="badge badge-danger">
                           DELETE</label></a></td>
                        </tr>@endforeach
                
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>@endsection

         