@extends('front.layout.app')
@section('content')

<div class="page-hero h-400 bg-image overlay-dark" style="background-image: url({{ asset('front') }}/img/banner.png">
    <div class="hero-section">

      <div class="container text-center wow zoomIn">
        <h1 class="text-primary">العروض </h1>
        <img src="{{ asset('front') }}/img/ornament-slider-white-01.png" class="spread-img">
      </div>
    </div>
</div>
  <div class="page-section recent-offer">
    <div class="mr-4 ml-4">
      <h3 class="text-center mb-3 wow fadeInUp">أحدث العروض</h3>
      <img src="{{ asset('front') }}/img/ornament-slider-white-01.png" class="spread-img">
      <div class="col-12 text-center">
        <div>حمامات شرقية ملكى مغربى كليوباترا تركى ساونا جاكوزى مغطس بخار تكييس باديكير مانيكير</div>
      </div>


      <div class="owl-carousel wow fadeInUp mt-4" id="doctorSlideshow">
        @foreach($offers as $offer)
        <div class="item">
            <div class="padge">
                <div class="d-flex justify-content-center w-100">
                    <div class="text-white font-weight-bold">{{ $offer->price }}</div>
                    <div class="text-white font-weight-bold">{{ __('site/app.gm') }}</div>
                </div>
                <div class="text-white font-weight-bold text-decoration-line-through w-100">{{ $offer->befor_discount }}</div>
            </div>

          <a class="card-recent-effort recent-effort page-hero bg-image overlay-dark pb-4"
          style="background-image: url({{ $offer->image[0] }});" href="{{ route('offer.details',$offer->id) }}">
            <div  style="margin-top: 70%; margin-right: auto; margin-left: auto; text-align: center;">
              <h5 class=" text-primary font-weight-bold"><span href="">{{ $offer->name }} </span>
              </h5>
              <div class="site-info">
                <div class="avatar ">
                  <span class="text-white font-weight-bold">{{ $offer->short_description }}</span>
                </div>
              </div>

            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>



@endsection
