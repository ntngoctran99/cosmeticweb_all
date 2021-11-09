<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{url('/')}}/">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Wind Wobbles - @yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/comment.css')}}">
    <link rel='stylesheet' href='https://raw.githubusercontent.com/kartik-v/bootstrap-star-rating/master/css/star-rating.min.css'>
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="img/logo1.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="/">Home</a></li>
            <li><a href="#">Your Skin</a>
                <ul class="header__menu__dropdown">
                    <li><a href="./products/shop/3">Cleanser</a></li>
                    <li><a href="./products/shop/2">Toner</a></li>
                    <li><a href="./products/shop/1">Moisturizer</a></li>
                </ul>
            </li>
            <li><a href="#">Your Make-Up</a>
                <ul class="header__menu__dropdown">
                    <li><a href="./products/shop/4">Eyes</a></li>
                    <li><a href="./products/shop/5">Face</a></li>
                    <li><a href="./products/shop/6">Lipstick</a></li>
                </ul>
            </li>
            <li><a href="./products/brand/shop">Brand</a></li>
            <li><a href="./blog">Blog</a></li>
            <li><a href="./contact">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> abc.test@gmail.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
@include('Common.Header')

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{route('product.search')}}">
                            <input type="text" placeholder="What do you need?" name="search" value="<?php echo (isset($search)) ? $search : '';?>"/>
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+84 123 456 789</h5>
                            <span>Support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if (session()->has('flashMes'))
                            <div class="alert alert-{{ session()->get('flashLevel') }} alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fas fa-times"> </i>
                                {{ session()->get('flashMes') }}
                            </div>
                        @endif
                    </div>
                </div>
                @yield('banner')
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

@yield('content')

@include('Common.Footer')
<!-- Js Plugins -->
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/jquery.slicknav.js')}}"></script>
<script src="{{asset('js/mixitup.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('/js/cart.js')}}"></script>


<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function (){

        $(document).on('submit', 'form#subscribe', function(e){
            $('#result').empty();
            e.preventDefault();
            var email = $('input#subscribe_email').val();
            $.ajax({
                url: "{{route('subscribe')}}",
                type: 'post',
                data: {'email': email},
                success: function (success){
                    $('input#subscribe_email').val('');
                    $('#result').append('<p style="color:green">Successfully</p>');
                },
                error: function (error) {
                    $('#result').append('<p style="color:red">Fail</p>');
                }
            });

        })
    });
</script>
</body>

</html>
