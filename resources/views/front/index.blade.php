@extends('front.layout.app')
@section('content')
<div class="page-hero bg-image overlay-dark" style="background-image: url({{ asset('front') }}/img/banner.png">
    <div class="hero-section">

      <div class="container text-center wow zoomIn">
        <h1 class="text-primary">افصلى .. وغيرى حياتك</h1>
        <img src="{{ asset('front') }}/img/ornament-slider-white-01.png" class="spread-img">
        <h3 class="subhead">حمامات شرقية ملكى مغربى كليوباترا تركى ساونا جاكوزى مغطس بخار</h3>
        <h3 class="subhead">تكييس باديكير مانيكير برافين سويت واكس نتوياج مساج بجميع انواعه</h3>
        <h3 class="subhead"> للسيدات فقط</h3>
        <a href="{{ route('ourservices') }}" class="btn btn-primary ml-4 mt-4">{{ __('site/app.ourservices') }}</a>
        <a href="{{ route('contact') }}" class="btn btn-light mt-4">{{ __('site/app.contact') }}</a>
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
    <div class="page-section pb-0">
      <div class="">
        <div class="row align-items-center wow fadeInRight w-100" data-wow-delay="400ms">
          <div class="col-12 text-center">
            <h3>خدماتنا</h3>
          </div>
          <img src="{{ asset('front') }}/img/ornament-slider-white-01.png" class="spread-img">
          <div class="col-12 text-center">
            <div>حمامات شرقية ملكى مغربى كليوباترا تركى ساونا جاكوزى مغطس بخار تكييس باديكير مانيكير</div>
          </div>
          <div class="col-12 text-center wow fadeInUp">
            <div>برافين سويت واكس نتوياج مساج بجميع انواعه للسيدات فقط</div>
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
    </div> <!-- .bg-light -->
  </div> <!-- .bg-light -->

  <div class="page-section recent-offer">
    <div class="mr-4 ml-4">
      <h3 class="text-center mb-3 wow fadeInUp">أحدث العروض</h3>
      <img src="{{ asset('front') }}/img/ornament-slider-white-01.png" class="spread-img">
      <div class="col-12 text-center">
        <div>حمامات شرقية ملكى مغربى كليوباترا تركى ساونا جاكوزى مغطس بخار تكييس باديكير مانيكير</div>
      </div>
      <div class="col-12 text-center wow fadeInUp">
        <div>برافين سويت واكس نتوياج مساج بجميع انواعه للسيدات فقط</div>
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



  @include('front.contactform')

@endsection
