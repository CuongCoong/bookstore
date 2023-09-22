@extends('master.view_ad')
@section('de','Thêm Sản Phẩm')
@section('style')
<link rel="stylesheet" href="{{url('nhung')}}/summer/summernote.min.css">
@stop
@section('main')

<form action="" method="POST" role="form" enctype="multipart/form-data">
    @csrf
    <legend>Điền thông tin sách bạn cần đăng!</legend>

    <div class="form-group">
        <label for="">Tên Sách</label>
        <input type="text" class="form-control" value="{{old('name')?old('name'):''}}" name="name" placeholder="Tên Sách">
        <small class="error">@error('name'){{$message}}@enderror</small>

    </div>
    <div class="form-group">
        <label for="">Thể Loại</label>
        <select name="category_id" id="">
            <option value="">Chọn Một</option>
            @foreach($danh_muc as $dm)
            <option value="{{$dm->id}}">{{$dm->name}}</option>
            @endforeach
        </select>
        <small class="error">@error('category_id'){{$message}}@enderror</small>

    </div>
    <div class="form-group">
        <label for="">Giá</label>
        <input type="number" class="form-control" value="{{old('price')?old('price'):''}}" name="price" placeholder="Giá">
        <small class="error">@error('number'){{$message}}@enderror</small>

    </div>
    <div class="form-group">
        <label for="">Giá khuyến mãi: </label>
        <input type="number" class="form-control" name="sale_price" value="{{old('sale_price')?old('sale_price'):''}}" placeholder="Giá khuyến mãi(nếu có)">
        <small class="error">@error('sale_price'){{$message}}@enderror</small>

    </div>
    <div class="form-group">
        <label for="">Kích Cỡ:</label>
        <select name="size_id" id="">
            <option value="">Chọn Một</option>
            @foreach($kich_co as $kc)
            <option value="{{$kc->id}}"> {{$kc->width}}(cm) x {{$kc->length}}(cm)</option>
            @endforeach
        </select>
        <small class="error">@error('size_id'){{$message}}@enderror</small>

    </div>
    <div class="form-group">
        <label for="">Chọn Ảnh</label>
        <input type="file" class="form-control" name="avatar" placeholder="Đắt quá là không ai mua">
        <small class="error">@error('avatar'){{$message}}@enderror</small>

    </div>
    <div class="form-group">
        <label for="">Mô tả</label>
        <textarea name="describe" class="note" id="" cols="30" rows="10" class="form-control">{{old('describe')?old('describe'):''}}</textarea>
        <small class="error">@error('describe'){{$message}}@enderror</small>
    </div>
    <div class="form-group">
        <label for="">Ảnh khác</label>
        <input type="file" class="form-control" name="image[]" multiple placeholder="Đắt quá là không ai mua">
        <small class="error">@error('image[]'){{$message}}@enderror</small>
    </div>




    <button type="submit" class="btn btn-primary">Thêm Ngay</button>
</form>

@stop
@section('js')
<script src="{{url('nhung')}}/summer/summernote.min.js"></script>
<script>
    $('.note').summernote({
        height: 250,
    });
</script>
@stop