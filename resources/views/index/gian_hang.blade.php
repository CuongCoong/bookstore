@extends('master.shop')
@section('tittle','Gian Hàng')
@section('main')
<x-banner />
<h3 style="background-color: rgba(0, 94, 0, 0.9);">Gian hàng</h3>
<div class="container" style="margin-bottom: 50px;">
  <div class="row">
  @foreach($san_pham_global as $sp)
    <div class="col-md-3">
      <div class="card text-left" style="margin-top: 15px; border-radius: 10px; height: 550px;" >
        <img class="card-img-top" src="{{url('anh_san_pham')}}/{{$sp->avatar}}" style="height: 350px;" alt="">
        <div class="card-body">
          <a href="{{route('index.thong_tin',$sp->id)}}" class="card-title"><h4 class="ten" style="font-family: thanh;">{{Str::words($sp->name,4)}}</h4></a>
          <div>
            
         
          @if($sp->sale_price)
          @foreach($dm_global as $dm)
          @if($dm->id == $sp->category_id)
          <p style="font-size: 18px;"><b>{{$dm->name }}</b></p>
          @endif
          @endforeach
          <del style="font-weight: bolder; color: red;">Giá gốc: {{number_format($sp->price)}}đ</del>
          <small style="color: red;"><b>Giảm: {{100-ceil(($sp->sale_price/ $sp->price)*100)}}%</b></small>
          <p style="font-size: 18px;">Giá khuyến mãi: {{number_format($sp->sale_price)}}đ </p>
          @else
          @foreach($dm_global as $dm)
          @if($dm->id == $sp->category_id)
          <p style="font-size: 18px;"><b>{{$dm->name }}</b></p>
          @endif
          @endforeach
          <p style="font-size: 18px;">Giá bán: {{number_format($sp->price)}}đ</p>

          @endif
          </div>
          
          <a class=" button-sm button-secondary them_gio" style="width: 150px;" href="{{route('gio_hang.them',$sp->id)}}">Thêm vào giỏ</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  
</div>
{{$san_pham_global->links()}}
<br><br>
@stop
@section('style')
<style>
  .ten:hover{
    scale: 1.1;
    font-weight: bolder;
    color: green;
  }
</style>
@stop