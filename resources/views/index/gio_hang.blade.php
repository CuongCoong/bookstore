@extends('master.shop')
@section('tittle','Giỏ Hàng')
@section('main')
<x-banner />
<hr>
<h3 id="tieu_de">Giỏ hàng của bạn</h3>
<hr>
@if($gio_hang->tong_so_luong == 0)
<p>Bạn chưa thêm cuốn sách nào!</p>
<a href="{{route('index')}}" class="button btn-success">Đi đến cửa hàng</a>
@else
<div class="container">
    <div class="row">
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                    <tr>
                        <th></th>
                        <th>Tên cuốn sách</th>
                        <th>Số Lượng</th>
                        <th>Đơn Giá</th>
                        <th>Thành Tiền</th>
                        <th>Tùy Chọn</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($gio_hang->gio_hang as $gio)
                <tr>
                    <td><img src="{{url('anh_san_pham')}}/{{$gio['anh']}}" style="width: 5em;" alt=""></td>
                    <td>{{$gio['ten_sach']}}</td>
                    <td>
                    <form action="{{route('gio_hang.sua',$gio['id'])}}" method="get">
                <input  name="so_luong" value="{{$gio['so_luong']}}" style="background-color: rgba(0, 60, 0, 0); text-align: center; width: 3em; border: none; border-bottom: 2px solid;" min="1" max="100" id="">
                <small class="error">@error('so_luong'){{$message}}@enderror</small>
            <button type="submit" style="background-color: rgba(0, 60, 0, 0); border: none; color: green;">Cập nhật</button>
                    </form>


                    </td>
                    
                    
                    
                    
                    <td>{{number_format($gio['gia'])}}vnđ</td>
                    <td>{{number_format($gio['gia']*$gio['so_luong'])}}vnđ</td>
                    <td><a href="{{route('gio_hang.xoa',$gio['id'])}}" style="color: red;">Xóa</a></td>
                </tr>

                @endforeach
                <tr>
                    <td scope="row">
                        <h4 style="font-family: monospace;">Tổng số lượng: {{number_format($gio_hang->tong_so_luong)}}</h4>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <h4 style="font-family: monospace;">Tổng Tiền: {{number_format($gio_hang->tong_tien)}} vnđ</h4>
                    </td>

                </tr>
                <tr>
                    <td><a href="{{route('gian_hang')}}" class="button btn-success">Tiếp tục mua</a></td>
                    <td><a href="{{route('gio_hang.huy')}}" class="button btn-warning">Xóa tất cả</a></td>
                </tr>
            </tbody>
        </table>



    </div>
</div>
@endif

@stop
@section('style')
<style>
    #tieu_de {
        background-color: rgba(0, 60, 0, 0.9);
        color: white;
        font-family: 'Times New Roman', Times, serif;
    }
</style>
@stop
