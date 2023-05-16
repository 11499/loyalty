
@extends('user.header')
@section('userbody')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  function add(val)
    {
    var a =  document.getElementById('qt').value;
    var b =  document.getElementById('prize').value;
   var total = parseInt(a) * parseInt(b); 
   document.getElementById('total').value=total;
}
</script>
<script>
  function add(val)
    {
    var a =  document.getElementById('qt').value;
    var b =  document.getElementById('prize').value;
   var total = parseInt(a) * parseInt(b); 
   document.getElementById('total').value=total;
   var z =  document.getElementById('sum').value;
   
}
</script>
<style>
        input[type="text"],
      input[type="password"],
      textarea {
        border: none;
        outline: none;
       
      }
      input[type="submit"] {
	background:  green;
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
                        <h2>Buy Now</h2>
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
                      <tbody><form action="">
                        <tr>@foreach( $result as $value)
                          <td> 1 </td>
                          <td> {{$value->productname}}</td>
                          <td>  <img src="/gallery/{{$value->image}}" alt="" width="150" height="150">
                 </td>
                
                          <td> <input type="text" name="prize" id="prize" value="{{$value->price}}"> </td>
                          <td>  <input  type="number" name="qt" id="qt" value="{{$value->quantity}}" onchange="add(this.value)"></td>
                           <td> <input type="text" name="total" id="total" value="{{$value->total}}"></td> 
                                    <td>  <a href="/deletecart/ {{$value->id}}"><img src="/gallery/trash.png" alt="" width="25" height="25">
                        </a>  
                    </td>
                    </tr>
                    @endforeach                         
                        <tr>

                        @foreach($result2 as $val)
                        <th>total amout</th>
                         <td colspan="6"> <input type="text" name="sum" id="sum" value="{{$val->total}}"></td>@endforeach</tr>
                     
                        </tbody>
                    </table>
                    </form>
                    <table> 
                    </table>
                    <br>  <a href="/buynow"><input type="submit" name="submit" id="sumit" value="BUY NOW">
                   </a> 
                       </div>

    </section>@endsection
 