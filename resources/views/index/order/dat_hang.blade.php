@extends('master.shop')
@section('tittle','Đặt hàng')
@section('main')
@if($gio_hang->tong_so_luong ==0)
<h4>Bạn chưa có đơn hàng nào! <a style="color: red;" class="a" href="{{route('gian_hang')}}">Đi tới cửa hàng....</a></h4><br><br>
@else
<div class="container">
    <div class="row">
        <div class="col-md-6 sm-6">
            <h3>Đặt hàng</h3>
            <div>
                <form action="" method="post">
                    @csrf
                    <label>Email: </label><br>
                    <input type="email" name="email" value="{{$cus->email}}" placeholder="Nhập email">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Tên người nhận:</label>
                            <input type="text" name="name" placeholder="Tên người nhận">
                            <small class="error">@error('email'){{$message}}@enderror</small>
                        </div>
                        <div class="col-md-6">

                            <label>Số điện thoại:</label>
                            <input name="phone" value="{{$cus->phone}}" placeholder="Số điện thoại">
                            <small class="error">@error('phone'){{$message}}@enderror</small>
                        </div>
                    </div>
                    <div>
                        <label>Địa chỉ:</label>
                        <input type="text" name="address" placeholder="Địa chỉ nhận hàng">
                        <small class="error">@error('address'){{$message}}@enderror</small>

                    </div>
                    <div><label>Ghi chú thêm:</label>
                        <input type="text" name="order_note" placeholder="Thêm nhắc nhở">
                        <small class="error">@error('order_note'){{$message}}@enderror</small>
                    </div>
            </div>
            <button type="submit" class="button btn-primary">Đặt hàng</button>
            </form>
        </div>

        <div class="col-md-6 sm-6 right">
            <h3 style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Hóa đơn</h3>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Tên sách</th>
                        <th></th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gio_hang->gio_hang as $gio)
                    <tr>

                        <td scope="row">{{$gio['ten_sach']}}</td>
                        <td><img src="{{url('anh_san_pham')}}/{{$gio['anh']}}" style="width: 75px;" alt=""></td>
                        <td>{{$gio['so_luong']}}</td>
                        <td>{{number_format($gio['gia'])}} vnđ</td>
                    </tr>
                    @endforeach
                    <tr style="width: 100%;">
                        <td></td>
                        <td></td>
                        <td>
                            <h3>Tổng số lượng: {{$gio_hang->tong_so_luong}} </h3>
                        </td>

                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td scope="row">
                            <h3>Thành tiền:{{number_format($gio_hang->tong_tien)}} vnđ</h3>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Nick name <br><br>
                            <h2 style="font-family: ki;"> {{$cus->name}}</h2>
                        </td>
                        <td></td>

                    </tr>
                </tbody>

            </table>
        </div>

    </div>
</div>
@endif
@stop
@section('style')
<style>
    h3 {
        font-family: system-ui;
        text-align: center;
    }

    .right {
        border-left: 1px solid;
    }

    input {
        width: 100%;
        height: 40px;
        border: 2px solid;
        border-radius: 5px;
        padding: 5px;
    }

    :root {
        --foot-color: #2681d9;
        --error-color: #e74c3c;
    }

    input:focus {
        transition: 0.1s;
        border: 4px solid #2681d9;
    }

    td h3 {
        font-family: roboto;
        font-size: 24px;
        font-weight: bold;
    }
    .a:hover{
        color: aqua;
    text-decoration: line-through;    
    }
    
</style>
@stop