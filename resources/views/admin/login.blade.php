<!doctype html>
<html lang="en">
  <head>
    <title>Đăng Nhập</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <style>
    .bao{
        background-color: rgba(113, 214, 229, 0.6);
        height: 800px;
        font-family: monospace;
        
    }
    .login{
        
        width: 450px;
        border: solid;
        background-color: antiquewhite;
        height: 400px;
    margin: auto;
    position: relative;
    top: 20%;
    border-radius: 49px;
    padding: 30px;

    }
    .email .pass label{
        text-align: left;
    }
    legend{
        text-align: center;
    }
     .info{
        margin-left: 20px;
        width: 300px;
        height: 40px;
        border: solid;
        border-radius: 15px;
        padding: 10px;
       
    }
    .pass , .email{
        margin-top: 15px;
    }
    .check{
        margin-top: 15px;
    }
    button{
        margin-left: 30px;
        width: 325px;
        height: 40px;
        border-radius: 30px;
        background-color: blueviolet;
    color: aliceblue;
    }
    button:hover {
        background-color: red;
    }

  </style>
  <body>
   
    
    




    <div class="bao" style="background-size: cover; ;">
    @if(Session::has('yes'))
    
    
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{Session::get('yes')}}
    </div>
    @endif
        <div class="login" >
      <form action="" method="post">
        @csrf 
        <legend>Xuất Trình Giấy Tờ Nào!</legend>
        <div class="email">
            <label for="">Email:</label><br>
        <input type="email" name="email" class="info" placeholder="Nhập email"></div>
        <div class="pass">
        <label for="">Mật Khẩu:</label><br>
        <input type="password" name="password" class="info" placeholder="Có nhớ không đấy!">
        </div>
        <div class="check">
            <input type="checkbox" name="remember" id=""><label for="" style="margin-left:5px ;">Ghi Nhớ Lần Sau</label>
        </div>
        <div class="button"> <button type="submit">Đăng Nhập</button></div>
        

      </form>
    </div></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>