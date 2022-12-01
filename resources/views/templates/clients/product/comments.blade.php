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


                    @if($value->id_khachhang ===
                    get_user('customer', 'id'))
                    <a href="{{ route('delete.comment', $value->id)}}" class="reply_commment delete">Xoá</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</li>
@endforeach
@endif
