@extends('frontend.master')

@section('main-content')
    
    <div class="slider-area">
        <!-- Slider -->
    @include('frontend.layouts.slider')
        <!-- ./Slider -->
    </div> <!-- End slider area -->
    
    @include('frontend.layouts.promo')
            <!-- End promo area -->

    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">
                            

                        @if(count($products)>0)
                            @foreach($products as $product) 
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="{{asset('images/products/'.$product->image)}}" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to
                                                cart</a>
                                            <a href="{{Route('singleproduct1', $product->id)}}" class="view-details-link"><i
                                                    class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="{{Route('singleproduct1', $product->id)}}">{{$product->name}}</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$700.00</ins> <del>$100.00</del>
                                    </div>
                                </div>

                            @endforeach
                        @endif
 


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
        <!-- End main content area -->

        @include('frontend.layouts.brands')
        <!-- End brands area -->

        
        @include('frontend.layouts.widget')
        <!-- End product widget area -->

@endsection