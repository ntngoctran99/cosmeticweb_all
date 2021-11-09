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
                        <h2>- <?php if (isset($products[0]['type_product_name'])) echo $products[0]['type_product_name'];?>
                            -</h2>
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
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Best Seller</h4>
                                <div class="latest-product__slider owl-carousel">
                                    @for($i = 0;$i < ($size =  count($products_best_seller)); $i++)
                                        <div class="latest-prdouct__slider__item">
                                            @if($i < $size)
                                                <a href="{{url('products/'.$products_best_seller[$i]['id'])}}"
                                                   class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="{{asset($products_best_seller[$i++]['image'])}}" alt="">
                                                    </div>
                                                </a>
                                            @endif
                                            @if($i < $size)
                                                <a href="{{url('products/'.$products_best_seller[$i]['id'])}}"
                                                   class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="{{asset($products_best_seller[$i++]['image'])}}" alt="">
                                                    </div>
                                                </a>
                                            @endif
                                            @if($i < $size)
                                                <a href="{{url('products/'.$products_best_seller[$i]['id'])}}"
                                                   class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="{{asset($products_best_seller[$i]['image'])}}" alt="">
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Latest Products</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @foreach($products_latest as $product_latest)
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                            <div class="product
                                            __discount__item__pic set-bg"
                                                 data-setbg="{{asset($product_latest['image'])}}">
                                                @if(isset($product_latest['percent'])&&($product_latest['percent']>0)&&($product_latest['percent']<=100))
                                                    <div class="product__discount__percent">
                                                        -<?php echo $product_latest['percent']; ?>%
                                                    </div>
                                                @endif
                                                {{--                                            <ul class="product__item__pic__hover">--}}
                                                {{--                                                <li><a href="./shop_details_pro.html"><i class="fa fa-heart"></i></a>--}}
                                                {{--                                                </li>--}}
                                                {{--                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>--}}
                                                {{--                                            </ul>--}}
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span><?php echo $product_latest['type_product_name']?></span>
                                                <h5>
                                                    <a href="{{url('products/'.$product_latest['id'])}}"><?php echo $product_latest['name']?></a>
                                                </h5>
                                                @if (isset($product_latest['promotion_price'])&&isset($product_latest['percent'])&&($product_latest['percent']>0)&&($product_latest['percent']<=100))
                                                    <div class="product__item__price">
                                                        $<?php echo $product_latest['promotion_price']; ?>
                                                        <span>$<?php echo $product_latest['unit_price']; ?></span></div>
                                                @else
                                                    <div class="product__item__price">
                                                        $<?php echo number_format($product_latest['unit_price'], 2); ?></div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Food for all skin</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><b> Products found </b></h6>
                                </div>
                            </div>
                            {{--                        <div class="col-lg-4 col-md-3">--}}
                            {{--                            <div class="filter__option">--}}
                            {{--                                <span class="icon_grid-2x2"></span>--}}
                            {{--                                <span class="icon_ul"></span>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                        </div>
                    </div>
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{asset($product['image'])}}">
                                        {{--                                <ul class="product__item__pic__hover">--}}
                                        {{--                                    <li><a href="./shop_details_pro.html"><i class="fa fa-heart"></i></a></li>--}}
                                        {{--                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>--}}
                                        {{--                                </ul>--}}
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="{{url('products/'.$product['id'])}}"><?php echo $product['name'];?></a>
                                        </h6>
                                        <h5>$<?php echo number_format($product['unit_price'], 2);?></h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo1.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +84 123 456 789</li>
                            <li>Email: abc.test@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
@endsection
