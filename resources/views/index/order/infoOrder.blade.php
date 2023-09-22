@extends('master.shop')
@section('tittle','Lịch Sử Đơn Hàng')
@section('main')
<div class="container">
    <div class="row">


        <div class="col-md-8 mid">
        <h3 style="background-color: rgba(0, 94, 0, 0.9); font-family: roboto; color: wheat;">Chi tiết đơn hàng</h3>

            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Tên sách</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        <th>Ngày đặt</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($don->details as $o)
                    <tr>
                        <td scope="row">{{$o->product->name}}</td>
                        <td>{{$o->quantity}}</td>
                        <td>{{number_format($o->price)}}</td>
                        <td class="align-middle">{{number_format($o->price * $o->quantity) }}vnđ</td>
                        <td>{{$o->created_at->format('d/m/Y')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            

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