@extends('app')

@section('meta')
<title>Price Calculator - Lintasarta Cloudeka</title>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />

    <style>
    .visible-false{
        display: none;
    }
    </style>

    <style>
        div#form-area label {
            text-align: left;
            width: 100%;
        }

        div#form-area {
            margin-top: 35px;
            padding: 0px 16px;
        }

        div#form-area input {
            padding: 5px 15px;
        }
    </style>
@endpush

@section('content')
    <!-- Banner -->
    <section class="calculator-banner">
        <div class="container-fluid px-0">
            <div class="banner-title">
                <img src="{{ cloudekaBucketLocalUrl($banner->image_1) }}" class="w-100" alt="Why Lintasarta cloud">
                <img src="{{ cloudekaBucketLocalUrl($banner->image_2) }}" class="img-fluid document-svg" alt="Icon">
                <div class="text">
                    <h2 class="light-color" data-aos="fade-up" data-aos-duration="700">{{ $banner->title }}</h2>
                    <!-- <p class="light-color d-none d-lg-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
                </div>
            </div>
        </div>
    </section>

    <div id="app" data-aos="fade-up" data-aos-duration="700" data-aos-delay="500" data-lang="{{ $lang }}">
        <prototype-calculator></prototype-calculator>
    <div>
@stop

@push('scripts')
    <!-- <script src="{{  '/js/app.js' }}"></script> -->
    <script>
        $(document).ready(function(){
            $('.modal-calculator').prependTo('main')
        });
    </script>
@endpush


