@extends('master.view_ad')
@section('de','Thêm Sản Phẩm')
@section('style')
<link rel="stylesheet" href="{{url('nhung')}}/summer/summernote.min.css">
@stop
@section('main')

<form action="" method="POST" role="form" enctype="multipart/form-data">
    @csrf
    <legend>Bạn đang sửa sách: {{$sp->name}}</legend>

    <div class="form-group">
        <label for="">Tên Sách</label>
        <input type="text" class="form-control" name="name" value="{{old('name') ? old('name') : $sp->name}}" placeholder="Tên Sách">
        <small class="error">@error('name'){{$message}}@enderror</small>
    </div>
    <div class="form-group">
        <label for="">Thể Loại</label>
        <select name="category_id" id="">
            <option value="">Chọn Một</option>
            @foreach($danh_muc as $dm)
            <option value="{{$dm->id}}" {{ $dm->id == $sp->category_id  ? 'selected' : '' }}>{{$dm->name}}</option>
            @endforeach
        </select>
        <small class="error">@error('category_id'){{$message}}@enderror</small>
    </div>
    <div class="form-group">
        <label for="">Giá</label>
        <input type="number" class="form-control" value="{{old('price') ? old('price') : $sp->price}}" name="price" placeholder="giá">
        <small class="error">@error('price'){{$message}}@enderror</small>
    </div>
    <div class="form-group">
        <label for="">Giá khuyến mãi</label>
        <input type="number" class="form-control" value="{{old('sale_price') ? old('sale_price') : $sp->sale_price}}" name="sale_price" placeholder="Giá khuyến mãi(Có thể bỏ trống)">
        <small class="error">@error('sale_price'){{$message}}@enderror</small>
    </div>

    <div class="form-group">
        <label for="">Kích Cỡ:</label><br>
        <select name="size_id" id="">
            <option value="">Chọn Một</option>
            @foreach($kich_co as $kc)
            <option value="{{$kc->id}}" {{$kc->id == $sp->size_id ? 'selected': '' }}>{{$kc->width}}(cm) x {{$kc->length}}(cm)</option>
            @endforeach
        </select>
        <small class="error">@error('size_id'){{$message}}@enderror</small>
    </div>
    <div class="form-group">
        <div><img src="{{url('anh_san_pham')}}/{{$sp->avatar}}" style="width: 150px;" alt="">
            <p>(ảnh cũ)</p>
        </div>
        <label for="">Chọn Ảnh</label>
        <input type="file" class="form-control" name="avatar">
        <small class="error">@error('avatar'){{$message}}@enderror</small>
    </div>
    <div class="form-group">
        <label for="">Mô tả</label>
        <textarea name="describe" class="note" cols="30" rows="10" class="form-control">{{old('describe')?old('describe'):$sp->describe}}</textarea>
        <small class="error">@error('describe'){{$message}}@enderror</small>
    </div>




    <button type="submit" class="btn btn-warning" onclick="return confirm('Bạn muốn cập nhật ngay???')">Cập Nhật</button>
</form>

@stop
@section('js')
<script src="{{url('nhung')}}/summer/summernote.min.js"></script>
<script>
    $('.note').summernote({
        height:250,
    });
</script>
@stop
