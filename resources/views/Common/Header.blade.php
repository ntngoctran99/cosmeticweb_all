<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> windwobbles@gmail.com</li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
<!--                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>-->
                        <!-- <div class="header__top__right__auth">
                            <a href="#"><i class="fa fa-user"></i> Login</a>
                        </div> -->
                        @if (!empty(Auth::user()))
                            <div class="header__top__right__auth" style="width:300px">
                                <a href="{{URL::to('/order')}}" style="float: left; margin-right: 30px;"><i class="fa fa-shopping-bag"></i> Cart manager</a>
                                <span style="float:left; color:#fff"> {{Auth::user()->fullname}}</span>
                                <a href="{{URL::to('/logout')}}"><i class="fa fa-user"></i> Logout</a>
                            </div>
                        @else
                            <div class="header__top__right__auth">
                                <a href="{{URL::to('/login')}}" ><i class="fa fa-user"></i> Login</a>
                            </div>
                            <span style="color: white"> | </span>
                            <div class="header__top__right__auth">
                                <a href="{{URL::to('/registration')}}" ></i> Register</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="{{URL::to('/')}}"><img src="{{asset('storage/img/logo1.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-8">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a id="menu_home" data-href="{{URL::to('/')}}" href="{{URL::to('/')}}">Home</a></li>
                        <li><a href="#">Categories</a>
                            <ul class="header__menu__dropdown">
                                @foreach($typeProducts as $typeProduct)
                                <li><a href="{{URL::to('/products/shop/'.$typeProduct->id)}}">{{$typeProduct->name}}</a></li>
<!--                                <li><a href="{{URL::to('/products/shop/2')}}">Toner</a></li>
                                <li><a href="{{URL::to('/products/shop/1')}}">Moisturizer</a></li>
                                <li><a href="{{URL::to('/products/shop/4')}}">Eyes</a></li>
                                <li><a href="{{URL::to('/products/shop/5')}}">Face</a></li>
                                <li><a href="{{URL::to('/products/shop/6')}}">Lipstick</a></li>-->
                                @endforeach
                            </ul>
                        </li>
{{--                        <li><a href="#">Your Make-Up</a>--}}
{{--                            <ul class="header__menu__dropdown">--}}
{{--                                <li><a href="{{URL::to('/products/shop/4')}}">Eyes</a></li>--}}
{{--                                <li><a href="{{URL::to('/products/shop/5')}}">Face</a></li>--}}
{{--                                <li><a href="{{URL::to('/products/shop/6')}}">Lipstick</a></li>--}}
{{--                            </ul>    --}}
{{--                        </li>--}}
                        <li><a href="{{URL::to('/products/brand/shop')}}">Products</a></li>
                        <li><a href="{{URL::to('/blog')}}">Blog</a></li>
                        <li><a href="{{URL::to('/contact')}}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-2">
                <div class="header__cart">
                    <ul>
{{--                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>--}}
                        <li><a href="{{Auth::user() ? url('cart/detail') : url('/login')}}"><i class="fa fa-shopping-bag"></i> <span class="count_quntity">0</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
