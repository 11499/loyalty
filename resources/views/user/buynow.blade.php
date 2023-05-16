
@extends('user.header')
@section('userbody')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$(document).on('change','#qt',function(){
    var row = $(this).closest('tr');
    var id = parseInt(row.find("#id").val());
    var qnty = parseInt(row.find(this).val());
    var prize = parseInt(row.find('#prize').val());
    var total= parseInt(qnty)*parseInt(prize);
    row.find('#total').val(total);

    $.ajax({
                type: "get",
                url: "/prize",
                data: {
                    id: id,
                    qnty: qnty,
                    total: total
                 
                },
              
            });
            location.reload(true);
});
});

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
        <table class="table table-bordered" style="background-color:lavander">
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
                        <form action="/order" method="post">@csrf
                           <td> <input type="text" name="id" id="id" value="{{$value->id}}"> </td>
                          <td> {{$value->productname}}</td>
                          <td>  <img src="/gallery/{{$value->image}}" alt="" width="150" height="150">
                 </td>
                
                      
                          <td> <input type="text" name="prize" id="prize" value="{{$value->price}}"> </td>
                          <td>  <input  type="number" name="qt" id="qt" value="{{$value->quantity}}" ></td>
                           <td> <input type="text" name="total" id="total" value="{{$value->total}}"></td> 
                                    <td>  <a href="/deletecart/ {{$value->id}}"><img src="/gallery/trash.png" alt="" width="25" height="25">
                        </a>  
                    </td>
                    </tr>
                    @endforeach                         
                        <tr>
                        @foreach($result2 as $val)
                        <th>total amout</th>
                         <td colspan="6"> <input type="text" name="sum" id="sum" value="{{$val->total}}">
                        </td>@endforeach</tr>
                        @foreach($result3 as $v)
                        <th>Credit</th>
                         <td colspan="6"> <input type="text" name="sum" id="sum" value="{{$v->credit}}">
                        </td>@endforeach</tr>
                       
                </tbody>
                </form>
                    @foreach($result2 as $val)
                    @foreach($result3 as $v)
                    @if(($val->total)>=($v->credit))
                  
                    <br><td>  <a href="/bookcard/{{$val->total}}"><input type="submit" name="submit" id="sumit" value="Order with card">
                   </a></td>  
                   @else  <td>  <a href="/bookcard/{{$val->total}}"><input type="submit" name="submit" id="sumit" value="Oeder with card">
                   </a></td>
                   <td>  <a href="/bookcredit/{{$val->total}}"><input type="submit" name="submit" id="sumit" value="Order with credit">
                   </a></td>   @endif
                   @endforeach
                   @endforeach
                
                </table>
                       </div>

    </section>@endsection
 