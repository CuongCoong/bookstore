@extends('master.shop')
@section('tittle','Thi Viện')
@section('main')
<x-banner/>
<!-- Icons Ruby-->
<section class="section section-md bg-default section-top-image">
  <div class="container">
    <div class="row row-30 justify-content-center">
      @foreach($dm_random as $dm)
      <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay="0s">
        <article class="box-icon-ruby">
          <div class="unit box-icon-ruby-body flex-column flex-md-row text-md-left flex-lg-column align-items-center text-lg-center flex-xl-row text-xl-left">
            <div class="unit-left">
              <i class="fas fa-book-open fa-3x fa-fw"></i>
            </div>
            <div class="unit-body">
              <h4 class="box-icon-ruby-title"><form action="{{route('search')}}" method="get"><input type="hidden" name="key" value="{{$dm->name}}"> <button style="border: none;">{{$dm->name}}</button></form></h4>
            </div>
          </div>
        </article>
      </div>
      @endforeach

    </div>
  </div>
</section>

<!-- Trending products-->
<section class="section section-md bg-default">
  <div class="container">
    <div class="row row-40 justify-content-center">
      <div class="col-sm-8 col-md-7 col-lg-6 wow fadeInLeft" data-wow-delay="0s">
        <div class="product-banner"><img src="{{url('anh_nen/thu_vien.jpg')}}" alt="" width="570" height="715" />
          <div class="product-banner-content">
            <div class="product-banner-inner" style="background-image: url(<?php url('anh_nen/font.png')?>)">
              
            </div>
          </div>
        </div>
      </div>
      <x-danh_sach_random :data="$sp_random" dm_global="$dm_global"/>
    </div>
  </div>
</section>

<!-- Section CTA 2-->
<section class="section text-center">
  <div class="parallax-container" data-parallax-img="{{url('logo/logoOU.png')}}">
    <div class="parallax-content section-xl section-inset-custom-1 context-dark bg-overlay-40">
      <div class="container">
        <h2 class="oh font-weight-normal"><span class="d-inline-block wow slideInDown" data-wow-delay="0s">My team</span></h2>
        <p class="oh big text-width-large"><span class="d-inline-block wow slideInUp" data-wow-delay=".2s">Đỉnh Olympus là đỉnh trú ngụ của các vị thần Hy Lạp- Ý nghĩa tên của team bắt nguồn từ việc mỗi người trong nhóm đều có một khả năng riêng tạo nên sự kết hợp tuyệt vời khi làm việc</span></p><a class="button button-primary button-icon button-icon-left button-ujarak wow fadeInUp" href="https://youtu.be/JeCNCXACwxM" data-lightgallery="item" data-wow-delay=".1s"><span class="icon mdi mdi-play"></span>View presentation</a>
      </div>
    </div>
  </div>
</section>

<!-- Team of professionals-->
<section class="section section-md bg-default">
  <div class="container">
    <div class="oh">
      <h2 class="wow slideInUp" data-wow-delay="0s">Quản trị viên</h2>
    </div>
   
    <div class="row row-30 justify-content-center">
    @foreach($admin as $ad)
      <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInRight" data-wow-delay="0s">
        <!-- Team Classic-->
        <article class="team-classic"><a class="team-classic-figure" href="{{route('feedback')}}"><img src="{{(url('avatar'))}}/{{$ad->avatar}}" alt="" style="width: 290px; height: 217px;" /></a>
          <div class="team-classic-caption">
            <h5 class="team-classic-name"><a href="{{(url('avatar'))}}/{{$ad->avatar}}">{{$ad->name}}</a></h5>
            <p class="team-classic-status">Founder</p>
          </div>
        </article>
      </div>
      @endforeach
    </div>
   
  </div>
</section>

<!-- About us-->
<section class="section">
  <div class="parallax-container" data-parallax-img="images/bg-parallax-2.jpg">
    <div class="parallax-content section-xl context-dark bg-overlay-68">
      <div class="container">
        <div class="row row-lg row-50 justify-content-center border-classic border-classic-big">
          <div class="col-sm-6 col-md-5 col-lg-3 wow fadeInLeft" data-wow-delay="0s">
            <div class="counter-creative">
              <div class="counter-creative-number"><span class="counter">{{$sl_dm}}</span>
              </div>
              <h6 class="counter-creative-title">Thể Loại</h6>
            </div>
          </div>
          <div class="col-sm-6 col-md-5 col-lg-3 wow fadeInLeft" data-wow-delay=".1s">
            <div class="counter-creative">
              <div class="counter-creative-number"><span class="counter">{{$sl_sp}}</span>
              </div>
              <h6 class="counter-creative-title">Cuốn Sách</h6>
            </div>
          </div>
          <div class="col-sm-6 col-md-5 col-lg-3 wow fadeInLeft" data-wow-delay=".2s">
            <div class="counter-creative">
              <div class="counter-creative-number"><span class="counter">{{$sl_bv}}</span>
              </div>
              <h6 class="counter-creative-title">Bài viết</h6>
            </div>
          </div>
          <div class="col-sm-6 col-md-5 col-lg-3 wow fadeInLeft" data-wow-delay=".3s">
            <div class="counter-creative">
              <div class="counter-creative-number"><span class="counter">{{$sl_db}}</span>
              </div>
              <h6 class="counter-creative-title">Cuốn đã bán</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
<!-- Improve your interior with deco-->
<x-new :data="$san_pham_global" dm_global="$dm_global"/>

@stop
@section('style')
@stop