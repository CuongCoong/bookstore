@extends('master.shop')
@section('tittle','Lịch Sử Đơn Hàng')
@section('main')
<div class="container">
    <div class="row">


        <div class="col-md-8 mid">
        <h3 style="background-color: rgba(0, 94, 0, 0.9); font-family: roboto; color: wheat;">Lịch sử đơn hàng</h3>

            @if($orders->count() >0)
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Ngày đặt</th>
                        <th>Tổng Tiền</th>
                        <th>Trạng Thái</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($orders as $o)
                    <tr>
                        <td>{{$o->created_at->format('d/m/Y')}}</td>
                        <td>{{$o->getTotal()}} vnđ</td>
                        <td>{{$o->status==0?'Chờ duyệt' : 'Đã xác nhận'}}</td>
                        <td class="align-middle"><a href="{{route('dat_hang.chi_tiet',$o->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @else
            <h4>Bạn chưa có đơn hàng nào! <a class="a" style="color: red;" href="{{route('gian_hang')}}">Đi tới cửa hàng....</a></h4><br><br>
            @endif

        </div>
        <div class="col-md-4 col-sm-12 col-xs-12 aside">
            <h4>Có thể bạn thích</h4>
        @foreach($sp_random1 as $sp)
            <div class="card text-left" style="margin-top: 15px; border-radius: 10px;">
              <img class="card-img-top" src="{{url('anh_san_pham')}}/{{$sp->avatar}}" alt="">
              <div class="card-body">
                <a href="{{route('gio_hang.them',$sp->id)}}" class="card-title">{{$sp->name}}</a>
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
@stop

@section('style')
<style>
    .a:hover {
        color: aqua;
        text-decoration: underline;
    }

    
    .aside h4 {
        margin-top: 10px;
        border-top: solid 5px rgba(0, 94, 0, 0.9);
        background-color: wheat;
    }
</style>
@stop