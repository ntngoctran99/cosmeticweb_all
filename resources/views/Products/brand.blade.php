@extends('layouts.master')

@section('title', 'Home')

@section('banner')
@endsection

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>- What product do you like? -</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/')}}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="featured spad">
        <div class="container">
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="section-title">--}}
{{--                        <h2>- Paula's Choice -</h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row featured__filter">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{asset($product->image)}}">
{{--                            <ul class="featured__item__pic__hover">--}}
{{--                                <li><a href="./shop_details_pro.html"><i class="fa fa-heart"></i></a></li>--}}
{{--                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>--}}
{{--                            </ul>--}}
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{url('products/'.$product->id)}}">{{ $product->name }} </a></h6>
                            <h5>${{ number_format($product->unit_price, 2) }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Section End -->

@endsection
