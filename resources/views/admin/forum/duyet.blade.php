@extends('master.view_ad')

@section('tittle','Quản lí Bài viết')
@section('main')
<div style="background-color: wheat; ">

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-sm-12 col-xs-12 forum" style="margin: auto;">
                <h2 style="text-align: center; background-color: green; padding: 5px;">Duyệt bài viết</h2>
                

             


                @foreach($tin as $t)
                @if($t->status ==2)
                <div class="bang_tin text-left">
                    <div class="info">
                        <div style="display: flex;">
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
                                <p style="margin-left: 10px;"><strong>{{$ad->name}}</strong> đã đăng bài viết vào {{date('d/m/Y',$n)}}  <b style="background-color: yellow; color: red; padding: 5px; border-radius: 2px;">Quản trị viên</b></p>

                            </div>
                            @endif
                            @endforeach
                        </div>

                        <div>
                            <form action="{{route('duyet',$t->id)}}" method="post">
                                @csrf
                                <input type="hidden" name="status" value="1">
                                <button class="btn btn-success">Duyệt</button>
                                
                            </form>
                            <a href="{{route('forum.xoa',$t->id)}}" class="btn btn-danger" onclick="return confirm('Bạn thực sự muốn từ chối')">Từ chối</a>
                        </div>
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
                        <span style="display: none;"><?php $q[1] = '10px';
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
                        <div style="background-image:linear-gradient(<?php echo $q[3] ?>); display: <?php echo $q[4] ?>; justify-content: <?php echo $q[5] ?>; align-items:<?php echo $q[6] ?> ;">
                            <div style="font-size: <?php echo $q[7] ?>;color: <?php echo $q[8] ?>;padding:<?php echo $q[1] ?>;">
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
                    
                </div>
                @endif
                @endforeach
                <p style="font-family: monospace;">Đã hết bài viết để duyệt!</p>
                <a href="{{route('ad.forum')}}" class="btn btn-success" style="margin: 1em;">Đi tới bảng tin</a>
            </div>


        </div>
    </div>
</div>


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
        justify-content: space-between;
    }

    .forum .nd {
        margin-top: 20px;
        font-family: monospace;
        font-size: 18px;
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