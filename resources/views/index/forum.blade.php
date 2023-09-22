@extends('master.shop')
@section('tittle', 'Forum Giao lưu')
@section('main')


<div class="container">
    <div class="row">
        <br>
        <div class="col-md-8 col-sm-12 col-xs-12 forum">

            @if($cus)
            <div class="status">
            <small class="error">@error('content') {{$message}}@enderror</small>
            <small class="error">@error('image') {{$message}}@enderror</small>
                <form class="tin" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <textarea class="note" name="content" placeholder="Viết gì đó...."></textarea>
                    
                    <span class="btn btn-primary btn-file">
                        Chọn ảnh<input type="file" name="image[]" multiple>
                    </span>
                    <button type="submit" class="btn btn-success sub" style="background-color: #2681d9;">Đăng tin</button>
                </form>
            </div>



            <div class="content">
                <h3 style="margin-top: 40px;">Bảng Tin</h3>
            </div>
            @foreach($tin as $t)
            @if($t->status == 1)
            <div class="bang_tin text-left">
                <div class="info">
                    @foreach($customer as $c)
                    @if($c->id == $t->customer_id)
                    <img src="{{url('avatar')}}/{{$c->avatar}}" alt="" style="width: 45px; height: 45px; border-radius: 100%;">

                    <div>
                        <span style="display: none;">{{$date=$t->created_at}}{{$n= strtotime($date)}}</span>
                        <p style="margin-left: 10px;"><strong>{{$c->name}}</strong> đã đăng bài viết vào {{date('d/m/Y',$n)}}</p>

                    </div>
                    @endif
                    @endforeach
                    @foreach($ad_global as $ad)
                    @if($ad->id == $t->user_id)
                    <img src="{{url('avatar')}}/{{$ad->avatar}}" alt="" style="width: 45px; height: 45px; border-radius: 100%;">

                    <div>
                        <span style="display: none;">{{$date=$t->created_at}}{{$n= strtotime($date)}}</span>
                        <p style="margin-left: 10px;"><strong>{{$ad->name}}</strong> đã đăng bài viết vào {{date('d/m/Y',$n)}} <b style="background-color: yellow; color: red; padding: 5px; border-radius: 2px;">Quản trị viên</b></p>

                    </div>
                    @endif
                    @endforeach

                </div>
                <span style="display: none;">{{$n=0}}</span>
                <div class="nd">
                    <span style="display: none;"><?php $w = 0;
                                                    $q = [];
                                                    for ($i = 0; $i < 20; $i++) {
                                                        $q[$i] = '';
                                                    } ?></span>
                    @foreach($anh_tin as $tin)
                    @if($tin->forum_id == $t->id)
                    <span style="display: none;">{{$w++}}</span>

                    @endif
                    @endforeach
                    @if($w==0)
                    <span style="display: none;"><?php $q[1] = '100%';
                                                    $q[2] = '450px';
                                                    $q[3] = '120deg, #3ca7ee, #9b408f';
                                                    $q[4] = 'flex';
                                                    $q[5] = 'center';
                                                    $q[6] = 'center';
                                                    $q[7] = '32px';
                                                    $q[8] = '#f8f8f8';
                                                    $q[9] = '350px';
                                                    ?></span>
                    @endif
                    <div style="width: <?php echo $q[1] ?>;background-image:linear-gradient(<?php echo $q[3] ?>); display: <?php echo $q[4] ?>; justify-content: <?php echo $q[5] ?>; align-items:<?php echo $q[6] ?> ;">
                        <div style=" <?php echo $q[7] ?>;color: <?php echo $q[8] ?>;">
                            <p style=" text-align: <?php echo $q[5] ?>;">{!!$t->content!!}</p>
                        </div>
                    </div>
                    <div class="slider_wrap">
                        <div class="nivoSlider" style="height:<?php echo $w > 0 ? '350px' : '' ?>;">
                            @foreach($anh_tin as $tin)

                            @if($tin->forum_id == $t->id)



                            <a href="{{url('forum')}}/{{$tin->image}}">
                                <img src="{{url('forum')}}/{{$tin->image}}" data-thumb="{{url('forum')}}/{{$tin->image}}" alt="" title="#htmlcaption-1" />
                            </a>
                            @endif



                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- comment -->
                <div class="comment">
                    <form action="{{route('comment')}}" method="post">
                        @csrf
                        <input type="hidden" name="forum_id" value="{{$t->id}}">
                        <textarea name="comment" placeholder="Viết bình luận..."></textarea>
                        <p class="error">@error('comment') {{$message}}@enderror</p>
                        <div style="display: flex; justify-content: space-between">
                            <button type="submit" style="background-color: #2681d9; width: 50px; height: 50px; border: none; border-radius: 10px;"><i class="fas fa-share fa-sm  " style="color: #f8f8f8; "></i></button>
                            <span style="display: none;">{{$cm=0}}</span>
                            @foreach($cmt as $c)
                            @if($c->forums_id==$t->id)
                            <span style="display: none;">{{$cm++}}</span>
                            @endif
                            @endforeach
                            @if($cm==0)
                            <a href="{{route('forum.info',$t->id)}}">Chưa có lượt bình luận nào!</a>
                            @else
                            <a href="{{route('forum.info',$t->id)}}">{{$cm}} bình luận</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            @endif
            @endforeach

            @else
            <h4 class="btn-success" style="background-color: #2681d9;"><a href="{{route('home.dang_nhap')}}">Đăng nhập để đăng</a></h4>
            <div class="content">
                <h3 style="margin-top: 40px;">Bảng Tin</h3>
            </div>
            @foreach($tin as $t)
            @if($t->status == 1)
            <div class="bang_tin text-left">
                <div class="info">
                    @foreach($customer as $c)
                    @if($c->id == $t->customer_id)
                    <img src="{{url('avatar')}}/{{$c->avatar}}" alt="" style="width: 45px; height: 45px; border-radius: 100%;">

                    <div>
                        <span style="display: none;">{{$date=$t->created_at}}{{$n= strtotime($date)}}</span>
                        <p style="margin-left: 10px;"><strong>{{$c->name}}</strong> đã đăng bài viết vào {{date('d/m/Y',$n)}}</p>

                    </div>
                    @endif
                    @endforeach
                    @foreach($ad_global as $ad)
                    @if($ad->id == $t->user_id)
                    <img src="{{url('avatar')}}/{{$ad->avatar}}" alt="" style="width: 45px; height: 45px; border-radius: 100%;">

                    <div>
                        <span style="display: none;">{{$date=$t->created_at}}{{$n= strtotime($date)}}</span>
                        <p style="margin-left: 10px;"><strong>{{$ad->name}}</strong> đã đăng bài viết vào {{date('d/m/Y',$n)}} <b style="background-color: yellow; color: red; padding: 5px; border-radius: 2px;">Quản trị viên</b></p>

                    </div>
                    @endif
                    @endforeach

                </div>
                <span style="display: none;">{{$n=0}}</span>
                <div class="nd">
                    <span style="display: none;"><?php $w = 0;
                                                    $q = [];
                                                    for ($i = 0; $i < 20; $i++) {
                                                        $q[$i] = '';
                                                    } ?></span>
                    @foreach($anh_tin as $tin)
                    @if($tin->forum_id == $t->id)
                    <span style="display: none;">{{$w++}}</span>

                    @endif
                    @endforeach
                    @if($w==0)
                    <span style="display: none;"><?php $q[1] = '100%';
                                                    $q[2] = '450px';
                                                    $q[3] = '120deg, #3ca7ee, #9b408f';
                                                    $q[4] = 'flex';
                                                    $q[5] = 'center';
                                                    $q[6] = 'center';
                                                    $q[7] = '32px';
                                                    $q[8] = '#f8f8f8';
                                                    $q[9] = '350px';
                                                    ?></span>
                    @endif
                    <div style="width: <?php echo $q[1] ?>; height: <?php echo $q[2] ?>;background-image:linear-gradient(<?php echo $q[3] ?>); display: <?php echo $q[4] ?>; justify-content: <?php echo $q[5] ?>; align-items:<?php echo $q[6] ?> ;">
                        <div style=" <?php echo $q[7] ?>;color: <?php echo $q[8] ?>;">
                            <p style=" text-align: <?php echo $q[5] ?>;">{!!$t->content!!}</p>
                        </div>
                    </div>
                    <div class="slider_wrap">
                        <div class="nivoSlider" style="height:<?php echo $w > 0 ? '350px' : '' ?>;">
                            @foreach($anh_tin as $tin)

                            @if($tin->forum_id == $t->id)



                            <a href="{{url('forum')}}/{{$tin->image}}">
                                <img src="{{url('forum')}}/{{$tin->image}}" data-thumb="{{url('forum')}}/{{$tin->image}}" alt="" title="#htmlcaption-1" />
                            </a>
                            @endif



                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- comment -->
                <div class="comment1">
                    <button href="{{route('home.dang_nhap')}}" style="border: none; height: 40px; padding: 5px; background-color: #2681d9; border-radius: 7px; color: #f8f8f8; font-family: monospace;">Đăng nhập để giao lưu nào!</button>
                    <?php $cm = 0;
                    ?>
                    @foreach($cmt as $c)
                    <span style="display: none;">{{$cm++}}</span>
                    @endforeach
                    @if($cm==0)
                    <a href="{{route('home.dang_nhap')}}">Chưa có lượt bình luận nào! (Đăng nhập)</a>
                    @else
                    <a href="{{route('home.dang_nhap')}}">{{$cm}} bình luận (Đăng nhập)</a>
                    @endif
                </div>

            </div>

            @endif
            @endforeach


            {{$tin->links()}}
            @endif
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12 aside">
            <h4>Có thể bạn thích</h4>
            @foreach($sp_random1 as $sp)
            <div class="card text-left" style="margin-top: 15px; border-radius: 10px;">
                <img class="card-img-top" src="{{url('anh_san_pham')}}/{{$sp->avatar}}" alt="">
                <div class="card-body">
                    <a href="{{route('index.thong_tin',$sp->id)}}" style="font-size: 24px;font-weight: bold; font-family: thanh; color: black;" class="card-title">{{$sp->name}}</a><br>
                    @if($sp->sale_price)
                    <del style="font-weight: bolder; color: red;">Giá gốc: {{number_format($sp->price)}}đ</del>
                    <p style="font-size: 18px;">Giá khuyến mãi: {{number_format($sp->sale_price)}}đ</p>
                    @else
                    <p style="font-size: 18px;">Giá bán: {{number_format($sp->price)}}đ</p>

                    @endif
                    <a class=" button-sm button-secondary them_gio" style="width: 150px;" href="{{route('gio_hang.them',$sp->id)}}">Thêm vào giỏ</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<br>

@stop
@section('style')
<link rel="stylesheet" href="{{url('nhung')}}/summer/summernote.min.css">
<style>
    h3 {
        font-family: roboto;
    }

    body {
        background-color: rgba(196, 195, 194, 1);
    }

    h2 {
        font-family: 'roboto';
    }

    .status {
        padding: 10px;
        background-color: white;
        border-radius: 10px;
    }

    .forum {
        margin-top: 10px;
    }


    .forum .status textarea {
        width: 100%;
        height: 150px;
        padding: 12px 20px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        background-color: #f8f8f8;
        font-size: 16px;
        resize: none;
    }

    .forum .bang_tin {
        padding: 15px;
        border-radius: 10px;
        width: 100%;
        background-color: white;
        margin: 10px;
    }

    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    .aside h4 {
        margin-top: 10px;
        border-top: solid 5px rgba(0, 94, 0, 0.9);
        background-color: wheat;
    }

    .sub:hover {
        background-color: aqua;
    }

    .forum .info {
        display: flex;
        flex-wrap: wrap;
    }

    .forum .nd {
        margin-top: 20px;
        font-family: monospace;
        font-size: 18px;
    }
    .comment1{
        margin: 1em;
        display: flex;
        justify-content: space-between;
    }
    .comment button:hover{
        background-color: black;
    }
    .comment textarea {
        margin-top: 10px;
        width: 100%;
        height: 55px;
        padding: 10px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 15px;
        background-color: #f8f8f8;
        font-size: 16px;
        resize: none;
    }
</style>
@stop
@section('js')
<script src="{{url('nhung')}}/summer/summernote.min.js"></script>
<script>
    $('.note').summernote({
        height: 250,
        placeholder: 'Viết gì đó...',
        toolbar: false,
        shortcuts: false,
        maxHeight: '150px',
        minHeight: '150px',
        focus: false,
        popover: false,
        codemirror: false,
        button: false



    });
    $('#summernote').summernote('unlink');
</script>
<script type="text/javascript">
    $(window).load(function() {
        $('.nivoSlider').nivoSlider({
            effect: 'random',
            animSpeed: 500,
            pauseTime: 3000,
            startSlide: 0,
            controlNavThumbs: false,
            controlNav: false,
            directionNav: false,
            disableGrammar: false
        });
    });
</script>
@stop