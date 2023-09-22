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

        .map {
            height: 900px;
            background-image: linear-gradient(200deg, #3ca7ee, #9b408f);
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
            border: none;
            border-bottom: var(--foot-color) 3px solid;
            transition: 0.5s;
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
        .error{
            font-weight: bolder;
            color: #e74c3c;
        }
       
    </style>
    <!--[if lt IE 10] >
    
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="map">
    <div class="container">
        <h1>Đăng kí</h1>
        <div class="form-make">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" placeholder="Tên của bạn">
                <small class="error">@error('conamenten'){{$message}}@enderror</small>
                <input type="number" name="phone" placeholder="Số điện thoại">
                <small class="error">@error('phone'){{$message}}@enderror</small>
                <input type="email" name="email" placeholder="Nhập email">
                <small class="error">@error('email'){{$message}}@enderror</small>
                
                <input type="password" name="password" placeholder="Nhập mật khẩu">
                <small class="error">@error('password'){{$message}}@enderror</small>
                <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu">        
                <small class="error">@error('password_confirmation'){{$message}}@enderror</small>
                <label for="">Địa chỉ:</label><br>
                <textarea name="address" id="" cols="30" rows="10"></textarea><br>
                <small class="error">@error('address'){{$message}}@enderror</small>
                <label for="">Ảnh đại diện:</label>
                <input type="file" name="avatar">
                 <small class="avatar">@error('conten'){{$message}}@enderror</small>
                <button type="submit" >Đăng kí</button >
            </form>
        </div>
    </div>




    <!-- Global Mailform Output-->

    <div class="snackbars" id="form-output-global"></div>
    </div>
</body>

<!-- Javascript-->
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