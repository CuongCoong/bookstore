@extends('master.view_ad')
@section('de','Quản lí đơn')
@section('main')
<h3 style="font-family: 'roboto'; text-align: center; background-color: green; padding: 5px; color: wheat;">Quản lí đơn hàng</h3>
<hr>
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Tên sách</th>
            <th>Ảnh</th>
            <th>Đơn Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php $m = 0; ?>
        @foreach($detail as $de)
        @if($de->order_id ==$don->id)
        <tr>
        
            @foreach($prod as $sp)
            @if($sp->id == $de->product_id)
            <td>{{$sp->name}}</td>
            <td><img src="{{url('anh_san_pham')}}/{{$sp->avatar}}" style="width: 145px;" alt=""></td>

            
            @endif
            @endforeach
            <td>{{number_format($de->price) }} vnđ</td>
            <td>{{$de->quantity}}</td>
            <td>{{number_format($de->price * $de->quantity)}} vnđ</td>
            <?php $m += $de->price * $de->quantity ?>
        </tr>
       @endif
        @endforeach
        <tr>
            <td>
                <h3 style="font-family: monospace;">Thanh toán: {{number_format($m) }} vnđ</h3>
                <h3 style="font-family: monospace;">Tình trạng: @if ($don->status==0){{ 'Chờ xác nhận'}} @elseif ($don->status==1) {{'Chờ lấy hàng'}} @elseif ($don->status==2) {{'Đang giao'}} @else {{'Đã giao hàng'}} @endif </h3>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td>@if($don->status==0)
                <form action="{{route('xac_nhan',$don->id)}}" method="post">
                    @csrf @method('PUT')
                    <input type="hidden" name="status" value="1">
                    <button type="submit" class="btn btn-warning">Xác nhận</button>

                </form>

                @endif
                @if($don->status==1)
                <form action="{{route('xac_nhan',$don->id)}}" method="post">
                    @csrf @method('PUT')
                    <input type="hidden" name="status" value="2">
                    <button type="submit" class="btn btn-success">Đang giao</button>

                </form>

                @endif
                @if($don->status==2)
                <form action="{{route('xac_nhan',$don->id)}}" method="post">
                    @csrf @method('PUT')
                    <input type="hidden" name="status" value="3">
                    <button type="submit" class="btn btn-success">Khách đã nhận hàng</button>

                </form>

                @endif



            </td>
        </tr>

    </tbody>
</table>
@stop