@extends('master.view_ad')
@section('de','Đơn Hàng')
@section('main')
<h3 style="font-family: 'roboto'; text-align: center; background-color: green; padding: 5px; color: wheat;">Quản lí đơn hàng</h3>
<hr>
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Mã đơn</th>
            <th>Tên khách hàng</th>
            <th>Ngày đặt</th>
            <th>Tình trạng</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($order as $o)
        @if($o->status==0)
            <tr>
                <td scope="row">{{$o->id}}</td>
                @foreach($customer as $cus)
                @if($cus->id == $o->customer_id)
                <td>{{$cus->name}}</td>
                @endif
                @endforeach
                <td>{{$o->created_at->format('d/m/Y')}}</td>
                <td> @if ($o->status==0){{ 'Chờ xác nhận'}} @elseif ($o->status==1) {{'Chờ lấy hàng'}} @elseif ($o->status==2) {{'Đang giao'}} @else {{'Đã giao hàng'}} @endif </td>
                <td><a href="{{route('don_hang_ad.info',$o->id)}}" class="btn btn-warning"><i class="fas fa-eye fa-sm  "></i></a></td>
            </tr>
            @endif
            @endforeach
            @foreach($order as $o)
        @if($o->status==1)
            <tr>
                <td scope="row">{{$o->id}}</td>
                @foreach($customer as $cus)
                @if($cus->id == $o->customer_id)
                <td>{{$cus->name}}</td>
                @endif
                @endforeach
                <td>{{$o->created_at->format('d/m/Y')}}</td>
                <td> @if ($o->status==0){{ 'Chờ xác nhận'}} @elseif ($o->status==1) {{'Chờ lấy hàng'}} @elseif ($o->status==2) {{'Đang giao'}} @else {{'Đã giao hàng'}} @endif </td>
                <td><a href="{{route('don_hang_ad.info',$o->id)}}" class="btn btn-warning"><i class="fas fa-eye fa-sm  "></i></a></td>
            </tr>
            @endif
            @endforeach
            @foreach($order as $o)
        @if($o->status==2)
            <tr>
                <td scope="row">{{$o->id}}</td>
                @foreach($customer as $cus)
                @if($cus->id == $o->customer_id)
                <td>{{$cus->name}}</td>
                @endif
                @endforeach
                <td>{{$o->created_at->format('d/m/Y')}}</td>
                <td> @if ($o->status==0){{ 'Chờ xác nhận'}} @elseif ($o->status==1) {{'Chờ lấy hàng'}} @elseif ($o->status==2) {{'Đang giao'}} @else {{'Đã giao hàng'}} @endif </td>
                <td><a href="{{route('don_hang_ad.info',$o->id)}}" class="btn btn-warning"><i class="fas fa-eye fa-sm  "></i></a></td>
            </tr>
            @endif
            @endforeach
            @foreach($order as $o)
        @if($o->status==3)
            <tr>
                <td scope="row">{{$o->id}}</td>
                @foreach($customer as $cus)
                @if($cus->id == $o->customer_id)
                <td>{{$cus->name}}</td>
                @endif
                @endforeach
                <td>{{$o->created_at->format('d/m/Y')}}</td>
                <td> @if ($o->status==0){{ 'Chờ xác nhận'}} @elseif ($o->status==1) {{'Chờ lấy hàng'}} @elseif ($o->status==2) {{'Đang giao'}} @else {{'Đã giao hàng'}} @endif </td>
                <td><a href="{{route('don_hang_ad.info',$o->id)}}" class="btn btn-warning"><i class="fas fa-eye fa-sm  "></i></a></td>
            </tr>
            @endif
            @endforeach
        </tbody>
</table>
@stop