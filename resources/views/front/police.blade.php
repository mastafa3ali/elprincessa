@extends('front.layout.app')
@section('content')
<div class="page-hero h-400 bg-image overlay-dark" style="background-image: url({{ asset('front') }}/img/banner.png">
    <div class="hero-section">

      <div class="container text-center wow zoomIn">
        <h1 class="text-primary">سياسة الخصوصية</h1>
        <img src="{{ asset('front') }}/img/ornament-slider-white-01.png" class="spread-img">
      </div>
    </div>
</div>
  <div class="bg-light service-sections" style = "padding-bottom : 80px">

    <div class="page-section pb-0">
      <div class="">
        <div class="row align-items-center wow fadeInRight w-100" data-wow-delay="400ms">
          <div class="col-12 text-center">
            <h3>سياسة الخصوصية</h3>
          </div>
          <img src="{{ asset('front') }}/img/ornament-slider-white-01.png" class="spread-img">
          <div class="col-12 text-center" style="    min-height: 200px;">
            <div>
                {{ websiteInfo('policy_ar') }}
            </div>
            <div>
                {{ websiteInfo('privacy_ar') }}
            </div>

        </div>
      </div>
    </div> <!-- .bg-light -->
  </div> <!-- .bg-light -->
@endsection
