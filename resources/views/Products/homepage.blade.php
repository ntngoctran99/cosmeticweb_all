@extends('layouts.master')

@section('title', 'Home')

@section('banner')
    <div class="hero__item set-bg" data-setbg="img/hero/banner1.jpg">
        <div class="hero__text">
            <span>FOOD FOR SKIN</span>
            <h2>Cosmetics <br />100% Authenic</h2>
            <p>Free Pickup and Delivery Available</p>
        </div>
    </div>
@endsection

@section('content')

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach($typeProducts as $product)
                        <div class="col-lg-3">
                            <div style=" border: 1px solid; color: black; " class="categories__item set-bg" data-setbg="{{asset($product->image)}}">
                                <h5><a href="{{url('/products/shop/'.$product->id)}}" style=" border: 1px solid; color: black; "><?php echo $product->name ?></a></h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>-  Product  -</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($productSamples as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="{{asset($product->image)}}">
                                @if(isset($product->percent)&&($product->percent>0)&&($product->percent<=100))
                                    <div class="product__discount__percent">-<?php echo $product->percent; ?>%</div>
                                @endif
                                {{--                        <ul class="featured__item__pic__hover">--}}
                                {{--                            <li><a href="./shop_details_pro.html"><i class="fa fa-heart"></i></a></li>--}}
                                {{--                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>--}}
                                {{--                        </ul>--}}
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="{{url('products/'.$product->id)}}"><?php echo $product->name; ?></a></h6>
                                @if (isset($product->promotion_price)&&isset($product->percent)&&($product->percent>0)&&($product->percent<=100))
                                    <div class="product__item__price">$<?php echo $product->promotion_price; ?>
                                        <span>$<?php echo $product->unit_price; ?></span></div>
                                @else
                                    <div class="product__item__price">$<?php echo number_format($product->unit_price,2); ?></div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            @for ($i = 0;$i < ($size =  sizeof($latestProducts)); $i++)
                                @if($i < $size)
                                    <div class="latest-prdouct__slider__item">
                                        @if($i < $size)
                                            <a href="{{url('products/'.$latestProducts[$i]['id'])}}" class="latest-product__item">
                                                <div class="latest-product__item__pic"  style="max-width: 50%;">
                                                    <img src="{{asset($latestProducts[$i]['image'])}}" alt="" >
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6><?php echo $latestProducts[$i]['name'];?></h6>
                                                    <span>$<?php echo number_format($latestProducts[$i++]['unit_price'],2);?></span>
                                                </div>
                                            </a>
                                        @endif
                                        @if($i < $size)
                                            <a href="{{url('products/'.$latestProducts[$i]['id'])}}" class="latest-product__item">
                                                <div class="latest-product__item__pic"  style="max-width: 50%;">
                                                    <img src="{{asset($latestProducts[$i]['image'])}}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6><?php echo $latestProducts[$i]['name'];?></h6>
                                                    <span>$<?php echo number_format($latestProducts[$i++]['unit_price'], 2);?></span>
                                                </div>
                                            </a>
                                        @endif
                                    </div>
                                @endif
                                @if($i < $size)
                                    <div class="latest-prdouct__slider__item">
                                        @if($i < $size)
                                            <a href="{{url('products/'.$latestProducts[$i]['id'])}}" class="latest-product__item">
                                                <div class="latest-product__item__pic"  style="max-width: 50%;">
                                                    <img src="{{asset($latestProducts[$i]['image'])}}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6><?php echo $latestProducts[$i]['name'];?></h6>
                                                    <span>$<?php echo number_format($latestProducts[$i++]['unit_price'],2);?></span>
                                                </div>
                                            </a>
                                        @endif
                                        @if($i < $size)
                                            <a href="{{url('products/'.$latestProducts[$i]['id'])}}" class="latest-product__item">
                                                <div class="latest-product__item__pic"  style="max-width: 50%;">
                                                    <img src="{{asset($latestProducts[$i]['image'])}}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6><?php echo $latestProducts[$i]['name'];?></h6>
                                                    <span>$<?php echo number_format($latestProducts[$i]['unit_price'], 2);?></span>
                                                </div>
                                            </a>
                                        @endif

                                    </div>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            @for ($i = 0;$i < ($size =  sizeof($topRatedProducts)); $i++)
                                @if($i < $size)
                                    <div class="latest-prdouct__slider__item">
                                        @if($i < $size)
                                            <a href="{{url('products/'.$topRatedProducts[$i]['id'])}}" class="latest-product__item">
                                                <div class="latest-product__item__pic"  style="max-width: 50%;">
                                                    <img src="{{asset($topRatedProducts[$i]['image'])}}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6><?php echo $topRatedProducts[$i]['name'];?></h6>
                                                    <span>$<?php echo number_format($topRatedProducts[$i++]['unit_price'],2);?></span>
                                                </div>
                                            </a>
                                        @endif
                                        @if($i < $size)
                                            <a href="{{url('products/'.$topRatedProducts[$i]['id'])}}" class="latest-product__item">
                                                <div class="latest-product__item__pic"  style="max-width: 50%;">
                                                    <img src="{{asset($topRatedProducts[$i]['image'])}}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6><?php echo $topRatedProducts[$i]['name'];?></h6>
                                                    <span>$<?php echo number_format($topRatedProducts[$i++]['unit_price'],2);?></span>
                                                </div>
                                            </a>
                                        @endif
                                    </div>
                                @endif
                                @if($i < $size)
                                    <div class="latest-prdouct__slider__item">
                                        @if($i < $size)
                                            <a href="{{url('products/'.$topRatedProducts[$i]['id'])}}" class="latest-product__item">
                                                <div class="latest-product__item__pic"  style="max-width: 50%;">
                                                    <img src="{{asset($topRatedProducts[$i]['image'])}}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6><?php echo $topRatedProducts[$i]['name'];?></h6>
                                                    <span>$<?php echo number_format($topRatedProducts[$i++]['unit_price'], 2);?></span>
                                                </div>
                                            </a>
                                        @endif
                                        @if($i < $size)
                                            <a href="{{url('products/'.$topRatedProducts[$i]['id'])}}" class="latest-product__item">
                                                <div class="latest-product__item__pic"  style="max-width: 50%;">
                                                    <img src="{{asset($topRatedProducts[$i]['image'])}}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6><?php echo $topRatedProducts[$i]['name'];?></h6>
                                                    <span>$<?php echo number_format($topRatedProducts[$i]['unit_price'], 2);?></span>
                                                </div>
                                            </a>
                                        @endif

                                    </div>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{$blog->image}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{$blog->updated_at}}</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="{{route('blog.detail', $blog->id)}}">{{$blog->title}}</a></h5>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 200, '...') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Blog Section End -->



@endsection

