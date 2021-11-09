@extends('layouts.master')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('storage/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Order Detail</span>
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
                                <th class="shoping__product">Order ID</th>
                                <th>Products</th>
                                <th>Status</th>
{{--                                <th>Delete</th>--}}
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($orderDetail))
                                @foreach ($orderDetail as $key => $val)
                                    <tr>
                                        <td class="shoping__cart__item" style="width:150px">
                                            <h5>{{$val['id']}}</h5>
                                        </td>
                                        <td class="shoping__cart__price" style="width:500px;">
                                            @foreach($val['orderDetail'] as $k => $v)
                                                <div class="items_product" style="text-align:left; font-weight:normal; font-size:14px; border-bottom:1px solid #f5f5f5; padding:10px 0px">
                                                    <div class="items_product__name">Name Product : {{$v['product_id'] == $v['product']['id'] ? $v['product']['name'] : ''}}</div>
                                                    <div class="items_product__quantity">Quantity: {{$v['quantity']}}</div>
                                                    <div class="items_product__total">Total Price: {{$v['unit_price']}}</div>
                                                </div>
                                            @endforeach
                                        </td>
                                        <td class="shoping__cart__quantity">
{{--                                            {{$val['status'] == 0 ? 'Not Approve' : 'Approve'}}--}}
                                            @foreach (Config::get('define.order.status') as $status)
                                                @if ($status == $val['status'])
                                                    {{ Config::get('define.order.status_title')[$val['status']]; }}
                                                @endif
                                            @endforeach
                                        </td>
                                        @if($val['status']== 0)
                                                <td class="shoping__cart__item__close">
                                                    @if($val['del_flag']==0)
                                                        <span data-id="{{$val['id']}}" data-quantity="{{$v['quantity']}}" data-stock="{{$v['product']['stock']}}" data-order-detail="{{$val['orderDetail']}}" class="icon_close rm_order"></span>
                                                    @else
                                                        <p class="text-danger">Cancelled</p>
                                                    @endif
                                                </td>
                                        @elseif($val['status']== 3)
                                            <td class="shoping__cart__item__close">
                                                <p class="text-danger">Cancelled</p>
                                            </td>
                                        @endif
                                    </tr>

                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="shoping__cart__item text-center">
                                        No Orders
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
                </div>
            </div>
            <div class="col-lg-6">
                <h1>  </h1>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection
