<section class="section swiper-container swiper-slider swiper-slider-modern" data-loop="true" data-autoplay="3000" data-simulate-touch="true" data-nav="true" data-slide-effect="random" id="banner">

  <div class="swiper-wrapper text-left">
    @foreach($banner as $ban)
    <div class="swiper-slide context-dark" data-slide-bg="{{url('banner')}}/{{$ban->name_banner}}">
      <div class="swiper-slide-caption">
        <div class="container">
          <div class="row justify-content-center justify-content-xxl-start">
            <div class="col-md-10 col-xxl-6">
              <div class="slider-modern-box">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  @endforeach
  </div>

  <!-- Swiper Navigation-->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
  <!-- Swiper Pagination-->
  <div class="swiper-pagination swiper-pagination-style-2"></div>


</section>