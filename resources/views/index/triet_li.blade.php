@extends('master.view_ad')
@section('de','Feedback')
@section('main')
<h3 style="font-family: roboto;">Feedback</h3>
<hr>
<div class="container" style="background-color: wheat; padding: 10px;">
    <div class="row">
        @foreach($tl as $f)
        <div class="col-md-4" >
            <div class="card text-left"style="background-color: white; border-radius: 10px; padding: 10px;">
              
              <div class="card-body">
                <h4 class="card-title text-align: center;">Triết lí:<b style="font-family: thanh; font-size: 24px;"> {{$f->write}}</b></h4>
                <p class="card-text">Người viết: {{$f->user_name}}</p>
                
                
              </div>
            </div>
        </div>
        @endforeach

    </div>
    <div class="triet">
    <form action="" method="post" >
      @csrf
      <input type="text" placeholder="Nội dung triết học" name="write"><br>
      <small class="error">@error('write'){{$message}}@enderror</small><br>
      <input type="text" placeholder="Tác giả" name="user_name"><br>
      <small class="error">@error('user_name'){{$message}}@enderror</small><br>
  <button type="submit" style="margin: 1em;" class="btn btn-success">Bắn lên</button>
    </form>
    </div>
</div>
@stop()
@section('style')
<style>
  .triet input{
    width: 350px;
    height: 45px;
    margin-top: 1em;
    border: none;
    border-bottom: 3px solid black;
    padding: 10px;
    background-color: rgba(0, 0, 0, 0);
    color: black;
  }
</style>
@stop