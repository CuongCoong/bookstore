@extends('master.view_ad')
@section('de',' Danh Sách')
@section('main')
<legend style="text-align: center;">Cập Nhật Thể Loại {{$dm->name}}</legend><hr>


<form action="" method="POST" role="form">
    @csrf

    <div class="form-group">
        <label for="">Tên Thể Loại</label>
        <input type="text" class="form-control" value="{{$dm->name}}" name="name" placeholder="Đừng Trùng Nhé">
    </div>
    <div class="form-group">
        <label for="">Độ tuổi:</label><br>
        <label for=""><input type="radio" name="age" value="4" {{ $dm->age == 4 ? 'checked' : '' }} >4+</label><br>
        <label for=""><input type="radio" name="age" value="12" {{ $dm->age == 12 ? 'checked' : '' }}>12+</label><br>
        <label for=""><input type="radio" name="age" value="16" {{ $dm->age == 16 ? 'checked' : '' }}>16+</label>
        
    </div>

    

    <button type="submit" class="btn btn-success">Sửa</button>
</form>

@stop
