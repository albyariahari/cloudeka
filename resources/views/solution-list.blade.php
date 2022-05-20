@extends('app')

@section('meta')
<meta name="description" content="{{$metadata->meta_description }}">
<meta name="keywords" content=" {{ $metadata->meta_keyword }}">
<title>{{$metadata->meta_title}} - Lintasarta Cloudeka</title>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ '/js/owl/assets/owl.carousel.min.css' }}" />
@endpush

@section('content')

    <!-- Banner -->
    <div class="container-fluid banner">
        <div id="bannerHome" class="carousel slide carousel-fade" >
            <div class="carousel-indicators">
                @foreach ($slideshows as $slideshow)
                <button type="button" data-target="#bannerHome" data-slide-to="{{ $loop->index }}" class="{{ $loop->index === 0 ? 'active':'' }}" aria-current="{{ $loop->index === 0 ? 'true':'false' }}" aria-label="Slide 1"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($slideshows as $slideshow)

                <div class="carousel-item {{$loop->index === 0 ? 'active':''}}">
                    <div class="android-only">
                        <h1 class="light-color">{{ $slideshow->translate($lang)->title }}</h1>
                    </div>
                    <img src="{{ cloudekaBucketLocalUrl($slideshow->image) }}" class="d-block w-100" alt="Banner solution list">
                    <div class="carousel-caption">
                        <h1 class="light-color android-none" data-aos="fade-up" data-aos-duration="500">{{ $slideshow->translate($lang)->title }}</h1>
                        <div class="description" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                            {!! $slideshow->translate($lang)->description !!}
                        </div>
                    </div>
                </div>
                
                @endforeach
            </div>
        </div>
        {{ Breadcrumbs::render('solutions') }}
    </div>


    <!-- Section Featured -->
    <section class="sections custom-rangga-pt-xs-0">
        <div class="container-fluid">
            <div class="row" data-aos="fade-up" data-aos-duration="500">
                <div class="col-12 col-lg-3 offset-lg-1 pb-4 pt-5 pt-lg-0">
                    <h2 class="subtitle dark-color">{!! $featured->title !!}</h2>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="description dark-color">
                        {!! $featured->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Solution Segmentation -->
    <section class="sections pt-0" id="product-category">
        <div class="container-fluid">
            <div class="row" data-aos="fade-up" data-aos-duration="500">
                <div class="col-12 col-lg-4 left-section" >
                    <h2 class="light-color ml-30">{!! $solutions['title'] !!}</h2>
                    <div class="mobile-only selected-menu" onclick="openmenu()">
                        <span>{{ $solutions['data'][0]->title }}</span> <i class="icon-arrow-right"></i>
                    </div>
                    <ul class="desktop-overflow">
                        @foreach ($solutions['data'] as $key => $solution)
                        <li id="{{$solution->slug}}-menu" class="{{$loop->index === 0 ? 'shown':''}}"><a onclick="detail('{{$solution->slug}}')"><span>{{$solution->translate($lang)->title}}</span> <i class="icon-arrow-right"></i> </a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-12 col-lg-8 right-section">
                    @foreach ($solutions['data'] as $solution)
                    <div class="content-section {{$loop->index === 0 ? 'shown':''}}" id="{{$solution->slug}}">
                        <div class="d-lg-flex align-items-center mb-4 text-center">
                            <h1 class="text-center text-lg-left mb-4 mb-lg-0">{{$solution->translate($lang)->title}} </h1>
                            <a href="/solutions/{{$solution->translate($lang)->slug}}" class="rounded-badge">{{__('title.see').' '.$solution->translate($lang)->title}}</a>
                        </div>
                        <div class="owl-carousel owl-theme owl-slide owl-certification">
                            @foreach ($solution->Products as $product)
                                
                            <div class="slide-carousel text-center"> 
                                <div class="icon mb-3">
                                    <img src="{{ cloudekaBucketLocalUrl($product->translate($lang)->logo_1) }}" class="img-fluid" alt="Icon" loading="lazy">
                                </div>
                                <h4>{{$product->translate($lang)->title}}</h4>
                                <p class="description text-center">{{$product->translate($lang)->excerpt}}</p>
                                <a href="{{ route('product.show',$product->translate($lang)->slug) }}" class="btn btn-primary btn-gradient btn-rounded px-4">{{ __('title.read_more') }}</a>
                            </div>

                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    @include('layouts.subscription')

@stop

@push('scripts')
    <script src="{{ '/js/owl/owl.carousel.min.js' }}"></script>
    <script type="text/javascript">

        function detail(id, title) {
            $("section .content-section, .left-section ul li").removeClass('shown');
            $('section .left-section ul').toggleClass('shown');
            $("#"+id).addClass('shown');
            $("#menu-"+id).addClass('shown');
            $(".selected-menu span").text(title);
        }
        function openmenu() {
            $('section .left-section ul').toggleClass('shown');
        }
        $(document).ready(function(){
            $('.carousel').carousel();

            $('.owl-slide').owlCarousel({
                items:1,
                loop:false,
                margin:20,
                nav: false,
                dots: true,
                responsiveClass:true,
                responsive:{
                    600:{
                        items:2
                    },
                    1365:{
                        nav: true,
                        items:3
                    }
                }
            });
        });
    </script>
@endpush
