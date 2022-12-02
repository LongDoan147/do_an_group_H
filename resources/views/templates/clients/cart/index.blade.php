@extends('templates.clients.frontend')
@section('content')
@if(\Session::has('error'))
<div class="alert alert-danger">{{ \Session::get('error') }}</div>
{{ \Session::forget('error') }}
@endif
@if(\Session::has('success'))
<div class="alert alert-success">{{ \Session::get('success') }}</div>
{{ \Session::forget('success') }}
@endif


<!-- <div class="breadcrumbs_wrap gray">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="text-center">
                    <h2 class="breadcrumbs_title">Thanh toán</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Payment Page</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</div> -->
<!-- =========================== Breadcrumbs =================================== -->

<!-- =========================== Billing Section =================================== -->
<section>
    <div class="container">
        <form action="" method="POST" class="submitOrder">
            @csrf
            <div class="row">

                <div class="col-lg-7 col-md-12">
                    <!-- Heading -->
                    <h4 class="mb-5">Thông tin giao hàng</h4>

                    <!-- Billing details -->
                    <div class="row mb-3 mb-30">

                        <div class="col-12">
                            <!-- Email -->
                            <div class="form-group">
                                <input class="form-control form-control-sm" require name="name"
                                    value="{{ (get_user('customer','ten')) ?? '' }}" type="text" placeholder="Họ tên"
                                    required="">
                            </div>
                        </div>

                        <div class="col-12">
                            <!-- Email -->
                            <div class="form-group">
                                <input class="form-control form-control-sm" require type="number"
                                    value="{{ (get_user('customer','sodienthoai')) ?? '' }}" name="phone"
                                    placeholder="Số điện thoại" required="">
                            </div>
                        </div>

                        <div class="col-12">
                            <!-- Company Name -->
                            <div class="form-group">
                                <input class="form-control form-control-sm" require type="email"
                                    value="{{ (get_user('customer','email')) ?? '' }}" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-12">
                            <!-- Country -->
                            <div class="form-group">
                                <textarea class="form-control form-control-sm mb-9 mb-md-0 font-size-xs" name="note"
                                    id="checkoutBillingCountry" rows="5" placeholder="Ghi chú"></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <!-- Company Name -->
                            <div class="form-group">
                                <input class="form-control form-control-sm" require type="text"
                                    value="{{ (get_user('customer','diachi')) ?? '' }}" require name="address"
                                    placeholder="Địa chỉ chi tiết">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="search_location">
                                <div class="location_group province">
                                    <input type="text" value="" hidden name="province" />
                                    <input type="text" value="" placeholder="Thành Phố / Tỉnh" class="input_search" />
                                    <ul class="search_list">

                                    </ul>
                                </div>

                                <div class="location_group district">
                                    <input type="text" value="" hidden name="district" />
                                    <input type="text" value="" placeholder="Quận / Huyện" class="input_search" />
                                    <ul class="search_list">

                                    </ul>
                                </div>

                                <div class="location_group ward">
                                    <input type="text" value="" hidden name="ward" />
                                    <input type="text" value="" placeholder="Phường / Xã" class="input_search" />
                                    <ul class="search_list">

                                    </ul>
                                </div>

                            </div>

                        </div>


                    </div>

                    <!-- Heading -->
                    <h4 class="mb-3 ">Phương thức thanh toán</h4>

                    <!-- List group -->
                    <div class="list-group list-group-sm mb-5">
                        <div class="list-group-item">
                            <!-- Radio -->
                            <div class="custom-control custom-radio">
                                <!-- Input -->
                                <input class="custom-control-input" id="cod" name="payment" checked value="0"
                                    type="radio">
                                <!-- Label -->
                                <label class="custom-control-label font-size-sm text-body text-nowrap" for="cod"><img
                                        src="{{ asset('frontend/assets/img/cod.jpg') }}" alt="..."> Tiền mặt
                            </div>
                        </div>

                        <div class="list-group-item">
                            <!-- Radio -->
                            <div class="custom-control custom-radio">
                                <!-- Input -->
                                <input class="custom-control-input" id="checkoutPaymentPaypal" name="payment" value="1"
                                    type="radio">
                                <!-- Label -->
                                <label class="custom-control-label font-size-sm text-body text-nowrap"
                                    for="checkoutPaymentPaypal"><img src="{{ asset('frontend/assets/img/paypal.png') }}"
                                        alt="..."> Paypal</label>
                            </div>
                        </div>

                        <div class="list-group-item">
                            <!-- Radio -->
                            <div class="custom-control custom-radio">
                                <!-- Input -->
                                <input class="custom-control-input" id="momo" name="payment" value="2" type="radio">
                                <!-- Label -->
                                <label class="custom-control-label font-size-sm text-body text-nowrap" for="momo"><img
                                        src="{{ asset('frontend/assets/img/momo.png') }}" alt="..."> Momo</label>
                            </div>
                        </div>

                        <div class="list-group-item">
                            <!-- Radio -->
                            <div class="custom-control custom-radio">
                                <!-- Input -->
                                <input class="custom-control-input" id="vnpay" name="payment" value="3" type="radio">
                                <!-- Label -->
                                <label class="custom-control-label font-size-sm text-body text-nowrap" for="vnpay"><img
                                        src="{{ asset('frontend/assets/img/vnpay.png') }}" alt="..."> Vnpay</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-5">

                    <h4 class="cart_heading">Các món đã chọn</h4>
                    <a href="{{ route('product')}}" class="btn-add">THÊM MÓN</a href="{{ route('product')}}">
                    <div class="right-ch-sideBar item-cart" id="cart">
                        @if(Session::has('cart') != null && Session::get('cart')->products)

                        <div class="cart_select_items">
                            @foreach(Session::get('cart')->products as $key => $value)
                            <div class="cart_selected_single">
                                <div class="cart_selected_single_thumb">
                                    <a href="#"><img
                                            src="{{ asset('uploads/product').'/'.$value['productInfo']->hinhanh }}"
                                            class="img-fluid" alt="" /></a>
                                </div>
                                <div class="cart_selected_single_caption">
                                    <a href="javascript:" id="upCart" data-key="{{$key}}">
                                        <h4 class="product_title">{{$value['productInfo']->tensp}}</h4>
                                    </a>
                                    <span class="numberof_item">Số lượng : {{$value['quanty']}}</span>
                                    <span class="sizeof_item">Size : {{$value['size']->size_name}} -
                                        {{ currency_format($value['productInfo']->giaban +$value['size']->price )}}</span>
                                    <a href="#" class="text-danger btn-cart-del" id="delItemCart"
                                        data-id="{{$key}}">Xoá</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="cart_subtotal priceTotal">
                            <h6>Tổng đơn hàng<span
                                    class="theme-cl carsub">{{currency_format(Session::get('cart')->totalPrice, 'đ')}}</span>
                            </h6>
                            <?php
                            $feeship = 0;
                            if (Session::has('feeship') != null) {
                                $feeship = (Session::get('feeship')->feeship !== null) ? Session::get('feeship')->feeship : 0;
                            }
                            ?>

                            @if(Session::has('coupon') != null)
                            <h6>Mã Giảm Giá<span class="theme-cl"> -
                                    @if(Session::get('coupon')->loaigiam === 1)
                                    {{currency_format(Session::get('coupon')->giamgia, '%')}}

                                    @endif
                                    @if(Session::get('coupon')->loaigiam === 2)
                                    {{currency_format(Session::get('coupon')->giamgia, 'đ')}}
                                    @endif
                                </span></h6>
                            @endif
                            @if(Session::has('coupon') != null)
                            <h6>Tổng tiền<span class="theme-cl">
                                    @if(Session::has('cart') != null && Session::get('cart')->products)

                                    <!-- nếu giảm % -->
                                    @if(Session::get('coupon')->loaigiam === 1)
                                    {{currency_format((Session::get('cart')->totalPrice - Session::get('cart')->totalPrice*Session::get('coupon')->giamgia/100) - $feeship, 'đ')}}
                                    @endif
                                    <!-- nếu giảm tiền -->
                                    @if(Session::get('coupon')->loaigiam === 2)
                                    {{currency_format((Session::get('cart')->totalPrice - Session::get('coupon')->giamgia)  - $feeship, 'đ')}}
                                    @endif
                                    @endif
                                </span></h6>
                            @else
                            @if(Session::has('feeship'))
                            <h6>Phí vận chuyển<span class="theme-cl"> +
                                    {{ ($feeship !== 0) ? currency_format($feeship) : 'Không hỗ trợ vận chuyển.'}}
                                </span></h6>
                            @endif
                            <h6>Tổng tiền<span class="theme-cl">
                                    @if(Session::has('cart') != null && Session::get('cart')->products)
                                    {{currency_format((Session::get('cart')->totalPrice + $feeship), 'đ')}}
                                    @endif
                                </span></h6>
                            @endif

                            <input id="totalPrice" hidden type="number"
                                data-price="{{currency_format(Session::get('cart')->totalPrice, 'đ')}}" value="">
                            <input id="totalQuanty" hidden type="number" value="{{ Session::get('cart')->totalQuanty}}">
                        </div>
                        @endif


                    </div>
                    <div class="cart_coupon ">
                        <div class="coupon_header {{ Session::has('coupon') ? 'show' : ''}}">
                            <span class="heading">Mã Giảm Giá</span>
                            <span class="coupon_sale">
                                @if(Session::has('coupon') != null)
                                {{Session::get('coupon')->ten}}
                                @endif
                            </span>
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="cart_action">
                        <ul>
                            <li><button type="submit" class="btn btn-checkout">Thanh toán</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>

    </div>
</section>


