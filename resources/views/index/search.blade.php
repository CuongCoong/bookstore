@extends('master.shop')
@section('tittle','Kết quả tìm kiếm')
@section('main')
<div style="background-color: rgba(213, 213, 213, 1); ">
    <div class="container">
        @if($m==0)
        <div class="row">
            <div class="col-md-12 " style="margin: 1em;">
                <h3 style="background-color: green;">Không có sản phẩm hay bài viết nào!</h3>
            </div>
        </div>
        @else

        <div class="row">
            <div class="col-md-12" style="background-color: white;">
                <h3>Kết quả tìm kiếm</h3>
                <h4 style="background-color: green; text-align: left;"> Sản phẩm</h4>
                @if($n>0)
                <div class="row">
                    @foreach($san_pham as $sp)
                    <div class="col-md-3">
                        <div class="card text-left" style="margin-top: 15px; border-radius: 10px; height: 550px;">
                            <img class="card-img-top" src="{{url('anh_san_pham')}}/{{$sp->avatar}}" style="height: 350px;" alt="">
                            <div class="card-body">
                                <a href="{{route('index.thong_tin',$sp->id)}}" class="card-title">
                                    <h4 class="ten" style="font-family: thanh;">{{Str::words($sp->name,4)}}</h4>
                                </a>
                                <div>


                                    @if($sp->sale_price)
                                    @foreach($dm_global as $dm)
                                    @if($dm->id == $sp->category_id)
                                    <p style="font-size: 18px;"><b>{{$dm->name }}</b></p>
                                    @endif
                                    @endforeach
                                    <del style="font-weight: bolder; color: red;">Giá gốc: {{number_format($sp->price)}}đ</del>
                                    <p style="font-size: 18px;">Giá khuyến mãi: {{number_format($sp->sale_price)}}đ</p>
                                    @else
                                    @foreach($dm_global as $dm)
                                    @if($dm->id == $sp->category_id)
                                    <p style="font-size: 18px;"><b>{{$dm->name }}</b></p>
                                    @endif
                                    @endforeach
                                    <p style="font-size: 18px;">Giá bán: {{number_format($sp->price)}}đ</p>

                                    @endif
                                </div>

                                <a class=" button-sm button-secondary" style="width: 150px;" href="{{route('gio_hang.them',$sp->id)}}">Thêm vào giỏ</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    
                </div>
                
                @else

                <h4>Không có sản phẩm nào bạn đang tìm kiếm!</h4>

                @endif
                <div>
                    <h4 style="background-color: green; text-align: left;"> Bài viết</h4>
                    @if($o>0)
                    @foreach($stt as $s)
                    @if($s->status== 1)
                    <div class="card text-left" style="text-indent: 30px;">
                    <p><a href="{{route('forum.info',$s->id)}}"><b style="color: blue;">{!!$s->content !!}</b> đăng ngày {{$s->created_at->format('d/m/Y')}}</a></p>

                    </div>
                    


                    @endif
                    @endforeach
                    @else
                    <h4>Không có bài viết nào bạn đang tìm kiếm!</h4>
                    @endif
                </div>


                
                @if($p>0)
                <h4 style="background-color: green; text-align: left;"> Sản phẩm theo danh mục</h4>
                <div class="row">
                    
                @foreach($dm1 as $d)
                @foreach($prod as $sp)
                @if($sp->category_id == $d->id)
                <div class="col-md-3">
                        <div class="card text-left" style="margin-top: 15px; border-radius: 10px; height: 550px;">
                            <img class="card-img-top" src="{{url('anh_san_pham')}}/{{$sp->avatar}}" style="height: 350px;" alt="">
                            <div class="card-body">
                                <a href="{{route('index.thong_tin',$sp->id)}}" class="card-title">
                                    <h4 class="ten" style="font-family: thanh;">{{Str::words($sp->name,4)}}</h4>
                                </a>
                                <div>


                                    @if($sp->sale_price)
                                    @foreach($dm_global as $dm)
                                    @if($dm->id == $sp->category_id)
                                    <p style="font-size: 18px;"><b>{{$dm->name }}</b></p>
                                    @endif
                                    @endforeach
                                    <del style="font-weight: bolder; color: red;">Giá gốc: {{number_format($sp->price)}}đ</del>
                                    <p style="font-size: 18px;">Giá khuyến mãi: {{number_format($sp->sale_price)}}đ</p>
                                    @else
                                    @foreach($dm_global as $dm)
                                    @if($dm->id == $sp->category_id)
                                    <p style="font-size: 18px;"><b>{{$dm->name}}</b></p>
                                    @endif
                                    @endforeach
                                    <p style="font-size: 18px;">Giá bán: {{number_format($sp->price)}}đ</p>

                                    @endif
                                </div>

                                <a class=" button-sm button-secondary them_gio" style="width: 150px;" href="{{route('gio_hang.them',$sp->id)}}">Thêm vào giỏ</a>
                            </div>
                        </div>
                    </div>


                @endif
                @endforeach
                
                @endforeach
                </div>
                @else
                <h4>Không có sản phẩm của danh mục nào bạn đang tìm kiếm!</h4>
                @endif
                


                <!--hết-->
            </div>
        </div>
        @endif
    </div>
</div>
<br>
@stop
@section('style')
<style>
    h3,
    h4 {
        font-family: 'roboto';
        text-decoration: 10px;
    }
</style>
@stop