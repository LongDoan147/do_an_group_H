@extends('templates.clients.frontend')
@section('content')

<section>
    <div class="container">
        @if($product)
        <div class="row">

            <div class="col-lg-5 col-md-12 col-sm-12">

                <div class="img-detail"><img src="{{ asset('uploads/product/'.$product->hinhanh)}}" alt=""></div>
            </div>

            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="woo_pr_detail">

                    <div class="woo_cats_wrps">
                        <a href="#" class="woo_pr_cats">{{$product->danhmuc->tenloai}}</a>
                    </div>
                    <h2 class="woo_pr_title">{{$product->tensp}}</h2>


                    <div class="woo_pr_price">
                        <div class="woo_pr_offer_price">
                            <h3>{{currency_format($product->giaban)}}</h3>
                        </div>
                    </div>

                    <div class="woo_pr_short_desc">
                        <p>{{$product->mota}}</p>
                    </div>

                    <div class="woo_pr_color flex_inline_center mb-3">
                        <div class="woo_pr_varient">
                            <h6>Size:</h6>
                        </div>
                        <div class="woo_colors_list pl-3">
                            @if(count($product->size) > 1)
                            @foreach($product->size as $key => $value)
                            <div class="custom-varient custom-size">
                                <input type="radio" class="custom-control-input" name="sizeRadio"
                                    id="sizeRadioOne{{$value->id}}" value="{{$value->id}}" data-toggle="form-caption"
                                    data-target="#sizeCaption" {{($key == 0 ? "checked" : "")}}>
                                <label class="custom-control-label"
                                    for="sizeRadioOne{{$value->id}}">{{ $value->size_name}}<span class="price-plus"> +
                                        {{currency_format($value->price) ?? '0??'}}</span></label>
                            </div>
                            @endforeach
                            @else
                            @foreach($product->size as $key => $value)
                            <div class="custom-varient custom-size">
                                <input type="radio" class="custom-control-input" name="sizeRadio"
                                    id="sizeRadioOne{{$value->id}}" value="{{$value->id}}" data-toggle="form-caption"
                                    data-target="#sizeCaption" {{($key == 0 ? "checked" : "")}}>
                                <label class="custom-control-label"
                                    for="sizeRadioOne{{$value->id}}">{{ $value->size_name}}</label>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="woo_btn_action">
                        <div class="col-12 col-lg-auto">
                            <input type="number" name="addSl" class="form-control mb-2 full-width" value=1 />
                        </div>
                    </div>

                    <div class="woo_btn_action">
                        <div class="col-12 col-lg-auto">
                            <button type="submit" id="addCart" data-id="{{$product->id}}"
                                class="btn btn-block btn-dark mb-2">Th??m V??o Gi??? <i class="fa fa-plus-circle ml-2"
                                    aria-hidden="true"></i></button>
                        </div>
                        <div class="col-12 col-lg-auto">
                            <a href=""
                                class="btn btn-theme btn-wishlist btn-block mb-2">Y??u Th??ch <i
                                    class="fas fa-heart ml-2"></i></a>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Product Description -->
            <div class="mt-5 col-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="custom-tab style-1">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="description-tab" data-toggle="tab"
                                        href="#description" role="tab" aria-controls="description" aria-selected="true"
                                        aria-expanded="true">Th??ng
                                        tin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                                        aria-controls="reviews" aria-selected="false" aria-expanded="false">????nh gi??</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="reviews-faceboook-tab" data-toggle="tab"
                                        href="#reviews-faceboook" role="tab" aria-controls="reviews-faceboook"
                                        aria-selected="false" aria-expanded="false">B??nh lu???n</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="description" role="tabpanel"
                                    aria-labelledby="description-tab" aria-expanded="true">
                                    <p>{{$product->noidung}}</p>
                                </div>

                                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab"
                                    aria-expanded="false">
                                    <div class="review-wrapper">
                                        <div class="review-wrapper-header">
                                        </div>
                                        <div class="review-wrapper-body">
                                            <ul class="review-list">
                                                @if(isset($comments))
                                                @foreach($comments as $value)
                                                <li>
                                                    <div class="reviews-box">
                                                        <div class="review-body">
                                                            <div class="review-avatar">
                                                                <img alt=""
                                                                    src="{{ $value->customer->avatar ?? 'https://media.istockphoto.com/photos/no-image-available-picture-id531302789?s=612x612' }}"
                                                                    class="avatar avatar-140 photo">
                                                            </div>
                                                            <div class="review-content">
                                                                <div class="review-info">
                                                                    <div class="review-comment">
                                                                        <div class="review-author">
                                                                            {{$value->customer->ten}}
                                                                        </div>
                                                                    </div>

                                                                    <div class="review-comment-date">
                                                                        <div class="review-date">
                                                                            <span>{{ toTime($value->ngaybl)}}</span>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <p>{{$value->noidung}}</p>
                                                                <div class="col-sm-12">

                                                                    @if($value->id_khachhang === get_user('customer',
                                                                    'id'))
                                                                    <a href="{{ route('delete.comment', $value->id)}}"
                                                                        class="reply_commment delete">Xo??</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                                @endif

                                            </ul>
                                        </div>
                                    </div>

                                    <div class="review-wrapper">
                                        <div class="review-wrapper-header">
                                            <h4>????nh gi??</h4>
                                        </div>

                                        @if(get_user('customer','id'))
                                        <div class="review-wrapper-body">
                                            <div class="row">

                                                <div class="col-sm-12 form-group">
                                                    <textarea class="form-control height-110 content-commment"
                                                        placeholder="N???i dung b??nh lu???n..."></textarea>
                                                </div>
                                                <div class="col-sm-12">
                                                    <a href="{{ route('get.comment',['product', $product->id])}}"
                                                        class="btn btn-primary sendComments">G???i</a>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="review-wrapper-body">

                                            <div class="row">

                                                <span>????ng nh???p ????? ????nh gi??</span>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                </div>
                                <div class="tab-pane fade " id="reviews-faceboook" role="tabpanel"
                                    aria-labelledby="reviews-faceboook" aria-expanded="true">
                                    <p>
                                    <div class="fb-comments" data-href="{{$meta['url']}}" data-width=""
                                        data-numposts="5">
                                    </div>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
</section>
<!-- =========================== Product Detail =================================== -->

<!-- =========================== Related Products =================================== -->
<section class="gray">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12 mb-2">
                <h4 class="mb-0">S???n ph???m li??n quan</h4>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 col-md-12">
                <div class="owl-carousel products-slider owl-theme">
                    @if($related)
                    @foreach($related as $value)

                    <div class="item">
                        <div class="woo_product_grid">

                            <div class="woo_product_thumb">
                                <img src="{{ asset('uploads/product/'.$value->hinhanh)}}" class="img-fluid" alt="" />
                            </div>
                            <div class="woo_product_caption center">
                                <div class="woo_title">
                                    <h4 class="woo_pro_title"><a
                                            href="{{route('detail', $value->slug)}}">{{$value->tensp}}</a></h4>
                                </div>
                                <div class="woo_price ">
                                    <h6>{{currency_format($value->giaban)}}<span class="less_price"></span></h6>
                                    <a href="javascript:" class="btn-plus quickView" data-id="{{$value->id}}"><i
                                            class="fa fa-plus-circle" aria-hidden="true"></i></a>
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
@stop
