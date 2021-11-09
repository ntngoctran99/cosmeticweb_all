@extends('layouts.master')
@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($cart_detail))
                                @foreach ($cart_detail as $key => $val)
                                    <tr id="detail_cart">
                                        <td class="shoping__cart__item">
                                            <img src="{{asset('storage/img/cart/cart-1.jpg')}}" alt="">
                                            <h5>{{$val['detail']['name']}}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            ${{$val['detail']['unit_price']}}
                                        </td>
<!--                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <input type="hidden" id="product_id" data-id="{{$val['detail']['id']}}" value="{{$val['detail']['id']}}" />
                                                <div id="quantity_checkout" class="pro-qty">
                                                    <input id="upQuantity{{$val['detail']['id']}}" type="text" class="only-number-input" value="{{$val['quantity']}}" min="1">
                                                </div>
                                            </div>
                                        </td>-->
                                        <td class="cart-product-quantity" width="130px">
                                            <div class="input-group quantity">
                                                <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                                    <span class="input-group-text">-</span>
                                                </div>
                                                <input type="hidden" id="product_id" data-id="{{$val['detail']['id']}}" value="{{$val['detail']['id']}}" />
                                                <input type="text" class="qty-input form-control" id="qty-input" maxlength="2" min="1" max="{{$val['detail']['stock']}}" value="{{$val['quantity']}}">
                                                <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer">
                                                    <span class="input-group-text">+</span>
                                                </div>
                                            </div>
                                            <span style="font-size: small; color: red">{{$val['detail']['stock']}} products left </span>
                                        </td>
                                        <td class="shoping__cart__total">
                                            <span id="cart_total">${{$val['quantity'] * $val['detail']['unit_price']}}</span>
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <span data-id="{{$val['detail']['id']}}" class="icon_close rm_cart"></span>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="shoping__cart__item text-center">
                                        No Products
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{URL::to('/')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a href="{{URL::to('/cart/detail')}}" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Update Cart</a>
                </div>
            </div>
            <div class="col-lg-6">
                <h1>  </h1>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <div id="totalajaxcall">
                        <ul class="totalloading">
                            <li>Subtotal <span>${{$total_price}}</span></li>
                            <li>Total <span>${{$total_price}}</span></li>
                        </ul>
                    </div>
                    <a href="{{url('cart/checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection
{{--@push('scripts')
    <script>
        $('#qty-input').change(function (){
            //console.log(e)
            alert('abc');
        });
    </script>
@endpush--}}
