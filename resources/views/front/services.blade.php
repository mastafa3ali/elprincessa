@extends('front.layout.app')
@section('content')
<div class="page-hero h-400 bg-image overlay-dark" style="background-image: url({{ asset('front') }}/img/banner.png">
    <div class="hero-section">

      <div class="container text-center wow zoomIn">
        <h1 class="text-primary">الخدمات</h1>
        <img src="{{ asset('front') }}/img/ornament-slider-white-01.png" class="spread-img">
      </div>
    </div>
</div>
<div class="page-section recent-offer">
    <div class="mr-4 ml-4">
      <h3 class="text-center mb-3 wow fadeInUp">الخدمات </h3>
      <img src="{{ asset('front') }}/img/ornament-slider-white-01.png" class="spread-img">
      <div class="col-12 text-center">
        <div>حمامات شرقية ملكى مغربى كليوباترا تركى ساونا جاكوزى مغطس بخار تكييس باديكير مانيكير</div>
      </div>


      <div class="row d-flex flex-wrap justify-content-center mt-5 w-100">
        @foreach($services as $service)
        <div class="col-lg-4 py-2 wow zoomIn col-12 col-md-3">
          <div class="card-blog card-service-princess page-hero bg-image overlay-dark" style="background-image: url({{ $service->image }}); ">
            <div class="header">
              <a href="" class="post-thumb">
              </a>
            </div>
            <div class="body mb-2">
              <div class="site-info w-100">
                <h2 class="text-center text-primary font-weight-bold w-100 mb-2"><span>{{ $service->name }}</span>
                </h2>
                <div class="avatar  text-center d-flex justify-content-center">
                  <h5 class="font-weight-bold text-white ">{{ $service->description }}</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>




@endsection
