@extends('front.layout.app')
@section('content')

    <div class="page-hero  h-400 bg-image overlay-dark" style="background-image: url({{ asset('front') }}/img/banner.png">
        <div class="hero-section">
            <div class="container text-center wow zoomIn">
                <h1 class="text-primary">تفاصيل العرض</h1>
                <img src="{{ asset('front') }}/img/ornament-slider-white-01.png" class="spread-img">

            </div>
        </div>
    </div>


    <div class="bg-light service-sections">

        <div class="page-section py-3 mt-md-n5 bg-white pr-4 pl-4 page-section-details-offer">
            <div class="container col-12 col-11 mb-4" style="z-index: 9999">
                <div class="row justify-content-center">
                    <div class="col-12 py-3 py-md-0">
                        <div class="card-offer-details">

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <div class="alert-icon icon-part-danger">
                                    </div>
                                    <div class="alert-message">
                                        <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                            </ul>
                                    </div>
                                </div>
                                @endif
                            <div class="row d-flex flex-wrap">
                                <div class="col-md-3 col-12">
                                    <div class="card-recent-effort recent-effort page-hero bg-image overlay-dark pb-4 card-item-details-effort"
                                        style="background-image: url({{ $row->image[0] }});">

                                    </div>
                                </div>
                                <div class="col-md-9 col-12 ">
                               <div class="wrapper-description mt-4 pt-2">
                                <h5 class=" text-primary font-weight-bold text-right"><span href="">{{ $row->name }}</span>
                            </h5>
                            <img src="{{ asset('front') }}/img/ornament-slider-white-01.png" class="spread-img mr-0" />
                            <div class="offer-description">

                                <div class="text-right">
                                    <div>{{ $row->description }}</div>
                                </div>

                            </div>
                            <hr class="spread-hr"/>
                            <div class="row">
                                <div class="col-md-4 col-12 d-flex align-items-center">
                                    <div class="icon-offer text-primary"><i class="fa fa-clock-o"></i></div>
                                    <div class="mr-2 ml-2 text-customize">24 إلى 40 دقيقة</div>
                                </div>
                                <div class="col-md-4 col-12 d-flex align-items-center">
                                    <div class="icon-offer text-primary">
                                        <i class="fa fa-dollar"></i>
                                    </div>
                                    <div class="mr-2 ml-2 text-customize">السعر الكلى {{ $row->price }} جنيه مصرى</div>
                                </div>
                                <div class="col-md-4 col-12 d-flex align-items-center">
                                    <div class="icon-offer text-primary">
                                        <i class="fa fa-dollar"></i>
                                    </div>
                                    <div class="mr-2 ml-2 text-customize"> المقدم {{ $row->min_price }} جنيه مصرى</div>
                                </div>
                            </div>

                            <hr class="spread-hr"/>
                            @livewire('offer',['row_id'=>$row->id])

                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>



        <div class="page-section recent-offer">
            <div class="mr-4 ml-4">
                <h3 class="text-center mb-3 wow fadeInUp"> شاهد المزيد من العروض</h3>
                <img src="{{ asset('front') }}/img/ornament-slider-white-01.png" class="spread-img">


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
                              <span class="text-white font-weight-bold">{{ $offer->description }}</span>
                            </div>
                          </div>

                        </div>
                      </a>
                    </div>
                    @endforeach
                  </div>
            </div>
        </div>


        </div>
    </div>
@endsection
