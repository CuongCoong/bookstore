@extends('master.view_ad')

@section('de','Quản lí banner')
@section('main')
<h2>Hãy cùng sáng tạo banner nào!</h2>
<hr>
<table class="table">
    <thead>
        <tr>
            <th>Banner</th>
            <th>Ngày Thêm</th>
     <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($banner as $ban)
        <tr>
            <div><td scope="row"><a href="{{url('banner')}}/{{$ban->name_banner}}" data-lightbox="banner"><img src="{{url('banner')}}/{{$ban->name_banner}}" alt="" style="width: 300px; height: 200px;"></a></div>
            <td>{{$ban->created_at}}</td>
            <td><a href="{{route('banner.xoa',$ban->id)}}" class="nhan btn btn-danger">Xóa</a></td>
            
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
<h3>Bạn muốn thêm Banner???</h3>
<form action="" method="POST" role="form" enctype="multipart/form-data">
   

    <div class="form-group">
        @csrf
        <input type="file" class="form-control" name="banner" placeholder="Input field">
       <span class="error"> @error('banner') {{ $message}} @enderror</span>
    </div>

    

    <button type="submit" class="btn btn-primary">Tải lên</button>
</form>


@stop
