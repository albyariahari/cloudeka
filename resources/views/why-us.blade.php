@extends('app')

@section('meta')
<title>{{$metadata->meta_title}} - Lintasarta Cloudeka</title>
<meta name="description" content="{{$metadata->meta_description }}">
<meta name="keywords" content=" {{ $metadata->meta_keyword }}">
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ '/js/owl/assets/owl.carousel.min.css' }}" />
@endpush

@section('content')

    <!-- Banner -->
    <div class="container-fluid banner">
        <img src="{{ cloudekaBucketLocalUrl($banner->image_1) }}" class="w-100" alt="Why Lintasarta cloud Local Expertise Communicative For All Business Model indonesian cloud partners">
        {{ Breadcrumbs::render('why-us') }}
    </div>

    <!-- Section Milestone -->
    <section class="sections">
        <div class="container-fluid">
            <div class="row" data-aos="fade-up" data-aos-duration="500">
                <div class="col-12 col-lg-3 offset-lg-1 pb-4">
                    <h2 class="subtitle dark-color">{!! $whoWeAre->title !!}</h2>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="description dark-color">
                        {!! $whoWeAre->description !!}
                    </div>
                </div>
            </div>
            <div class="row mt-5" data-aos="fade-up" data-aos-duration="500">
                <div class="col-12 col-lg-3 offset-lg-1 pb-4">
                    <h2 class="subtitle dark-color">{!! $whyChoose->title !!}</h2>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="description dark-color">
                        {!! $whyChoose->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section milestone carousel -->
    <section class="sections bg-pattern">
        <div class="container-fluid">

            <div class="row mt-lg-4">
                <div class="col-12 col-lg-3 offset-lg-1 pb-4" data-aos="fade-up" data-aos-duration="500">
                    <h2 class="subtitle light-color">{!! $milestone['title'] !!}</h2>
                </div>
                <div class="col-12 col-lg-7">

                    <div class="owl-carousel owl-theme owl-slide" id="owl-milestone">
                        @foreach ($milestone['data'] as $key => $item)

                        <div class="slide-milestone" data-aos="fade-up" data-aos-duration="500" data-aos-delay="{{ $key + 1 }}00">
                            <div class="cover" style="background-image: url('{{ cloudekaBucketLocalUrl($item->image_1) }}')">
                                <h1>{!! $item->title !!}</h1>
                            </div>
                            <div class="cover-desc" >
                                <h2 class="mx-4">{!! $item->title !!}</h2>
                                <div class="description dark-color mx-4 my-auto">
                                    {!! $item->description !!}
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Section Certification -->
    <section class="sections">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-3 offset-lg-1" data-aos="fade-up" data-aos-duration="500">
                    <h2 class="subtitle dark-color">{!! $certification['title'] !!}</h2>
                </div>
                <div class="col-12 col-lg-7">

                    <div class="owl-carousel owl-theme owl-slide owl-certification">
                        @foreach ($certification['data'] as $key => $item)

                        <div class="slide-carousel" data-aos="fade-up" data-aos-duration="500" data-aos-delay="{{ $key + 1 }}00">
                            <div class="img-wrapper">
                                <img src="{{$item->translate($lang)->image_1 !== null ? cloudekaBucketLocalUrl($item->translate($lang)->image_1) : '/imgs/why-us/iso27001.jpg'}}"  class="w-auto" alt="Certification" loading="lazy">
                            </div>
                            <strong>{!! $item->translate($lang)->title !!}</strong>
                            <div class="description">
                                {!! $item->translate($lang)->description !!}
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Section Part of Lintasarta -->
    <section class="sections pt-0">
        <div class="container-fluid">
            <div class="row" data-aos="fade-up" data-aos-duration="500">
                <div class="col-12 col-lg-3 offset-lg-1 pb-4">
                    <h2 class="subtitle dark-color">{!! $partOf->title !!}</h2>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="description dark-color">
                        {!! $partOf->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Awards -->
    <section class="sections pt-0 custom-rangga">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-3 offset-lg-1 pb-0 pb-lg-4" data-aos="fade-up" data-aos-duration="500">
                    <h2 class="subtitle dark-color">{!! $awards['title'] !!}</h2>
                </div>
                <div class="col-12 col-lg-8">

                <div class="row awards-wrapper" data-aos="fade-up" data-aos-duration="500">
                    <div class="col-12 col-lg-2 left-section left-section--years">
                        <ul class="owl-carousel owl-theme owl-slide owl-years flex-column w-100">
                            @foreach ($awards['data'] as $key => $award)
                            <li class="no-border {{$loop->index === 0 ? 'active':''}}" id="{{$key}}-menu"><a onclick="detail('{{$key}}')"><span>{{$key}}</span> <i class="icon-arrow-right"></i> </a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-12 col-lg-9 right-section right-section--awards">
                        @foreach ($awards['data'] as $key => $award)

                        <div class="content-section {{$loop->index === 0 ? 'shown':''}}" id="{{$key}}">
                            <div class="owl-carousel owl-theme owl-slide owl-awards">
                                @foreach ($award as $item)

                                <div class="slides"><div class="date-awards">{{\Carbon\Carbon::parse($item->created_at)->format('M, Y')}}</div>
                                    <img src="{{ cloudekaBucketLocalUrl($item->image_1) }}" class="w-100 mb-3" alt="Awards" loading="lazy">
                                    <div class="description dark-color">
                                        {!! $item->description !!}
                                    </div>
                                </div>

                                @endforeach
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Partners -->
    <section class="sections sections--partners">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-3 offset-lg-1 pb-4" data-aos="fade-up" data-aos-duration="500">
                    <h2 class="subtitle dark-color">{!! $partners['title'] !!}</h2>
                </div>
                <div class="col-12 col-lg-7">

                    <div class="owl-carousel owl-theme owl-slide owl-partners">
                        @foreach ($partners['data'] as $key => $partner)
                        <div class="slide-carousel" data-aos="fade-up" data-aos-duration="500" data-aos-delay="{{ $key + 1 }}00">
                            <img src="{{ cloudekaBucketLocalUrl($partner->logo) }}" class="w-100" alt="{{$partner->title}}" loading="lazy">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.subscription')

@stop

@push('scripts')
    <script src="{{ '/js/owl/owl.carousel.min.js' }}"></script>
    <script type="text/javascript">
        function detail(id) {
            $('section .left-section ul li').removeClass('active');
            $("section .content-section").removeClass('shown');
            $("#"+id).addClass('shown');
            $("#"+id+'-menu').addClass('active');
        }
        $(document).ready(function(){
            $('#owl-milestone').owlCarousel({
                center: false,
                items:1,
                loop:false,
                margin:10,
                nav: true,
                responsive:{
                    400:{
                        items:2
                    },
                    1200:{
                        items:3
                    }
                }
            });
            $('.owl-certification, .owl-partners').owlCarousel({
                items:2,
                loop:false,
                margin:40,
                nav: true,
                responsive:{
                    600:{
                        items:4
                    }
                }
            });
            $('.owl-awards').owlCarousel({
                items:1,
                loop:false,
                margin:40,
                nav: true,
                dots: false,
                responsive:{
                    600:{
                        items:2
                    }
                }
            });

        });

        $(function() {
            var owl = $('.owl-years'),
                owlOptions = {
                    loop: false,
                    margin: 40,
                    dots:false,
                    nav: false,
                    items: 1,
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
