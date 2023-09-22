@extends('master.view_ad')
@section('de',' Danh Sách')
@section('main')
<legend style="text-align: center;">Quản Lý kích thước</legend><hr>
<a href="{{route('kc.danh_sach')}}" class="btn btn-success">Danh Sách </a><hr>

<form action="" method="POST" role="form">
    @csrf

    <div class="form-group">
    <label for="">Chiều dài</label><br>
    <input type="number" name="length">(cm)<br>
    <small class="error">@error('length'){{$message}}@enderror</small>
    </div>
    
    <div class="form-group">
        <label for="">Chiều rộng</label><br>
        <input type="number" name="width">(cm)<br>
        <small class="error">@error('width'){{$message}}@enderror</small>

    </div>
 



    

    <button type="submit" class="btn btn-primary">Thêm</button>
</form>

@stop
