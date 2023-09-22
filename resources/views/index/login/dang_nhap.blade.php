<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>Thánh Thơ 4.0 | Đăng nhập</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="{{url('nhung/ngoai')}}/images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    
    <link rel="stylesheet" href="{{url('nhung')}}/toast/dist/jquery.toast.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{url('nhung/ngoai')}}///fonts.googleapis.com/css?family=Poppins:300,400,500">
    <link rel="stylesheet" href="{{url('nhung/ngoai')}}/css/bootstrap.css">
    <link rel="stylesheet" href="{{url('nhung/ngoai')}}/css/fonts.css">
    <link rel="stylesheet" href="{{url('nhung/ngoai')}}/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <style>
        /* Đặt màu chủ đạo */
        :root {
            --foot-color: #2681d9;
            --error-color: #e74c3c;
        }

        @font-face {
            font-family: 'thanh';
            src: url(<?php url('font/thanh/thanh-dam.ttf')?>);
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            background-image: linear-gradient(120deg, #3ca7ee, #9b408f);
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }

        .container {
            width: 400px;
            border: none;
            border-radius: 10px;
            background-color: white;
            padding: 40px;

        }

        .container * {
            margin-top: 10px;
        }

        h1 {
            font-family: monospace;
            font-size: 32px;
            text-align: center;
        }

        .form-make {
        
            width: 100%;
        }

        .form-make input {
            width: 100%;
            border: none;
            border-bottom: solid 2px;
            padding: 5px;
            height: 40px;
        }
        .form-make input:focus{
            border-bottom: var(--foot-color) 2px solid;
            transition: 0.5s;
        }
        .error{
            font-weight: bolder;
            color: #e74c3c;
        }
        a{
            font-weight: bolder;
        }
        button{
            width: 100%;
            border: 2px solid;
            border-radius: 10px;
            height: 50px;
            font-size: 18px;
            background-color: #3ca7ee;
            color: white;
            

        }
        button:hover{
            background-color: #2681d9;
        }
       
    </style>
    <!--[if lt IE 10] >
    
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
        <h1>Đăng nhập</h1>
        <div class="form-make">
            <form action="" method="post">
                @csrf
                <input type="text" name="email" placeholder="Nhập email hoặc số điện thoại">
                <small class="error">@error('email'){{$message}}@enderror</small>
                
                <input type="password" name="password" placeholder="Nhập mật khẩu">
                <small class="error">@error('password'){{$message}}@enderror</small>

            
                <input type="checkbox" name="remember" id="" style="height: 15px;width: 15px;"> <label for="">Ghi nhớ lần này!</label>
        
                <p>
                <a href="{{route('home.dang_ki')}}">Bạn chưa có tài khoản?</a></p>
                <button type="submit" >Đăng nhập</button >
            </form>
        </div>
    </div>




    <!-- Global Mailform Output-->

    <div class="snackbars" id="form-output-global"></div>
</body>

<!-- Javascript-->
<script src="{{url('nhung/ngoai')}}/js/core.min.js"></script>
<script src="{{url('nhung/ngoai')}}/js/script.js"></script>
<script src="{{url('nhung')}}/toast/dist/jquery.toast.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
<!-- coded by Ragnar-->
<script src="{{url('nhung')}}/toast/dist/jquery.toast.min.js"></script>
  @if(Session::has('yes'))
  <script>

    $.toast({
      heading:'Thông báo',
      text:'{{Session::get("yes")}}',

      position:'top-center',
      icon:'success'
    })
  </script>
  @endif

  @if(Session::has('no'))
  <script>
    $.toast({
      heading:'Cảnh báo',
      text:'{{Session::get("no")}}',
      position:'top-center',
      icon:'error'
    })
  </script>
  @endif
</html>