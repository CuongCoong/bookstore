@extends('master.view_ad')
@section('de',' Danh Sách')
@section('main')
<legend style="text-align: center;">Danh Sách Thể Loại</legend><hr>




<form action="" method="get" role="form">
    

    <div class="form-group">
        
        <input type="text" value="{{$key}}" name="key" placeholder="Tìm kiếm...." style="height: 30px; border: solid;">
        <button type="submit" class="btn btn-primary" >Tìm ngay</button>
    </div>

    

    
</form><hr>

<a href="{{route('dm.them')}}" class="btn btn-success">Thêm <i class="fa fa-plus" aria-hidden="true"></i></a>


<table class="table">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Thể Loại</th>
            <th>Độ Tuổi</th>
            <th>Ngày Thêm</th>
            <th>Ngày Sửa</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $dm)
        <tr>
            <td>{{$dm->id}}</td>
            <td>{{$dm->name}}</td>
            <td>{{$dm->age}}</td>
            <td>{{$dm->created_at}}</td>
            <td>{{$dm->updated_at}}</td>
            <td>
            <a href="{{route('dm.sua',$dm->id)}}" class="btn btn-warning">Sửa</a>
            <a href="{{route('dm.xoa',$dm->id)}}" class="btn btn-danger" onclick="return confirm('Bạn muốn xóa chứ ?')">Xóa</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$data->links()}}
@stop
