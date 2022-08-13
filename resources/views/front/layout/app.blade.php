<!DOCTYPE html>
<html  dir="{{ app()->getLocale()=='ar'?'rtl':'ltr' }}"  lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>{{ websiteInfo('website_name_'.app()->getLocale()) }} </title>

  <link rel="stylesheet" href="{{ asset('front') }}/css/maicons.css">

  <link rel="stylesheet" href="{{ asset('front') }}/css/bootstrap.css">

  <link rel="stylesheet" href="{{ asset('front') }}/vendorAsset/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="{{ asset('front') }}/vendorAsset/animate/animate.css">

  <link rel="stylesheet" href="{{ asset('front') }}/css/theme.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('front/notifications/css/lobibox.min.css') }}" rel="stylesheet"/>
@yield('css')
@livewireStyles

</head>

  <body>

    <div class="back-to-top"></div>
@php
    $routename=\Request::route()->getName();
@endphp
    <header>
      <div class="topbar">
        <div class="container pl-2">
          <div class="row pt-2 pb-2 justify-content-center align-items-center">
            <div class="col-md-4 text-right text-sm site-info d-flex align-items-center">
             <a>
              <i class="fa fa-map ml-2"></i>
             </a>
             <div>
              <a>
                {{ websiteInfo('address') }}
              </a>

             </div>
            </div>

            <div class="col-md-4 text-sm d-flex align-items-center site-info">
              <a>
                <i class="fa fa-mobile ml-2"></i>
              </a>
              <div class="site-info  text-center mr-aut ml-auto mt-1 mb-1">
                <a href="#">{{ websiteInfo('phones') }}</a>

              </div>
            </div>
            <div class="col-md-4 p-0 text-right text-sm">
              <div class="social-mini-button  d-flex justify-content-end">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                  </a>
                <a href="{{ websiteInfo('fb_link') }}"><i class="fa fa-twitter"></i></a>
                <a href="{{ websiteInfo('snapchat_link') }}"><i class="fa fa-snapchat"></i></a>
                <a href="{{ websiteInfo('youtube_link') }}"><i class="fa fa-youtube"></i></a>
              </div>
            </div>
          </div> <!-- .row -->
        </div> <!-- .container -->
      </div>

      <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
            aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
          <a class="navbar-brand" href="#">
         <div class="d-flex">
          <img src="{{ asset('front/img/logo.png') }}" style="width: 50px; max-width: 50px;"/>
          <div class="mr-2 ml-2" style="font-size: 14px;">
            <div class=" text-right">{{ __('site/app.bathroom') }}</div>
            <div class="font-weight-bold text-primary text-right"> {{ __('site/app.princess') }}</div>
          </div>
         </div>
          </a>
          <div class="collapse navbar-collapse" id="navbarSupport">
            <ul class="navbar-nav ml-auto mr-auto">
              <li class="nav-item {{ $routename=='/'?'active':'' }}">
                <a class="nav-link text-center" href="{{ route('/') }}">{{ __('site/app.home') }}</a>
              </li>
              <li class="nav-item {{ $routename=='about'?'active':'' }}">
                <a class="nav-link  text-center" href="{{ route('about') }}">{{ __('site/app.who_we_are') }} </a>
              </li>
              <li class="nav-item {{ $routename=='ourservices'?'active':'' }}">
                <a class="nav-link  text-center" href="{{ route('ourservices') }}">{{ __('site/app.services') }}</a>
              </li>
              <li class="nav-item {{ $routename=='site.offers'?'active':'' }}">
                <a class="nav-link  text-center" href="{{ route('site.offers') }}">العروض</a>
              </li>

              <li class="nav-item {{ $routename=='contact'?'active':'' }}" >
                <a class="nav-link  text-center" href="{{ route('contact') }}">{{ __('site/app.contact') }} </a>
              </li>

            </ul>
          </div> <!-- .navbar-collapse -->
          <div class="d-flex">
            @auth
                <div class="dropdown">
                  <a class="btn btn- dropdown-toggle nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    الاعدادات
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item text-center" href="{{ route('site.profile') }}">صفحتى</a>
                    <a class="dropdown-item text-center" href="{{ route('myservice') }}">الحجوزات</a>
                  </div>
                </div>
              @endauth
            <a href="{{ route('site.offers') }}">
            <div class="d-flex" style="border : 1px solid #f51f79; border-radius: 4px;">
              <div class="mr-2 ml-4 mt-1 mb-1">{{ __('site/app.book_now') }} </div>
              <div class="bg-primary" style="width: 35px;">
                <i class="fa fa-calendar d-flex justify-content-center align-self-center mt-2 text-white"></i>
              </div>
            </div>
            </a>
            @auth
           @else
            <div style=" color:white; border-radius: 4px; padding:2px;" class="mr-2">
              <a href="{{ route('login') }}" class="btn-primary" style="padding:0px 10px 6px 10px"> <i class="fa fa-lock" aria-hidden="true"></i> </a>
            </div>
            @endauth
            </div>
          </div>

        </div> <!-- .container -->
      </nav>
    </header>
    @if (session()->has('success'))
    <div class="alert alert-success text-center">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        {{ session()->get('success') }}
    </div>
    @endif


  @yield('content')
  <div class="bg-dark follow-section">
    <div class="row d-flex flex-wrap mr-4 ml-4 align-items-center justify-content-between pr-4 pl-4">

        <div class="text-right text-white pr-4 pt-4 pb-4">
            <span style="font-size: 12px;">>></span>
            <span>{{ __('site/app.follow_us_on_social') }}</span>
        </div>

        <div class="pl-4 pr-4">
            <div class="footer-sosmed mt-3 d-flex align-items-end justify-content-end mb-3">
                <a href="{{ websiteInfo('snapchat_link') }}"  target="_blank"><i class="fa fa-snapchat"></i></a>
                <a href="{{ websiteInfo('youtube_link') }}" target="_blank"><i class="fa fa-youtube"></i></a>
                <a href="{{ websiteInfo('fb_link') }}" target="_blank"><i class="fa fa-facebook-f"></i></a>
                <a href="{{ websiteInfo('twitter_link') }}" target="_blank"><i class="fa fa-twitter"></i></a>
            </div>
        </div>

    </div>
</div>
  <footer class="page-footer">
    <div class="mr-4 ml-4">
      <div class="d-flex flex-wrap px-md-3 justify-content-around mb-4 align-items-">

        <div class="d-flex align-items-center">

          <div>
            <img src="{{ asset('front/img/logo-w') }}" width="60px">
          </div>
          <div class="mr-2 ml-2">
            <div class="text-white text-right">{{ __('site/app.bathroom') }}</div>
            <div class="font-weight-bold text-white text-right"> {{ __('site/app.princess') }}</div>
          </div>
        </div>

        <div class="text-right col-md-2 col-12 mb-3">
          <div class="mb-2">
            <i class="fa fa-mobile ml-2"></i>
            <span>{{ __('site/app.phone') }}</span>
          </div>
          <div> <a href="tel:{{ websiteInfo('phones') }}" class="text-white">{{ websiteInfo('phones') }}</a>



        </div>
        </div>
        <div class="text-right col-md-2 col-12 mb-3">
          <div class="mb-2">
            <i class="fa fa-map ml-2"></i>
            <span>{{ __('site/app.address') }}</span>

          </div>
          <div>{{ websiteInfo('address') }}
            <br>
            @if(websiteInfo('map_link'))
                <a href="{{ websiteInfo('map_link') }}" class="text-white" target="_blank">الموقع على الخريطة</a>
            @endif</div>
        </div>
        <div class="text-right col-md-2 col-12 mb-3">
          <div class="mb-2">
            <i class="fa fa-clock-o ml-2"></i>
            <span>{{ __('site/app.working_date') }}</span>
          </div>
          <div>{{ websiteInfo('working_date') }}</div>
        </div>
        <div class="text-right col-md-2 col-12 mb-3">
          <div class="mb-2">
            <a href="{{ route('policy') }}" style="color: white">{{ __('سياسة الخصوصية') }}</a>
          </div>
        </div>

        <div class="align-items-center">

          <div class="d-flex">
            <a href="{{ route('site.offers') }}">
            <div class="d-flex" style="border : 1px solid #fff; border-radius: 4px;">
              <div class="mr-2 ml-4 mt-1 mb-1" style="color: white">{{ __('site/app.book_now') }}</div>
              <div class="bg-white" style="width: 35px;">
                <i class="fa fa-calendar d-flex justify-content-center align-self-center mt-2 text-primary"></i>
              </div>
            </div>
            </a>

            </div>

        </div>

      </div>

      <p id="copyright" class="copyright text-center d-flex justify-content-center text-secondary">
        {{ __('site/app.copyright') }}
      </p>
    </div>
  </footer>

<script src="{{ asset('front/js/jquery-3.5.1.min.js')}}"></script>

<script src="{{ asset('front/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{ asset('front/vendorAsset/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{ asset('front/vendorAsset/wow/wow.min.js')}}"></script>

<script src="{{ asset('front/js/theme.js')}}"></script>
<script src="{{ asset('front/notifications/js/lobibox.min.js') }}"></script>
<script src="{{ asset('front/notifications/js/notifications.min.js') }}"></script>
<script src="{{ asset('front/notifications/js/notification-custom-script.js') }}"></script>
<script>
    var app_url = "{{url('/')}}";
    var lang = "{{app()->getLocale()}}";
</script>
<script src="{{ asset('website/front.js')}}"></script>
@livewireScripts


</body>

</html>






