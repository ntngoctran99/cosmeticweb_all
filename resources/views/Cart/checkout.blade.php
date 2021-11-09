@extends('layouts.master')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="./">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form id="formBill">
                <input type="hidden" id="userIDBill" name="userID" value="{{Auth::user()?Auth::user()->id:''}}">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <small class="form-text text-muted error errorFull" style="display:none">Please fill out the form.</small>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Full name<span>*</span></p>
                                    <input type="text" id="usernameBill" name="username" placeholder="Full name" value="{{Auth::user()?Auth::user()->fullname:''}}">
                                    <!-- <small class="form-text text-muted errorUsername error" style="display:none">Vui lòng nhập username.</small> -->
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" name="address" id="addressBill" placeholder="Street Address" class="checkout__input__add" value="{{Auth::user()?Auth::user()->address:''}}">
{{--                             <small class="form-text text-muted errorAddress error" style="display:none">Vui lòng nhập Address.</small>--}}
                            <!-- <input type="text" placeholder="Apartment, suite, unite ect (optinal)"> -->
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" id="phoneBill" placeholder="Phone" name="phone" value="{{Auth::user()?Auth::user()->phone_number:''}}">
                                    <!-- <small class="form-text text-muted errorPhone error" style="display:none">Vui lòng nhập Phone.</small> -->
                                </div>
                            </div>
                        </div>

                        <div class="checkout__input">
                            <p>Order notes<span></span></p>
                            <input type="text" name="note" id="noteBill" placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <input type="hidden" id="cart_detail" value="{{ json_encode($cart_detail)}}"></input>
                            <input type="hidden" name="total_product" id="totalProduct" value={{isset($cart_detail) ? count($cart_detail) : 0}}>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                @if (isset($cart_detail))
                                    @foreach ($cart_detail as $key => $val)
                                        <li>{{$val['detail']['name']}} <span>${{$val['quantity'] * $val['detail']['unit_price']}}</span></li>
                                    @endforeach
                                @else
                                    <li>Không có sản phẩm nào</li>
                                @endif
                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span>${{$total_price}}</span></div>
                            <div class="checkout__order__total">Total <span>${{$total_price}}</span></div>
                            <!-- <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Create an account?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            </div> -->
                            <!-- <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Check Payment
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div> -->
                            @if (!empty(Auth::user()))
                                <button id="btn-order" type="submit" class="site-btn">PLACE ORDER</button>
                            @else
                                <div class="site-btn" style="width:100%; text-align:center">
                                    <a href="{{URL::to('/login')}}"> PLACE ORDER</a>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

<!-- Login -->
<div id="modalLogin" class="modal bd-example-modal-xl fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login</h4>
                <button id="clsLogin" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="formLogin">
                    <h6 class="text-login" style="display:none; color:red">Please login</h6>
                    <form>
                        <small class="form-text text-muted errorBoth error" style="display:none">Username or Password is incorrect.</small>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter username">
                            <small class="form-text text-muted errorUsername error" style="display:none">Username is incorrect.</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter Password">
                            <small id="emailHelp" class="form-text errorPass text-muted error" style="display:none">Password is incorrect.</small>
                        </div>
                        <button id="btnLogin" type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
