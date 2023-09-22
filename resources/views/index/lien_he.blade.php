@extends('master.shop')
@section('tittle','Liên Hệ')
@section('main')

<!-- Breadcrumbs -->
<section class="breadcrumbs-custom-inset">
  <div class="breadcrumbs-custom context-dark bg-overlay-39">
    <div class="container">
      <h2 class="breadcrumbs-custom-title">Liên hệ</h2>
      <ul class="breadcrumbs-custom-path">
        <li><a href="{{route('index')}}">Trang Chủ</a></li>
        <li class="active">Liên hệ</li>
      </ul>
    </div>
    <div class="box-position" style="background-image: url(<?php echo url('logo/logoOU.png') ?>);"></div>
  </div>
</section>
<!-- Contact information-->
<section class="section section-md section-first bg-default">
  <div class="container">
    <div class="row row-30 justify-content-center">
      <div class="col-sm-8 col-md-6 col-lg-4">
        <article class="box-contacts">
          <div class="box-contacts-body">
            <div class="box-contacts-icon fl-bigmug-line-cellphone55"></div>
            <div class="box-contacts-decor"></div>
            <p class="box-contacts-link"><a href="https://www.facebook.com/groups/606797226469817">Nhóm Facebook</a></p>
            <p class="box-contacts-link"><a href="#">+84 87654321</a></p>
          </div>
        </article>
      </div>
      <div class="col-sm-8 col-md-6 col-lg-4">
        <article class="box-contacts">
          <div class="box-contacts-body">
            <div class="box-contacts-icon fl-bigmug-line-up104"></div>
            <div class="box-contacts-decor"></div>
            <p class="box-contacts-link"><a href="#">Hà Nội,Việt Nam</a></p>
          </div>
        </article>
      </div>
      <div class="col-sm-8 col-md-6 col-lg-4">
        <article class="box-contacts">
          <div class="box-contacts-body">
            <div class="box-contacts-icon fl-bigmug-line-chat55"></div>
            <div class="box-contacts-decor"></div>
            <p class="box-contacts-link"><a href="mailto:nkt@gmail.com">nkt@gmail.com</a></p>
            
          </div>
        </article>
      </div>
    </div>
  </div>
</section>

<!-- Contact Form and Gmap-->
<section class="section section-md section-last bg-default text-md-left">
  <div class="container">
    <div class="row row-50">
      <div class="col-lg-6 section-map-small">
        <div class="google-map-container" data-center="Hà Nội Việt Nam" data-zoom="5" data-icon="images/gmap_marker.png" data-icon-active="images/gmap_marker_active.png" data-styles="[{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#444444&quot;}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f2f2f2&quot;}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;poi.business&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;}]},{&quot;featureType&quot;:&quot;road&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:45}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;simplified&quot;}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#b4d4e1&quot;},{&quot;visibility&quot;:&quot;on&quot;}]}]">
          <div class="google-map"></div>
          <ul class="google-map-markers">
            <li data-location="Hà Nội Việt Nam" data-description="Hà nội Việt Nam"></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6">
        <h4 class="text-spacing-50">Contact Form</h4>
        <form action="{{route('send')}}" method="post">
        @csrf 
          <div class="row row-14 gutters-14">
            <div class="col-sm-12">
              <div class="form-wrap">
                <input class="form-input" id="contact-first-name" type="text" name="name">
                <label class="form-label" for="contact-first-name">Họ và tên:</label>
                <small class="error">@error('name'){{$message}}@enderror</small>
              </div>
            </div>
          
            <div class="col-12">
              <div class="form-wrap">
                <input class="form-input" id="contact-email" type="email" name="email">
                <label class="form-label" for="contact-email">E-mail</label>
                <small class="error">@error('email'){{$message}}@enderror</small>
              </div>
            </div>
            <div class="col-12">
              <div class="form-wrap">
                <label class="form-label" for="contact-phone">Số điện thoại:</label>
                <textarea class="form-input" id="contact-phone" name="phone"></textarea>
                <small class="error">@error('phone'){{$message}}@enderror</small>
              </div>
            </div>
            <div class="col-12">
              <div class="form-wrap">
                <label class="form-label" for="contact-message">Lời nhắn:</label>
                <textarea class="form-input" id="contact-message" name="content"></textarea>
                <small class="error">@error('content'){{$message}}@enderror</small>
              </div>
            </div>
          </div>
          <button class="button button-primary button-pipaluk" type="submit">Gửi</button>
        </form>
      </div>
    </div>
  </div>
</section>

 
  
</form>

<!-- Page Footer-->


@stop