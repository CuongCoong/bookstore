@extends('master.view_ad')
@section('de',' Danh Sách')
@section('main')
<legend style="text-align: center;">Quản lí kích thước</legend><hr>
<a href="{{route('kc.them')}}" class="btn btn-success">Thêm <i class="fa fa-plus" aria-hidden="true"></i></a>

<table class="table">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Chiều dài</th>
            <th>Chiều rộng</th>
           
            <th>Ngày thêm</th>
           
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $kc)
        <tr>
            <td>{{$kc->id}}</td>
            <td>{{$kc->length}} cm</td>
            <td>{{$kc->width}} cm</td>
           
            <td>{{$kc->created_at}}</td>
           
            <td>
  
            <a href="{{ route('kc.xoa',$kc->id)}}" class="btn btn-danger">Xóa</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$data->links()}}
@stop
