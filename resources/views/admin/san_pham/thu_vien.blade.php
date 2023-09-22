@extends('master.view_ad')
@section('de',' Thư VIện')
@section('main')
<legend style="text-align: center;">Chào mừng bạn đến với Thư Viện</legend>
<hr>
<form action="" method="get" role="form">
    

    <div class="form-group">
        
        <input type="text" value="{{$key}}" name="key" placeholder="Tìm kiếm...." style="height: 30px; border: solid;">
        <button type="submit" class="btn btn-primary" >Tìm ngay</button>
    </div>

    

    
</form><hr>


<a href="{{route('sp.them')}}" class="btn btn-success">Thêm sách <i class="fa fa-plus" aria-hidden="true"></i></a>
@if(Session::has('yes'))

<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('yes')}}
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
      
            <th>Mã</th>
            <th>Tên Sách</th>
            <th>Thể Loại</th>
            <th>Giá</th>
            <th>Giá khuyến mãi</th>
            <th>Kích Cỡ</th>
            <th>Ảnh</th>
            <th>Mô Tả</th>
            <th>Ngày Thêm</th>
            <th>Ngày Sửa</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        
            @foreach($data as $sp)
            <tr>
                <td scope="row">{{$sp->id}}</td>
                <td>{{$sp->name}}</td>
                @foreach($dm as $d)
                @if($d->id ==$sp->category_id)
                <td>{{$d->name}}</td>
                @endif
                @endforeach
                <td>{{$sp->price}}</td>
                <td>{{$sp->sale_price?$sp->sale_price:'Không có khuyến mãi'}}</td>
                @foreach($kich_co as $kc)
                @if($kc->id ==$sp->size_id)
                <td>{{$kc->width}}(cm) x {{$kc->width}}(cm)</td>
                @endif
                @endforeach
                <td><img src="{{url('anh_san_pham')}}/{{$sp->avatar}}" style="width: 125px;" alt=""></td>
                <td>{!! $sp->describe !!}</td>
                <td>{{$sp->created_at->format('d/m/Y')}}</td>
            <td>{{$sp->updated_at->format('d/m/Y')}}</td>
            <td>
                <a href="{{route('sp.sua',$sp->id)}}" class="btn btn-warning">Sửa</a>
                <a href="{{route('sp.xoa',$sp->id)}}" class="btn btn-danger" onclick="return confirm('Bạn muốn xóa chứ ?')">Xóa</a>
            </td>
            </tr>
            @endforeach
        </tbody>
</table>
</div>
    </div>
</div>
{{$data->links()}}
@stop




           