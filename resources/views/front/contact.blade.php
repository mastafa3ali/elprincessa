@extends('front.layout.app')
@section('css')
    <style>
        .responsive-map{
            overflow: hidden;
            padding-bottom:56.25%;
            position:relative;
            height:0;
        }
        .responsive-map iframe{
            left:0;
            top:0;
            height:100%;
            width:100%;
            position:absolute;
        }
    </style>
@endsection
@section('content')
<div class="page-hero h-400 bg-image overlay-dark" style="background-image: url({{ asset('front') }}/img/banner.png">
    <div class="hero-section">

      <div class="container text-center wow zoomIn">
        <h1 class="text-primary">اتصل بنا </h1>
        <img src="{{ asset('front') }}/img/ornament-slider-white-01.png" class="spread-img">
      </div>
    </div>
</div>
@include('front.contactform')
@endsection
