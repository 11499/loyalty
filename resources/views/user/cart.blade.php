@extends('user.header')
@section('userbody')
<style>
        input[type="text"],
      input[type="password"],
      textarea {
        border: none;
        outline: none;
        border-bottom: 1px solid #ccc;
      }
      input[type="submit"] {
	background:  #FFD1DC;
	color: black;
	border-style: outset;
	border-color:#FFD1DC ;
	height: 50px;
	width: 150px;
	font: bold15px arial,sans-serif;
	text-shadow: none;
}
    </style>
<section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Cart</h2>
                        <span>Buy  all of your fav products.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
        <table class="table table-bordered" style="border-color:lavander">
                      <thead>
                        <tr>
                          <th> No.</th>
                          <th>Product name </th>
                          <th>Product Image</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th> Amount </th>
                          <th> Delete </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>@foreach( $result as $value)
                          <td> 1 </td>
                          <td> {{$value->productname}}</td>
                          <td>  <img src="/gallery/{{$value->image}}" alt="" width="150" height="150">
                 </td>
                
                          <td> {{$value->price}} </td>
                          <td> {{$value->quantity}}</td>
                           <td> {{$value->total}}</td> 
                        
                        <td>  <a href="/deletecart/ {{$value->id}}"><img src="/gallery/trash.png" alt="" width="25" height="25">
                        </a>  </td>
                                             </tr>
                        @endforeach
                      </tbody>
                    </table><br>
                   <a href="/buynow"><input type="submit" name="submit" id="sumit" value="PROCEED">
                   </a> 
                   <a href="/userpage">
                    <input type="submit" name="submit" id="sumit" value="ADD PRODUCT"></a>
        </div>

    </section>@endsection