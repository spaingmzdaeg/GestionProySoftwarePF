@extends('user_template.layouts.template')
@section('main-content')
<h2>{{$category->category_name}} - ({{$category->product_count}})</h2>
<div id="main_slider">
    <div class="container">
       <h1 class="fashion_taital">{{$category->category_name}}</h1>
       <div class="fashion_section_2"> 
          <div class="row">
            @foreach ($products as $product)
             <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                   <h4 class="shirt_text">{{$product->product_name}}</h4>
                   <p class="price_text">Price  <span style="color: #262626;">$ {{$product->price}}</span></p>
                   <div class="tshirt_img"><img src="{{ asset($product->product_img) }}"></div>
                   <div class="btn_main">
                     <div class="buy_bt">
                        <form action="{{ route('addproducttocart') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="1" name="quantity">
                            <br>
                            <input type="submit" class="btn btn warning" value="Buy Now">
                        </form>
                    </div>
                      <div class="seemore_bt"><a href="{{ route('singleproduct', [$product->id, $product->slug]) }}">See More</a></div>
                   </div>
                </div>                  
             </div>
            @endforeach
          </div>
       </div>
    </div>
 

 <div class="carousel-item">
    <div class="container">
       <h1 class="fashion_taital">Man & Woman Fashion</h1>
       <div class="fashion_section_2">
          <div class="row">
             <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                   <h4 class="shirt_text">Man T -shirt</h4>
                   <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                   <div class="tshirt_img"><img src="{{ asset('home/images/tshirt-img.png') }}"></div>
                   <div class="btn_main">
                      <div class="buy_bt"><a href="#">Buy Now</a></div>
                      <div class="seemore_bt"><a href="#">See More</a></div>
                   </div>
                </div>
             </div>
             <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                   <h4 class="shirt_text">Man -shirt</h4>
                   <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                   <div class="tshirt_img"><img src="{{ asset('home/images/dress-shirt-img.png') }}"></div>
                   <div class="btn_main">
                      <div class="buy_bt"><a href="#">Buy Now</a></div>
                      <div class="seemore_bt"><a href="#">See More</a></div>
                   </div>
                </div>
             </div>
             <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                   <h4 class="shirt_text">Woman Scart</h4>
                   <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                   <div class="tshirt_img"><img src="{{ asset('home/images/women-clothes-img.png') }}"></div>
                   <div class="btn_main">
                      <div class="buy_bt"><a href="#">Buy Now</a></div>
                      <div class="seemore_bt"><a href="#">See More</a></div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="carousel-item">
    <div class="container">
       <h1 class="fashion_taital">Man & Woman Fashion</h1>
       <div class="fashion_section_2">
          <div class="row">
             <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                   <h4 class="shirt_text">Man T -shirt</h4>
                   <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                   <div class="tshirt_img"><img src="{{ asset('home/images/tshirt-img.png') }}"></div>
                   <div class="btn_main">
                      <div class="buy_bt"><a href="#">Buy Now</a></div>
                      <div class="seemore_bt"><a href="#">See More</a></div>
                   </div>
                </div>
             </div>
             <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                   <h4 class="shirt_text">Man -shirt</h4>
                   <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                   <div class="tshirt_img"><img src="{{ asset('home/images/dress-shirt-img.png') }}"></div>
                   <div class="btn_main">
                      <div class="buy_bt"><a href="#">Buy Now</a></div>
                      <div class="seemore_bt"><a href="#">See More</a></div>
                   </div>
                </div>
             </div>
             <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                   <h4 class="shirt_text">Woman Scart</h4>
                   <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                   <div class="tshirt_img"><img src="{{ asset('home/images/women-clothes-img.png') }}"></div>
                   <div class="btn_main">
                      <div class="buy_bt"><a href="#">Buy Now</a></div>
                      <div class="seemore_bt"><a href="#">See More</a></div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
</div>
<a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
<i class="fa fa-angle-left"></i>
</a>
<a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
<i class="fa fa-angle-right"></i>
</a>
</div>
@endsection 