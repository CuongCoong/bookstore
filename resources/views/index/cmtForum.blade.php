@extends('master.shop')
@section('tittle')
Bình luận
@stop
@section('main')
<?php $dem = 0;
foreach ($anh_tin as $anh) {
    if ($anh->forum_id == $forum->id) {
        $dem++;
    }
}

$dem1 = 0;
foreach ($cmt as $cm) {
    if ($cm->forums_id == $forum->id) {
        $dem1++;
    }
} ?>

<div style="background-color: rgba(196, 195, 194, 1);">
    <div class="container">
        <div class="row">
            <div class="col-md-10" style="padding: 10px; margin: auto; background-color: white; margin-bottom: 20px; margin-top: 30px; border-radius: 15px;">
                @if($dem>0)
                @foreach($anh_tin as $anh)
                @if($anh->forum_id == $forum->id)
                <div class="anh" style="margin-top: 1em;">

                    <article class="thumbnail thumbnail-mary thumbnail-md">

                        <div class="thumbnail-mary-figure"><img src="{{url('forum')}}/{{$anh->image}}" alt="" style="height: 140px; width: 200px; border-radius: 5px;" />
                        </div>
                        <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="{{url('forum')}}/{{$anh->image}}" data-lightgallery="item"><img src="{{url('forum')}}/{{$anh->image}}" alt="" /></a>
                        </div>
                </div>

                </article>

                @endif

                @endforeach
                <p style="text-align: left; text-indent: 10px; font-family: monospace; font-size: 18px;">{!!$forum->content!!}</p>
                @elseif($dem==0)

                <div style="background-image:linear-gradient(120deg, #3ca7ee, #9b408f); display:flex; justify-content: center; align-items:center ;font-family: monospace;font-size: 18px; color: white;">
                    <div>

                        <p>{!!$forum->content!!}</p>
                    </div>
                </div>
                @endif





                <div style="width: 100%; display: flex; border-top: 1px solid green;border-bottom: 1px solid green; margin-top: 1em; margin-bottom: 1em;">
                    <table class="bang">
                        <tr>
                            <td>Văn minh nhé!</td>
                            <td>{{$dem1 >0 ? 'Có '.$dem1.' lượt bình luận':'Chưa có lượt bình luận nào!'}}</td>
                        </tr>


                    </table>
                </div>
                <div class="content">
                    @foreach($cmt as $cm)
                    @if($cm->forums_id == $forum->id)
                    @foreach($admin as $ad)
                    @if($ad->id == $cm->user_id)
                    <div class="nd">
                        <div>
                            <img src="{{url('avatar')}}/{{$ad->avatar}}" alt="" style="width: 45px; height: 45px; border-radius: 100%;">
                        </div>
                        <div style="margin: 1em; margin-top: 0; background-color: rgba(196, 195, 194, 0.8); padding: 10px;; border-radius: 10px;">
                            <p><b>{{$ad->name}}</b><span style="background-color: yellow; color: red; padding: 5px; border-radius: 2px; font-weight: bolder;">Admin</span></p>
                            <p>{!!$cm->comment!!}</p>
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
                            <p>{!!$cm->comment!!}</p>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    <div class="comment">
                        <form action="{{route('comment')}}" method="post">
                            @csrf
                            <input type="hidden" name="forum_id" value="{{$forum->id}}">
                            <textarea name="comment" placeholder="Viết bình luận..."></textarea>
                            <p class="error">@error('comment') {{$message}}@enderror</p>
                            <button type="submit" style="background-color: #2681d9; width: 50px; height: 50px; border: none; border-radius: 10px;"><i class="fas fa-share fa-sm  " style="color: #f8f8f8; "></i></button>
                        </form>
                    </div>
                </div>
                {{$cmt->links()}}











            </div>
        </div>
    </div>
</div>
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