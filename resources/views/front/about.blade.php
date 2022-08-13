@extends('front.layout.app')
@section('content')
<div class="page-hero h-400 bg-image overlay-dark" style="background-image: url({{ asset('front') }}/img/banner.png">
    <div class="hero-section">

      <div class="container text-center wow zoomIn">
        <h1 class="text-primary">من نحن</h1>
        <img src="{{ asset('front') }}/img/ornament-slider-white-01.png" class="spread-img">
      </div>
    </div>
</div>
<div class="bg-light service-sections">
    <div class="page-section py-3 mt-md-n5 bg-white pr-4 pl-4">
      <div class="container col-12 col-11 mb-4" style = "z-index: 9999">
        <div class="row justify-content-center">
          <div class="col-12 py-3 py-md-0">
            <div class="card-service wow fadeInUp mt-4 pt-4">
              <img src="{{ asset('front') }}/img/logo.png" style="width: 50px; display: flex; margin: 0 auto;"/>
              <h4 class="text-center mr-auto ml-auto ">حمام البرنسيسة</h4>
              <div class="text-center">
                <span class="font-weight-bold">هتخرجى من عندنا ...</span>
                <span class="text-primary font-weight-bold">برنسيسة !</span>
              </div>
              <img src="{{ asset('front') }}/img/ornament-slider-white-01.png" class="spread-img">
              <div class="text-center">حمامات شرقية ملكى مغربى كليوباترا تركى ساونا جاكوزى مغطس بخار تكييس باديكير
                مانيكير</div>
              <div class="text-center mb-4">برافيين سويت واكس نتوياج مساج بجميع انواعه</div>
              <div class="row d-flex flex-wrap justify-content-center align-items-center mt-4 pt-4 pb-4 w-100 align-self-center">

                <div class="col-md-4 col-12 align-items-center justify-content-center">

                  <div class="d-flex align-items-center border-top-secondary mb-3" style="margin-right: auto">
                    <div class="icon-service">
                      <img src="{{ asset('front') }}/img/service1.png" style="width: 25px;"/>
                    </div>
                    <div class="text-right font-weight-bold text-right">مستحضرات طبيعية</div>
                  </div>

                  <div class="d-flex align-items-center border-top-secondary mb-3" style="margin-right: auto">
                    <div class="icon-service">
                      <img src="{{ asset('front') }}/img/service2.png" style="width: 25px;"/>
                    </div>
                    <div class="text-right font-weight-bold text-right"> عناية متكاملة</div>
                  </div>

                  <div class="d-flex align-items-center border-top-secondary mb-3 " style="margin-right: auto">
                    <div class="icon-service">
                      <img src="{{ asset('front') }}/img/service1.png" style="width: 25px;"/>
                    </div>
                    <div class="text-right font-weight-bold text-right">حمامات ملكية</div>
                  </div>

                </div>

                <div class="col-md-4 col-12 align-items-center justify-content-center">
                  <img src="{{ asset('front') }}/img/img1.png" style="width: 75%;
                  margin: 0 auto;
                  display: flex;
              "/>
                </div>

                <div class="col-md-4 col-12 align-items-center justify-content-center">

                  <div class="d-flex align-items-center border-top-secondary mb-3">
                    <div class="icon-service">
                      <img src="{{ asset('front') }}/img/service4.png" style="width: 25px;"/>
                    </div>
                    <div class="text-right font-weight-bold text-right"> مساج & جاكوزى</div>
                  </div>

                  <div class="d-flex align-items-center border-top-secondary mb-3">
                    <div class="icon-service">
                      <img src="{{ asset('front') }}/img/service2.png" style="width: 25px;"/>
                    </div>
                    <div class="text-right font-weight-bold text-right"> فريق محترف ومتكامل </div>
                  </div>

                  <div class="d-flex align-items-center border-top-secondary mb-3">
                    <div class="icon-service">
                      <img src="{{ asset('front') }}/img/service3.png" style="width: 25px;"/>
                    </div>
                    <div class="text-right font-weight-bold text-right"> عناية بتصفيف الشعر</div>
                  </div>

                </div>

              </div>
            </div>
          </div>


        </div>
      </div>
    </div>

@endsection
