@extends('templates.clients.frontend')
@section('content')
<div class="slideshow bg-pink">
    <div class="owl-carousel category-slider owl-slide">
        <div class="item">
            <img class=" w-100" src="{{ asset('uploads/slide/585540.jpg') }}" alt="slide error">
        </div>
    </div>
</div>

<!-- ======================== Banner End ==================== -->

<!-- ======================== Choose Category Start ==================== -->
<section class="pt-0 pb-0 bg-pink">
    <div class="w-80">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="owl-carousel category-slider owl-theme">

                        <!-- Single Item -->
                        @if($danhmuc)
                        @foreach($danhmuc as $value)
                        <div class="item cate">
                            <div class="woo_category_box border_style rounded slide-cate">
                                <div class="woo_cat_thumb">
                                    <a href="{{ route('product')}}"><img
                                            src="{{ asset('uploads/categories/'.$value->hinhanh)}}" class="img-fluid"
                                            alt="" /></a>
                                </div>
                                <div class="woo_cat_caption">
                                    <h4><a href="search-sidebar.html">{{$value->tenloai}}</a></h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="clearfix"></div>

<section class="pt-0">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="sec-heading-flex ">
                    <div class="sec-heading-flex-one">
                        <h2 class="" data-text="Sản Phẩm Đang khuyến mãi">Sản Phẩm Đang khuyến mãi</h2>
                        <span class="line"></span>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="owl-carousel products-hot owl-theme">
                    <!-- Single Item -->
                    <div class="item">
                        <div class="woo_product_grid">
                            <span class="woo_offer_sell">
                                30%
                            </span>
                            <div class="woo_product_thumb">
                                <img src="{{ asset('uploads/product/1656658568.jpg')}}" class="img-fluid" alt="" />
                            </div>
                            <div class="woo_product_caption center">
                                <div class="woo_title">
                                    <h4 class="woo_pro_title"><a href="">Tên</a></h4>
                                </div>

                                <div class="woo_price ">
                                    <h6>35000đ<span class="less_price">40000đ</span>
                                    </h6>
                                    <a href="javascript:" class="btn-plus quickView" data-id=""><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="woo_product_grid">
                            <span class="woo_offer_sell">
                                30%
                            </span>
                            <div class="woo_product_thumb">
                                <img src="{{ asset('uploads/product/1656658568.jpg')}}" class="img-fluid" alt="" />
                            </div>
                            <div class="woo_product_caption center">
                                <div class="woo_title">
                                    <h4 class="woo_pro_title"><a href="">Tên</a></h4>
                                </div>

                                <div class="woo_price ">
                                    <h6>35000đ<span class="less_price">40000đ</span>
                                    </h6>
                                    <a href="javascript:" class="btn-plus quickView" data-id=""><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="item">
                        <div class="woo_product_grid">
                            <span class="woo_offer_sell">
                                30%
                            </span>
                            <div class="woo_product_thumb">
                                <img src="{{ asset('uploads/product/1656658568.jpg')}}" class="img-fluid" alt="" />
                            </div>
                            <div class="woo_product_caption center">
                                <div class="woo_title">
                                    <h4 class="woo_pro_title"><a href="">Tên</a></h4>
                                </div>

                                <div class="woo_price ">
                                    <h6>35000đ<span class="less_price">40000đ</span>
                                    </h6>
                                    <a href="javascript:" class="btn-plus quickView" data-id=""><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="item">
                        <div class="woo_product_grid">
                            <span class="woo_offer_sell">
                                30%
                            </span>
                            <div class="woo_product_thumb">
                                <img src="{{ asset('uploads/product/1656658568.jpg')}}" class="img-fluid" alt="" />
                            </div>
                            <div class="woo_product_caption center">
                                <div class="woo_title">
                                    <h4 class="woo_pro_title"><a href="">Tên</a></h4>
                                </div>

                                <div class="woo_price ">
                                    <h6>35000đ<span class="less_price">40000đ</span>
                                    </h6>
                                    <a href="javascript:" class="btn-plus quickView" data-id=""><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="item">
                        <div class="woo_product_grid">
                            <span class="woo_offer_sell">
                                30%
                            </span>
                            <div class="woo_product_thumb">
                                <img src="{{ asset('uploads/product/1656658568.jpg')}}" class="img-fluid" alt="" />
                            </div>
                            <div class="woo_product_caption center">
                                <div class="woo_title">
                                    <h4 class="woo_pro_title"><a href="">Tên</a></h4>
                                </div>

                                <div class="woo_price ">
                                    <h6>35000đ<span class="less_price">40000đ</span>
                                    </h6>
                                    <a href="javascript:" class="btn-plus quickView" data-id=""><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="item">
                        <div class="woo_product_grid">
                            <span class="woo_offer_sell">
                                30%
                            </span>
                            <div class="woo_product_thumb">
                                <img src="{{ asset('uploads/product/1656658568.jpg')}}" class="img-fluid" alt="" />
                            </div>
                            <div class="woo_product_caption center">
                                <div class="woo_title">
                                    <h4 class="woo_pro_title"><a href="">Tên</a></h4>
                                </div>

                                <div class="woo_price ">
                                    <h6>35000đ<span class="less_price">40000đ</span>
                                    </h6>
                                    <a href="javascript:" class="btn-plus quickView" data-id=""><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>


<section class="pt-0 ">
    <div class="container">

        <div class="row align-items-center offer_flix ">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="ordering">
                    <img src="{{ asset('uploads/slide/6863503.jpg') }}" class="img-fluid" alt="" />
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="sec-heading-flex ">
                    <div class="sec-heading-flex-one">
                        <h2>Sản Phẩm Mới</h2>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="owl-carousel products-slider owl-theme owl-loaded owl-drag">
                @if($productnew)
                    @foreach($productnew as $value)
                    <!-- Single Item -->
                    <div class="item">
                        <div class="woo_product_grid">
                            <span class="woo_pr_tag hot">Mới</span>

                            <span class="woo_offer_sell">
                                20%
                            </span>

                            <div class="woo_product_thumb">
                                <img src="{{ asset('uploads/product/'.$value->hinhanh)}}" class="img-fluid" alt="" />
                            </div>
                            <div class="woo_product_caption center">
                                <div class="woo_title">
                                    <h4 class="woo_pro_title"><a href="">{{$value->tensp}}</a></h4>
                                </div>
                                <div class="woo_price ">
                                    <h6>
                                        <span class="less_price">
                                        {{$value->giaban}}
                                        </span>
                                    </h6>
                                    {{$value->giaban}}
                                    <a href="javascript:" class="btn-plus quickView" data-id=""><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>


<div class="all-product">
    <section class="pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="sec-heading-flex ">
                        <div class="sec-heading-flex-one center">
                            <h2>Các Sản phẩm</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="tabs">
                        @if($danhmuc)
                        @foreach($danhmuc as $key => $value)
                        <div class="tab-item {{$key == 0 ? 'active' : ''}}">
                            <div class="item">
                                <div class="woo_category_box border_style rounded">
                                    <div class="woo_cat_thumb">
                                        <a href="javascript:">
                                            <img src="{{ asset('uploads/categories/'.$value->hinhanh)}}" class="img-fluid" alt="" /></a>
                                    </div>
                                    <div class="woo_cat_caption">
                                        <h4><a href="javascript:" class="bold">{{$value->tenloai}}</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="content">
                        @if($danhmuc)
                        @foreach($danhmuc as $key => $value)
                        <div class="tab-pane {{$key == 0 ? 'active' : ''}}">
                            <div class="list-product">
                                @if($product)
                                @foreach($product as $val)
                                @if ($val->id_loaisanpham == $value->id)
                                <div class="item">
                                    <div class="woo_product_grid">
                                        <span class="woo_offer_sell">
                                            0%
                                        </span>
                                        <div class="woo_product_thumb">
                                            <img src="{{ asset('uploads/product/'.$val->hinhanh)}}" class="img-fluid" alt="" />
                                        </div>
                                        <div class="woo_product_caption center">
                                            <div class="woo_title">
                                                <h4 class="woo_pro_title"><a href="{{route('detail', $val->slug)}}">{{$val->tensp}}</a></h4>
                                            </div>
                                            <div class="woo_price ">
                                                <h6>

                                                    <span class="less_price">

                                                        {{$val->giaban }}
                                                    </span>

                                                    {{$val->giaban}}

                                                </h6>
                                                <a href="javascript:" class="btn-plus quickView" data-id=""><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @endif
                            </div>
                        </div>

                        @endforeach
                        @endif

                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="sec-heading-flex-last">
                    <a href="{{ route('product')}}" class="btn btn-theme">Xem tất cả <i class="fas fa-arrow-right mgl-5"> </i></a>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="clearfix"></div>
<section class="pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="sec-heading-flex ">
                    <div class="sec-heading-flex-one">
                        <h2>Tin tức </h2>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            @if($product)
            @foreach($baiviet as $value)
            <div class="col-12 col-sm-6 col-lg-3 mb-3">
                <!-- Single Item -->
                <div class="item">
                    <div class="offer_item">
                        <div class="offer_item_thumb">
                            <div class="offer-overlay"></div>
                            <img src="{{ asset('uploads/post/'.$value->hinhanh) }}" alt="">
                            <div class="offer_bottom_caption">
                                <div class="offer_title">{{ $value->tieude}}</div>
                            </div>
                        </div>

                        <div class="offer_caption">
                            <a href="" class="btn offer_box_btn">Đọc tiếp </a>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
            @endif
        </div>
        <div class="row d-flex justify-content-center">
            <div class="sec-heading-flex-last">
                <a href="{{ route('get.posts')}}" class="btn btn-theme">Xem tất cả <i class="fas fa-arrow-right mgl-5"></i></a>
            </div>
        </div>
    </div>
</section>


@stop
