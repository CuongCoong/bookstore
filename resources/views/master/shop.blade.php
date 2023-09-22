<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Olympus Unity | @yield('tittle')</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="{{url('logo/logoOU.png')}}" type="image/x-icon">
  <!-- Stylesheets-->
  <link rel="stylesheet" href="{{url('nhung')}}/toast/dist/jquery.toast.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{url('nhung/ngoai')}}///fonts.googleapis.com/css?family=Poppins:300,400,500">
  <link rel="stylesheet" href="{{url('nhung/ngoai')}}/css/bootstrap.css">
  <link rel="stylesheet" href="{{url('nhung/ngoai')}}/css/fonts.css">
  <link rel="stylesheet" href="{{url('nhung/ngoai')}}/css/style.css">
  <link rel="stylesheet" href="{{url('nhung/nivo-slider')}}/nivo-slider.css">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
  <link rel="stylesheet" href="{{url('nhung')}}/LightBox/css/lightbox.min.css">
  @yield('style')
  <style>
     .error{
            font-weight: bolder;
            color: #e74c3c;
        }
    @font-face {
      font-family: 'thanh';
      src: url(<?php echo url('font/thanh/thanh-dam.ttf')?>);
      
      
    }
    @font-face {
        font-family: 'roboto';
        src: url(<?php echo url('font/roboto/Roboto-Medium.ttf')?>);

      }
      @font-face {
        font-family: 'ki';
        src: url(<?php echo url('font/rethinker/ki.ttf')?>);

      }
  </style>
  <!--[if lt IE 10]>
    
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
</head>

<body>
  <div id="web">
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container"><span></span><span></span><span></span><span></span>
        </div>
      </div>
    </div>
    <div class="page">
      <!-- Page Header-->
      <header class="section page-header">

        <!-- RD Navbar-->
        <div class="rd-navbar-wrap rd-navbar-modern-wrap">
          <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="70px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand"><a class="brand" href="index.html"><img src="{{url('logo/logoOU1.png')}}" alt="" width="196" height="47" /></a></div>
                </div>
                <div class="rd-navbar-main-element">
                  <div class="rd-navbar-nav-wrap">
                    <!--Giỏ hàng-->

                    <div class="rd-navbar-basket-wrap ">

                      <button class="rd-navbar-basket fl-bigmug-line-shopping198" data-rd-navbar-toggle=".cart-inline"><span id="tong_so_luong">
                          {{$gio_hang->tong_so_luong >99 ? '99+': $gio_hang->tong_so_luong }}
                        </span></button>
                      <div class="cart-inline ">
                        <div class="cart-inline-header" id="tinh_toan">

                          <h5 class="cart-inline-title counter-creative">Trong giỏ:<span> {{$gio_hang->tong_so_luong}}</span> cuốn sách</h5>
                          <h6 class="cart-inline-title counter-creative">Tổng tiền:<span> {{number_format($gio_hang->tong_tien)}} vnđ</span></h6>
                        </div>

                        <div class="cart-inline-footer ">
                          <div class="group-sm"><a class="button button-md button-default-outline-2 button-wapasha" href="{{route('gio_hang.thong_tin')}}">Đến giỏ hàng</a><a class="button button-md button-primary button-pipaluk" href="{{route('dat_hang.thanh_toan')}}">Thanh toán</a></div>
                        </div>
                        <div class="cart-inline-body" id="in">
                          @foreach($gio_hang->gio_hang as $gio)
                          <div class="cart-inline-item">
                            <div class="unit align-items-center">
                              <div class="unit-left"><a class="cart-inline-figure" href="{{url('anh_san_pham')}}/{{$gio['anh']}}"><img src="{{url('anh_san_pham')}}/{{$gio['anh']}}" alt="" style="width: 80px; height: 60px;" /></a></div>
                              <div class="unit-body">
                                <h6 class="cart-inline-name"><a href="{{route('index.thong_tin',$gio['id'])}}">{{$gio['ten_sach']}}</a></h6>
                                <div>
                                  <div class="group-xs group-inline-middle">
                                    <div class="table-cart-stepper">
                                      <form action="{{route('gio_hang.sua',$gio['id'])}}" method="get">
                                        <button type="button" data-href="{{route('gio_hang.sua',$gio['id'])}}" data-id="{{$gio['id']}}" class="cap_nhat" style="width: 200px;"><span><input style="z-index: 1000;" class="form-input so_luong-{{$gio['id']}}" type="number" data-zeros="true" name="so_luong" value="{{$gio['so_luong']}}" min="1" max="1000"></span></button>
                                      </form>

                                    </div><br>
                                    <h6 class="cart-inline-title">Đơn giá: {{number_format($gio['gia'])}} vnđ</h6>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          @endforeach
                        </div>

                      </div>
                      <a class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping198" href="#"><span>{{$gio_hang->tong_so_luong}}</span></a>
                    </div>

                    <!-- RD Navbar Search-->
                    <div class="rd-navbar-search">
                      <button class="rd-navbar-search-toggle" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                      <form class="rd-search" action="{{route('search')}}" method="get">
                        <div class="form-wrap">
                          <label class="form-label" for="rd-navbar-search-form-input">Tìm kiếm...</label>
                          <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="key">
                          <button class="rd-search-form-submit fl-bigmug-line-search74" type="submit"></button>
                        </div>
                      </form>
                    </div>
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item " id="1"><a class="rd-nav-link" href="{{route('index')}}">Trang Chủ</a>
                      </li>
                      <li class="rd-nav-item" id="2"><a class="rd-nav-link" href="{{route('gian_hang')}}">Gian Hàng</a>
                      </li>
                      <li class="rd-nav-item" id="3"><a class="rd-nav-link" href="{{route('index.forum')}}">Trao Đổi</a>
                      </li>
                      <li class="rd-nav-item" id="4"><a class="rd-nav-link" href="{{route('feedback')}}">Liên Hệ</a>
                      </li>
                    </ul>
                  </div>
                  <div class="rd-navbar-project-hamburger" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate>
                    <div class="project-hamburger"><span class="project-hamburger-arrow-top"></span><span class="project-hamburger-arrow-center"></span><span class="project-hamburger-arrow-bottom"></span></div>
                    <div class="project-hamburger-2"><span class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span>
                    </div>
                    <div class="project-close"><span></span><span></span></div>
                  </div>
                </div>
                <div class="rd-navbar-project rd-navbar-modern-project">
                  <div class="rd-navbar-project-modern-header">
                    <h4 class="rd-navbar-project-modern-title">Thông tin tài khoản</h4>
                    <div class="rd-navbar-project-hamburger" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate>
                      <div class="project-close"><span></span><span></span></div>
                    </div>
                  </div>
                  <div class="rd-navbar-project-content rd-navbar-modern-project-content">
                    @if(auth('cus')->check())

                    <div>

                      <div class="heading-6 subtitle">{{auth('cus')->user()->name}}</div>
                      <div class="row row-10 gutters-10">
                        <div class="col-12"><img src="{{url('avatar')}}/{{auth('cus')->user()->avatar}}" alt="" width="394" height="255" />
                        </div>
                      </div>
                      <ul class="rd-navbar-modern-contacts">
                        <li>
                          <div class="unit unit-spacing-sm">
                            <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                            <div class="unit-body"><a class="link-phone" href="tel:{{auth('cus')->user()->phone}}">{{auth('cus')->user()->phone}}</a></div>
                          </div>
                        </li>
                        <li>
                          <div class="unit unit-spacing-sm">
                            <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                            <div class="unit-body"><a class="link-location"><b>{{auth('cus')->user()->address}}</b></a></div>
                          </div>
                        </li>
                        <li>
                          <div class="unit unit-spacing-sm">
                            <div class="unit-left"><span class="icon fa fa-envelope"></span></div>
                            <div class="unit-body"><a class="link-email" href="mailto:{{auth('cus')->user()->email}}">{{auth('cus')->user()->email}}</a></div>
                          </div>
                        </li>
                        <li>
                          <a href="{{route('dat_hang.lich_su')}}" class="button btn-primary">Đơn hàng đã mua</a>
                          <a href="{{route('info_cus',auth('cus')->user()->id)}}" class="button btn-danger">Thay đổi thông tin</a>
                          <a href="{{route('pass',auth('cus')->user()->id)}}" class="button btn-danger">Mật khẩu</a>
                          <a href="{{route('logout')}}" class="button btn-warning" onclick="return confirm('Bạn muốn đăng xuất?')">Đăng xuất</a>
                        </li>
                        
                      </ul>
                      <ul class="list-inline rd-navbar-modern-list-social">
                        <li><a class="icon fa fa-facebook" href="#"></a></li>
                        <li><a class="icon fa fa-twitter" href="#"></a></li>
                        <li><a class="icon fa fa-google-plus" href="#"></a></li>
                        <li><a class="icon fa fa-instagram" href="#"></a></li>
                        <li><a class="icon fa fa-pinterest" href="#"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>

                @else
                <h2>Bạn chưa đăng nhập</h2>
                <a href="{{route('home.dang_nhap')}}" class="button">Đăng nhập</a>@endif
              </div>
            </div>

          </nav>
        </div>
      </header>
      <!-- Swiper-->

      @yield('main')
      <!-- Page Footer-->
      <footer class="section footer-variant-2 footer-modern context-dark section-top-image section-top-image-dark">
        <div class="footer-variant-2-content">
          <div class="container">
            <div class="row row-40 justify-content-between">
              <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="oh-desktop">
                  <div class="wow slideInRight" data-wow-delay="0s">
                    <div class="footer-brand"><a href="index.html"><img src="{{url('logo/logoOU.png')}}" alt="" width="196" height="42" /></a></div>
                    <p>Thư viện online- Nếu thắc mắc về vấn đề gì hoặc góp ý với chúng mình thì hãy gửi thư tới mình nhé!</p>
                    <ul class="footer-contacts d-inline-block d-md-block">
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                          <div class="unit-body"><a class="link-phone" href="tel:+84 8702052001">+84 8702052001</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><span ><i class="fas fa-clock fa-sm  "></i></span></div>
                          <div class="unit-body">
                            <p>Tất cả các ngày trong tuần: 07:00AM - 05:00PM</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                          <div class="unit-body"><a class="link-location" href="#">Hà Nội Việt Nam</a></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4 col-xl-4">
                <div class="oh-desktop">
                  <div class="inset-top-18 wow slideInDown" data-wow-delay="0s">
                    <h5>Các bạn có thể vào trang cá nhân của bọn mình</h5>
                    <p>Mình cũng làm nhiều content lắm!</p>

                    <div class="group-lg group-middle">
                      <p class="text-white">Trang cá nhân các nền tảng</p>
                      <div>
                        <ul class="list-inline list-inline-sm footer-social-list-2">
                          <li><a href="https://www.facebook.com/"><img src="{{url('logo/mxh1.png')}}" style="width: 30px;" alt=""></a></li>
                          <li><a href="https://www.youtube.com/"><img src="{{url('logo/mxh2.png')}}" style="width: 30px;" alt=""></a></li>
                          <li><a href="https://www.tiktok.com/"><img src="{{url('logo/mxh3.png')}}" style="width: 30px;" alt=""></a></li>
                         
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-xl-3">
                <div class="oh-desktop">
                  <div class="inset-top-18 wow slideInLeft" data-wow-delay="0s">
                    <h5>Gallery</h5>
                    <div class="row row-10 gutters-10" data-lightgallery="group">
                      <div class="col-6 col-sm-3 col-lg-6" >
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-mary">
                          <div class="thumbnail-mary-figure"><img src="{{url('logo/avatar1.png')}}" alt="" width="129" height="120" />
                          </div>
                          <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="{{url('logo/avatar1.png')}}" data-lightgallery="item"><img src="{{url('logo/avatar1.png')}}" alt="" style="width:129px; height:120px;" /></a>
                          </div>
                        </article>
                      </div>
                      <div class="col-6 col-sm-3 col-lg-6">
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-mary">
                          <div class="thumbnail-mary-figure"><img src="{{url('logo/avatar2.png')}}" alt="" width="129" height="120" />
                          </div>
                          <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="{{url('logo/avatar2.png')}}" data-lightgallery="item"><img src="{{url('logo/avatar2.png')}}" alt="" style="width:129px; height:120px;" /></a>
                          </div>
                        </article>
                      </div>
                      <div class="col-6 col-sm-3 col-lg-6">
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-mary">
                          <div class="thumbnail-mary-figure"><img src="{{url('logo/avatar3.png')}}" alt="" width="129" height="120" />
                          </div>
                          <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="{{url('logo/avatar3.png')}}" data-lightgallery="item"><img src="{{url('logo/avatar3.png')}}" alt="" style="width:129px; height:120px;" /></a>
                          </div>
                        </article>
                      </div>
                      <div class="col-6 col-sm-3 col-lg-6">
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-mary">
                          <div class="thumbnail-mary-figure"><img src="{{url('logo/avatar1.png')}}" alt="" width="129" height="120" />
                          </div>
                          <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="{{url('logo/avatar1.png')}}" data-lightgallery="item"><img src="{{url('logo/avatar1.png')}}" alt="" style="width:129px; height:120px;" /></a>
                          </div>
                        </article>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-variant-2-bottom-panel">
          <div class="container">
            <!-- Rights-->
            <div class="group-sm group-sm-justify">
              <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span> <span>Herber</span>. All rights reserved
              </p>
              <p class="rights">Design&nbsp;by&nbsp;<a href="https://www.templatemonster.com/">Templatemonster</a></p>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
  </div>
</body>
<!-- Javascript-->
<script src="{{ url('nhung')}}/LightBox/js/lightbox-plus-jquery.min.js"></script>
<script src="{{url('nhung/ngoai')}}/js/core.min.js"></script>
<script src="{{url('nhung/nivo-slider')}}/jquery.nivo.slider.js"></script>
<script src="{{url('nhung/nivo-slider')}}/jquery.nivo.slider.pack.js"></script>
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
<script>
  $('.them_gio').click(function(ev) {
    ev.preventDefault();
    var href = $(this).attr('href');
    $.ajax({
      url: href,
      type: 'get',
    });

    $('#in').load(location.href + ' #in');
    $('#tong_so_luong').load(location.href + ' #tong_so_luong');
    $('#tinh_toan').load(location.href + ' #tinh_toan');

    $.toast({
      heading: 'Thông báo',
      text: 'Thêm giỏ hàng thành công!',
      position: 'top-center',

      icon: 'success'
    });
  });


  $(document).on('click', '.cap_nhat', function(ev) {
    ev.preventDefault();
    var id = $(this).data('id');

    var so_luong = $('input.so_luong-' + id).val();
    var href1 = $(this).data('href') + '/?so_luong=' + so_luong;

    $.ajax({
      url: href1,
      type: 'get',

      success: function() {
        $.toast({
          heading: 'Thông báo!',
          text: 'Cập nhật giỏ hàng thành công!',
          position: 'top-center',
          icon: 'success'
        });
        $('#tong_so_luong').load(location.href + ' #tong_so_luong');
        $('#tinh_toan').load(location.href + ' #tinh_toan');
        $('#gio_hang').load(location.href + ' #giohang');
      }
    });
  });
</script>
@yield('js')


</html>