@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>- Product's details -</h2>
                        <div class="breadcrumb__option">
                            <a href="./">Home</a>
                            <a href="./products/brand/shop">Products</a>
                            <span>Details of it</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{$product['images'][0]['image']}}" alt="">
                        </div>

                        <div class="product__details__pic__slider owl-carousel">
                            @foreach($images as $image)
                                @if($image['type_image'] === 1)
                                    @continue;
                                @endif
                                <img data-imgbigurl="{{$image['image']}}"
                                    src="{{$image['image']}}" alt="">
                            @endforeach
                                <img data-imgbigurl="{{$avartar}}"
                                     src="{{$avartar}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$product['name']}}</h3>
{{--                        <div class="product__details__rating">--}}
{{--                            <i class="fa fa-star"></i>--}}
{{--                            <i class="fa fa-star"></i>--}}
{{--                            <i class="fa fa-star"></i>--}}
{{--                            <i class="fa fa-star"></i>--}}
{{--                            <i class="fa fa-star-half-o"></i>--}}
{{--                            <span>({{isset($product['views']) ? $product['views'] : 0}} reviews)</span>--}}
{{--                        </div>--}}
                        <div class="product__details__price">${{number_format($product['unit_price'], 2)}}</div>
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($product['description']), 100, '...') }}</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div id="quantity_detail" class="pro-qty">
                                    <input id="quantity_input_detail" class="quantity_input_detail" type="text" value="1">
                                </div>
                            </div>
                        </div>
                        @if (!empty(Auth::user()))
                            <a href="javascript:void(0)" id="add_cart" class="primary-btn" data-id="{{isset($product['id']) ? $product['id'] : ''}}">ADD TO CARD</a>
{{--                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>--}}
                        @else
                            <a href="{{URL::to('/login')}}" id="add_cart_return" class="primary-btn">ADD TO CARD</a>
                        @endif
                        <ul>
                            <li><b>Availability</b>
                                @if (!isset($product['stock']) || $product['stock']==0 || $product['stock']<0)
                                    <span>Out of Stock</span>
                                @else
                                    <span>{{$product['stock']}}</span>
                                @endif
                            </li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp> Free pickup today</samp></span></li>
<!--                            <li><b>Weight</b> <span>0.5 kg</span></li>-->
<!--                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>-->
                        </ul>
                    </div>
                </div>

                <!-- Comment -->
{{--                <div class="col-lg-12">--}}
{{--                    <div id="reviews" class="woocommerce-Reviews">--}}
{{--                        <div id="comments">--}}
{{--                            <h2 class="woocommerce-Reviews-title">Comments</h2>--}}
{{--                            <ul class="comments_list">--}}
{{--                            @if (count($comment) > 0)--}}
{{--                                @foreach ($comment as $key => $val)--}}
{{--                                    <li id="comment-5" class="comment even thread-even depth-1 comment_item">--}}
{{--                                        <div class="comment_author_avatar">--}}
{{--                                            <img alt="" src="http://2.gravatar.com/avatar/ee0eb16a7121e24ef8ffb79c5a067174?s=125&amp;d=mm&amp;r=g" class="avatar avatar-125 photo" height="125" width="125">--}}
{{--                                        </div>--}}
{{--                                        <div class="comment_content">--}}
{{--                                            <div class="comment_info">--}}
{{--                                                @if ($val['user_id'] == $val['user']['id'])--}}
{{--                                                    <h6 class="comment_author">{{$val['user']['fullname']}}</h6>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                            <div class="comment_text_wrap">--}}
{{--                                                <div class="comment_text">--}}
{{--                                                    <p>{{$val['content']}}</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            @else--}}
{{--                                <p class="woocommerce-noreviews">--}}
{{--                                    The product has 0 comment--}}
{{--                                </p>--}}
{{--                            @endif--}}
{{--                            </ul>--}}
{{--                        </div>--}}

{{--                        <div id="review_form_wrapper">--}}
{{--                            <div id="review_form">--}}
{{--                                <div id="respond" class="comment-respond">--}}
{{--                                    <form id="commentform" class="comment-form">--}}
{{--                                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />--}}
{{--                                        <input type="hidden" name="comment_post_ID" value="{{isset($product['id']) ? $product['id'] : ''}}" class="form-control" id="comment_post_ID">--}}
{{--                                        <input type="hidden" name="user_ID" value="{{Auth::user() ? Auth::user()->id : ''}}" class="form-control" id="user_ID">--}}
{{--                                        <!-- <div class="comment-form-rating">--}}
{{--                                            <label for="rating">Your rating&nbsp;<span class="required">*</span></label>--}}
{{--                                            <p class="stars selected">--}}
{{--                                                <span>--}}
{{--                                                    <a class="star-1" href="#">1</a>--}}
{{--                                                    <a class="star-2" href="#">2</a>--}}
{{--                                                    <a class="star-3" href="#">3</a>--}}
{{--                                                    <a class="star-4 active" href="#">4</a>--}}
{{--                                                    <a class="star-5" href="#">5</a>--}}
{{--                                                </span>--}}
{{--                                            </p>--}}
{{--                                        </div> -->--}}
{{--<!--                                        <div id="rating_div">--}}
{{--                                            <label for="rating">Your rating&nbsp;<span class="required">*</span></label>--}}
{{--                                            <div class="star-rating">--}}
{{--                                                <span class="fa divya fa-star" data-rating="1" style="font-size:20px;"></span>--}}
{{--                                                <span class="fa fa-star-o" data-rating="2" style="font-size:20px;"></span>--}}
{{--                                                <span class="fa fa-star-o" data-rating="3" style="font-size:20px;"></span>--}}
{{--                                                <span class="fa fa-star-o" data-rating="4" style="font-size:20px;"></span>--}}
{{--                                                <span class="fa fa-star-o" data-rating="5" style="font-size:20px;"></span>--}}
{{--                                                <input type="hidden" name="ratings" id="ratings" class="rating-value" value="1">--}}
{{--                                            </div>--}}
{{--                                        </div>-->--}}
{{--                                        <div class="comment-form-comment form-group">--}}
{{--                                            <label for="comment">Your review&nbsp;<span class="required">*</span></label>--}}
{{--                                            <textarea cols="45" rows="4" name="comment" id="comment" class="form-control" required></textarea>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <button class="btn btn-primary" id="submit">Send</button>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div><!-- #respond -->--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="clear"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- End comment -->

                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>

<!--                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li>-->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    {!!html_entity_decode($product['description'])!!}
                                </div>
                            </div>

<!--                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                        Proin eget tortor risus.</p>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Continue Shopping</h2>
                    </div>
                </div>
            </div>
            <div class="back">
                <a href="./">BACK</a>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

@endsection
