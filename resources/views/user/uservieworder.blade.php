
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
                        <h2>YOUR ORDERS</h2>
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
                          <td>  <input  type="text" name="qt" id="qt" value="{{$value->quantity}}" ></td>
                           <td> <input type="text" name="total" id="total" value="{{$value->total}}"></td> 
                                           </a>  
                    </td>
                    </tr>
                    @endforeach                         
                        <tr>
                       
                        @foreach($result3 as $v)
                        <th>Available Credit</th>
                         <td colspan="6"> <input type="text" name="sum" id="sum" value="{{$v->credit}}">
                        </td>@endforeach</tr>
                       
                </tbody>
                </form>

                
                </table>
                       </div>

    </section>
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>YOUR PAYMENTS</h2>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
        <table class="table table-bordered" style="background-color:lavander">
                      <thead>
                        <tr>
                     
                          <th>AMOUNT </th>
                          <th>PAYMENT</th>
                           
                        </tr>
                      </thead>
                      <tbody>
                        <tr>@foreach( $res as $value)
                        <form action="/order" method="post">@csrf
                           <td> <input type="text" name="id" id="id" value="{{$value->gtotal}}"> </td>
                                       
                      
                          <td> <input type="text" name="prize" id="prize" value="{{$value->payment}}"> </td>
                                         
                    </td>
                    </tr>
                    @endforeach                         
                        
                </tbody>
                </form>

                
                </table>
                       </div>

    </section>@endsection
 