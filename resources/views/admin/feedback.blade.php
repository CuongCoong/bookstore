@extends('master.view_ad')
@section('de','Feedback')
@section('main')
<h3 style="font-family: roboto;">Feedback</h3>
<hr>
<div class="container" style="background-color: wheat; padding: 10px;">
    <div class="row">
        @foreach($fb as $f)
        <div class="col-md-4" >
            <div class="card text-left"style="background-color: white; border-radius: 10px; padding: 10px;">
              
              <div class="card-body">
                <h4 class="card-title">Người gửi: {{$f->name}}</h4>
                <p class="card-text">email: {{$f->email}}</p>
                <p class="card-text">Số điện thoại: {{$f->phone}}</p>
                <div>
                <p class="card-text">Lời nhắn: {{$f->content}}</p>
                </div>
                <a href="{{route('xoa.feedback',$f->id)}}" class="btn btn-danger">Đã đọc</a>
              </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop()