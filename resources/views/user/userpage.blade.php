@extends('user.header')
@section('userbody')
<section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Latest Products</h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">@foreach($result as $value)
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="/singleproduct/{{$value->id}}"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                    <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <img src="/gallery/{{$value->image}}" alt="" width="300" height="500">
                        </div>
                        <div class="down-content">
                        <h4>{{$value->brand}}</h4><br>
            
                            <h4>{{$value->productname}}</h4>
                            <span>{{$value->price}}</span>
                           
                        </div>
                    </div>
                </div>@endforeach
            
              
                <div class="col-lg-12">
                    <div class="pagination">
                        <ul>
                            <li>
                                <a href="#">1</a>
                            </li>
                            <li class="active">
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li>
                            <li>
                                <a href="#">4</a>
                            </li>
                            <li>
                                <a href="#">&gt;</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>@endsection