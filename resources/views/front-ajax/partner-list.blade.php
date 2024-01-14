  @if (count($partner->lists) > 0)
      <div class="container">
          <div class="text-md-lh24 color-black-5 wow animate__animated animate__fadeInUp text-center">
              Partner Kemitraan
          </div>
          <h4 class="section-title mb-15 wow animate__animated animate__fadeInUp text-center">{{ $partner->title }}</h4>
          <div class="row mt-50">
              <div class="box-swiper">
                  <div class="swiper-container swiper-group-5">
                      <div class="swiper-wrapper pb-70 pt-5">
                          @foreach ($partner->lists as $x)
                              <div class="swiper-slide hover-up">
                                  <div class="item-logo">
                                      <a href="#">
                                          <img alt="YLKA" src="{{ $x->media }}" width="78" />
                                          <p>{{ $x->title }}</p>
                                      </a>
                                  </div>
                              </div>
                          @endforeach
                      </div>
                  </div>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
              </div>
          </div>
      </div>
  @endif
