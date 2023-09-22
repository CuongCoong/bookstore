@extends('master.view_ad')
@section('de',' Danh Sách')
@section('main')
<legend style="text-align: center;">Danh Sách Thể Loại</legend><hr>
<a href="{{route('dm.danh_sach')}}" class="btn btn-success">Danh Sách </a>

<form action="" method="POST" role="form">
    @csrf

    <div class="form-group">
        <label for="">Tên Thể Loại</label>
        <input type="text" class="form-control" name="name" placeholder="Đừng Trùng Nhé">
        <small style="background-color: red; color:aliceblue; font-family: monospace;"> @error('the_loai') {{ $message}} @enderror</small>
    </div>
    <div class="form-group">
        <label for="">Độ tuổi:</label><br>
        <label for=""><input type="radio" name="age" value="4" checked>4+</label><br>
        <label for=""><input type="radio" name="age" value="12">12+</label><br>
        <label for=""><input type="radio" name="age" value="16">16+</label>
        
    </div>

    

    <button type="submit" class="btn btn-primary">Thêm</button>
</form>

@stop
