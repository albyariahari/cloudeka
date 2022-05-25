@extends('app')

@section('meta')
{{-- <meta name="description" content="{{$product->meta_description }}">
<meta name="keywords" content=" {{ $product->meta_keyword }}">
<title>{{$product->meta_title}} - Lintasarta Cloudeka</title> --}}
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ '/js/owl/assets/owl.carousel.min.css' }}" />
@endpush

@section('content')

    <!-- Banner -->
    <div class="container-fluid banner">
        <div class="banner-title">
            <img src="{{ cloudekaBucketLocalUrl($solutionTranslate->images)}}" class="w-100" alt="Banner image solution detail cloudeka">
            <h1 data-aos="fade-up" data-aos-duration="500">{{$solutionTranslate->title}} Solution</h1>
            <div class="icon-product"><img src="{{ cloudekaBucketLocalUrl($solutionTranslate->logo_1) }}" alt="solution detail cloudeka" class="img-fluid" style="max-height: 60px;" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="300" alt="Icon banner"></div>
        </div>
        {{ Breadcrumbs::render('solutions.show',$solutionTranslate) }}
    </div>

    <!-- Section description -->
    <section class="sections">
        <div class="container-fluid">
            <div class="row" data-aos="fade-up" data-aos-duration="500">
                <div class="col-lg-4 col-xl-3 offset-xl-1 pr-5">
                    <h2 class="subtitle dark-color">{!! $solutionTranslate->subtitle !!}</h2>
                </div>
                <div class="col-lg-8 col-xl-7 dark-color" >
                    <div class="description">
                        {!! $solutionTranslate->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@if (count($solutionTranslate->Solution->UseCases()->where('status', 1)->get()) > 0)

    <!-- Section carousel -->
    <section class="sections bg-pattern sections--sd-slider">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h2 class="subtitle light-color mb-5" data-aos="fade-up" data-aos-duration="500">{{ __('title.use_case') }}</h2>

                    <div class="owl-carousel owl-slide owl-carousel-1 owl-theme">
                        @foreach ($solutionTranslate->Solution->UseCases()->where('status', 1)->get() as $key => $UseCase)
                            <div class="slide-logo-light slide-logo-light--use-cases" data-aos="fade-up" data-aos-duration="500" data-aos-delay="{{ $key + 1 }}00">
                                <div class="img-wrapper mb-4 mt-0">
                                    <img src="{{ cloudekaBucketLocalUrl($UseCase->Client->logo) }}" class="w-auto m-auto" alt="Carousel Icon solution detail cloudeka" loading="lazy">
                                </div>
                                <div class="description">
                                    {!! $UseCase->translate($lang)->description !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

    <!-- Section benefit -->
    <section class="sections">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-2 offset-lg-1">
                    <h2 class="subtitle dark-color mb-5" data-aos="fade-up" data-aos-duration="500">{!! __('title.our_product_solution') !!}</h2>
                </div>
                <div class="col-lg-8 dark-color pt-2">
                    <div class="row mb-5 product-solutions owl-carousel owl-theme">
                        @foreach ($solutionTranslate->Solution->Products as $key => $product)
                            
                        <div class="col-lg-4 mb-lg-5 px-md-3 px-xl-4" data-aos="fade-up" data-aos-duration="500" data-aos-delay="{{ $key + 2 }}00">
                            <div class="d-flex align-items-center mb-4 box-icon">
                                <div class="wrapper">
                                    <div class="icon">
                                        <img width="70" height="70" src="{{ cloudekaBucketLocalUrl($product->translate($lang)->logo_1) }}" class="img-fluid" alt="Icon benefit logo solution detail cloudeka" loading="lazy">
                                    </div>
                                </div>
                                <h4>{!! $product->translate($lang)->title !!}</h4>
                            </div>
                            <p class="description">{{$product->translate($lang)->excerpt}}</p>
                            <a href="{{route('product.show',$product->translate($lang)->slug)}}" class="read-more">{{ __('title.read_more') }} <i class="icon-arrow-right  font-20"></i></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-center mt-lg-5">
                <a href="{{ route('contact-us') }}" class="btn btn-secondary btn-rounded mx-2 px-4 font-20">{{ __('title.get_solution_now') }}</a>
            </div>
        </div>
    </section>

    {{-- Section Become Partner --}}
    @if(!empty($solutionTranslate->bottom_image))
    <section class="sections pt-0">
        <div class="container-fluid">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="500">
                <div class="col-12 col-lg-10">
                    <div class="card text-white bg-solutions become--partner--card">
                        <img src="{{ cloudekaBucketLocalUrl($solutionTranslate->bottom_image) }}" alt="solution detail cloudeka">
                        <div class="card-body">
                            <div class="become--partner--card--wrapper" >   
                                @if (!empty($solutionTranslate->bottom_title))
                                    <h2 class="mb-3">{!! $solutionTranslate->bottom_title !!}</h2>    
                                @endif
								
                                @if (!empty($solutionTranslate->bottom_description))
                                    {!! $solutionTranslate->bottom_description !!}    
                                @endif
								
                                @if (!empty($solutionTranslate->bottom_url) && !empty($solutionTranslate->bottom_link))
                                    <a href="{!! $solutionTranslate->bottom_url !!}" class="btn become--partner--btn mb-2 mr-2">
                                        {!! $solutionTranslate->bottom_link !!}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    {{-- Section Become Partner --}}

    @include('layouts.subscription')

@stop

@push('scripts')
    <script src="{{ '/js/owl/owl.carousel.min.js' }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.carousel').carousel();

            var owlItem1 = $('.owl-carousel-1').find('img').length;
        
            $('.owl-carousel-1').owlCarousel({
                loop:true,
                margin:40,
                nav: true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        loop: (owlItem1 > 1)
                    },
                    992:{
                        items:2,
                        loop: (owlItem1 > 2)
                    },
                    1200:{
                        items:3,
                        loop: (owlItem1 > 3)
                    },
                    1366:{
                        items:4,
                        loop: (owlItem1 > 4)
                    }
                }
            });
            $('.owl-carousel-2').owlCarousel({
                items:3,
                loop:true,
                margin:30,
                nav: true,
                responsive:{
                    1365: {
                    items: 5
                    },
                    992: {
                        items: 4
                    },
                    600: {
                        items: 3
                    }
                }
            });
        });

        $(function() {
            var owl = $('.product-solutions'),
                owlOptions = {
                    loop: true,
                    margin: 0,
                    nav: true,
                    items: 1,
                    responsive:{
                        576:{
                            items:2
                        },
                        765:{
                            items:3
                        }
                    }
                };

            if ( $(window).width() < 992 ) {
                var owlActive = owl.owlCarousel(owlOptions);
            } else {
                owl.addClass('off');
            }

            $(window).resize(function() {
                if ( $(window).width() < 992 ) {
                    if ( $('.owl-carousel').hasClass('off') ) {
                        var owlActive = owl.owlCarousel(owlOptions);
                        owl.removeClass('off');
                    }
                } else {
                    if ( !$('.owl-carousel').hasClass('off') ) {
                        owl.addClass('off').trigger('destroy.owl.carousel');
                        owl.find('.owl-stage-outer').children(':eq(0)').unwrap();
                    }
                }
            });
        });
    </script>
@endpush
