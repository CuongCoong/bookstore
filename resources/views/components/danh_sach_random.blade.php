<div class="col-md-5 col-lg-6">
  <h1>ngẫu nhiên</h1>
              <div class="row row-30 justify-content-center">
                @foreach($data as $sp)
                <div class="col-sm-6 col-md-12 col-lg-6">
                  <div class="oh-desktop">
                    <!-- Product-->
                    <article class="product product-2 box-ordered-item wow slideInRight" data-wow-delay="0s">
                      <div class="unit flex-row flex-lg-column">
                        <div class="unit-left">
                          <div class="product-figure"><img src="{{url('anh_san_pham')}}/{{$sp->avatar}}" alt="" style="width: 250px ; height: 180px;"/>
                            <div class="product-button"><a class="button button-md button-white button-ujarak them_gio" href="{{route('gio_hang.them',$sp->id)}}">Thêm vào giỏ hàng</a></div>
                          </div>
                        </div>
                        <div class="unit-body">
                          <h6 class="product-title"><a href="{{route('index.thong_tin',$sp->id)}}" style="font-family: thanh;">{{Str::limit($sp->name,15)}}</a></h6>
                          <div class="product-price-wrap">
                            @if($sp->sale_price)
                            <div class="product-price product-price-old">{{number_format($sp->price)}} vnđ</div>
                            <div class="product-price">{{number_format($sp->sale_price)}} vnđ</div>
                            @else
                            <div class="product-price">{{number_format($sp->price)}} vnđ</div>
                            @endif
                          </div><a class="button button-sm button-secondary button-ujarak them_gio" href="{{route('gio_hang.them',$sp->id)}}">Thêm vào </a>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
                @endforeach
              </div></div>