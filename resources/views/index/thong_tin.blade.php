@extends('master.shop')
@section('tittle',$sp->name )
@section('main')
<!-- Breadcrumbs -->
<section class="breadcrumbs-custom-inset">
    <div class="breadcrumbs-custom context-dark bg-overlay-46">
        <div class="container">
            <h2 class="breadcrumbs-custom-title" style="color: black; "><span style="background-color: rgba(255, 255, 255, 0.7);">Cùng tìm hiểu thêm nhé!</span></h2>
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{route('index')}}">Trang chủ</a></li>
                <li class="active">Thông Tin</li>
            </ul>
        </div>
        <div class="box-position" style="background-image: url(<?php echo url('anh_san_pham') ?>/{{$sp->avatar}});"></div>
    </div>
</section>
<!-- Why choose us-->
<section class="section section-md section-first bg-default text-md-left">
    <div class="container">
        <div class="row row-50 justify-content-center">
            <div class="col-md-10 col-lg-5 col-xl-6"><img src="{{url('anh_san_pham')}}/{{$sp->avatar}}" alt="" width="519" height="446" />
            </div>
            <div class="col-md-10 col-lg-7 col-xl-6">
                <h3 style="font-family: thanh;">{{$sp->name}}</h3>
                <!-- Bootstrap tabs-->
                <div class="tabs-custom tabs-horizontal tabs-line" id="tabs-4">
                    <!-- Nav tabs-->
                    <ul class="nav nav-tabs">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-4-1" data-toggle="tab">Thông tin</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-4-2" data-toggle="tab">Mô tả</a></li>

                    </ul>
                    <!-- Tab panes-->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabs-4-1">
                            <p>Thể Loại: @foreach($dm_global as $dm) {{$dm->id ==$sp->the_loai ?$dm->the_loai:''}} @endforeach</p>
                            <div class="text-center text-sm-left offset-top-30">
                                <ul class="row-16 list-0 list-custom list-marked list-marked-sm list-marked-secondary">
                                    <li>Độ tuổi: @foreach($dm_global as $dm) {{$dm->id ==$sp->category_id ?$dm->age:''}} @endforeach +</li>
                                    <li>Size: @foreach($kc_global as $kc) {{$kc->id ==$sp->size_id ?$kc->width.'(cm) x '.$kc->length.'(cm)':''}} @endforeach</li>
                                    

                                    <li>Ngày đăng: {{$sp->created_at->format('d/m/Y')}}</li>
                                    <li>Ngày sửa đổi gần nhất: {{$sp->updated_at->format('d/m/Y')}}</li>
                                </ul>
                            </div>
                            <div class="group-md group-middle"><a class="button button-width-xl-230 button-primary button-pipaluk" href="#">Thêm vào giỏ hàng</a><a class="button button-width-xl-310 button-default-outline button-wapasha" href="{{route('index')}}">Quay về</a></div>
                        </div>
                        <div class="tab-pane fade" id="tabs-4-2">
                            <p>{!!$sp->describe!!}</p>

                            <div class="group-md group-middle"><a class="button button-width-xl-230 button-primary button-pipaluk" href="#">Thêm vào giỏ hàng</a><a class="button button-width-xl-310 button-default-outline button-wapasha" href="{{route('index')}}">Quay về</a></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Projects-->
<section class="section section-md section-fluid bg-default">
    <div class="container">
        <h2>Bình luận so trình luận</h2>
    </div>
    <!-- Owl Carousel-->
    <div class="owl-carousel owl-classic owl-timeline" data-items="1" data-md-items="2" data-lg-items="3" data-xl-items="4" data-margin="30" data-stage-padding="15" data-xxl-stage-padding="0" data-autoplay="true" data-nav="true" data-dots="true">
        @foreach($anh_khac as $anh)
        @if($anh->product_id == $sp->id)
        <div class="owl-item">
            <!-- Thumbnail Classic-->
            <article class="thumbnail thumbnail-mary thumbnail-md">
                <div class="thumbnail-mary-figure"><img src="{{url('anh_san_pham')}}/{{$anh->image}}" alt="" style="height: 140px; width: 200px;" />
                </div>
                <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="{{url('anh_san_pham')}}/{{$anh->image}}" data-lightgallery="item"><img src="{{url('anh_san_pham')}}/{{$anh->image}}" alt="" /></a>
                </div>
            </article>
            <div class="thumbnail-mary-description">
                <span class="thumbnail-mary-decor"></span>
                <h5 class="thumbnail-mary-time">

                </h5>
            </div>
        </div>
        @endif
        @endforeach



        <!-- Thumbnail Classic-->


    </div>
    <div class="container" style="background-color: rgba(214,214,214,1); padding: 10px;">
        <div class="row">
            <div class="col-md-10" style="background-color: white; margin: auto; padding: 10px; border-radius: 15px;">
                <div class="content">
                    @foreach($cmt as $cm)
                    @if($cm->product_id == $sp->id)
                    @foreach($admin as $ad)
                    @if($ad->id == $cm->user_id)
                    <div class="nd">
                        <div>
                            <img src="{{url('avatar')}}/{{$ad->avatar}}" alt="" style="width: 45px; height: 45px; border-radius: 100%;">
                        </div>
                        <div style="margin: 1em; margin-top: 0; background-color: rgba(196, 195, 194, 0.8); padding: 10px;; border-radius: 10px;">
                            <p><b>{{$ad->name}}</b><span style="background-color: yellow; color: red; padding: 5px; border-radius: 2px; font-weight: bolder;">Admin</span></p>
                            <p>{!!$cm->content!!}</p>
                            <!-- Button trigger modal -->
                            <button type="button" style="border: none; border-radius: 10px; color: blue; background-color: rgba(196, 195, 194, 0.1);" data-toggle="modal" data-target="#modelId">
                                Trả lời
                            </button>


                        </div>
                    </div>
                    @endif
                    @endforeach
                    @foreach($customer as $cus1)
                    @if($cus1->id == $cm->customer_id)
                    <div class="nd">
                        <div>
                            <img src="{{url('avatar')}}/{{$cus1->avatar}}" alt="" style="width: 45px; height: 45px; border-radius: 100%;">
                        </div>
                        <div style="margin: 1em; margin-top: 0; background-color: rgba(196, 195, 194, 0.8); padding: 10px;; border-radius: 10px;">
                            <p><b>{{$cus1->name}}</b></p>
                            <p>{!!$cm->content!!}</p>
                            
                        </div>
                        
                    </div>
                    @endif
                    @endforeach
                    @endif
                    @endforeach

                </div>







                @if(auth('cus')->user())

                <form action="{{route('cmt_sp',$sp->id)}}" method="post">
                    @csrf


                    <textarea name="content" id="" cols="30" rows="10" placeholder="Cảm nhận của bạn về sách...." style="resize: none; width: 100%; height: 150px; padding: 10px;"></textarea>
                    <small class="error">@error('content'){{$message}}@enderror</small>
                    <button type="submit" class="btn btn-primary">Viết bình luận</button>
                </form>
                @else
                <a href="{{route('home.dang_nhap')}}" class="btn btn-primary">Đăng nhập để bình luận</a>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- What people say-->
<section class="section context-dark">
    <div class="parallax-container" data-parallax-img="images/bg-parallax-2.jpg">
        <div class="parallax-content section-md bg-overlay-2-21">
            <div class="container">
                <div class="oh">
                    <h2 class="wow slideInUp" data-wow-delay="0s" style="font-family: thanh;">Những câu nói hay</h2>
                </div>
                <!-- Owl Carousel-->
                <div class="owl-carousel owl-modern" data-items="1" data-stage-padding="15" data-margin="30" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut" data-autoplay="true">
                    <!-- Quote Lisa-->
                    @foreach($triet as $tl)
                    <article class="quote-lisa">
                        <div class="quote-lisa-body">
                            <div class="quote-lisa-text">
                                <p class="q" style="font-family: thanh; font-size: 32px;">{{$tl->write}}</p>
                            </div>
                            <h5 class="quote-lisa-cite" style="font-family: ki; font-size: 32px; font-weight: bolder;">{{$tl->user_name}}</h5>
                            
                        </div>
                    </article>
                   @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</section>


@stop
@section('style')
<style>
    .anh {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .bang {
        width: 100%;

        border: none;

        height: 40px;

    }

    td {
        font-weight: bold;
        font-family: 'roboto';
        font-size: 18px;
    }


    textarea {
        width: 100%;
        resize: none;
        height: 40px;
        border: 2px solid;
        border-radius: 10px;
        padding: 6px;
    }

    .content {
        text-align: left;
    }

    .nd {
        margin-left: 1em;
        display: flex;
    }
</style>
@stop