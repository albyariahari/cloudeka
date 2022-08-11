@extends('app')

@section('meta')
    <title>{{ $productTranslate->meta_title }} - Lintasarta Cloudeka</title>
    <meta name="description" content="{{ $productTranslate->meta_description }}">
    <meta name="keywords" content=" {{ $productTranslate->meta_keyword }}">
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ '/js/owl/assets/owl.carousel.min.css' }}" />
@endpush
<style>
.price{
    color: #206EBB;
    font-size: 45px;
    width: 35rem;
    height: 7rem;
    text-align: center;
    
}
.octagon{
    list-style: none;
    font-weight: bold;
    padding-bottom: 20px;
    font-size: 20px;
}
.card-price{
    background-image: url("/imgs/card_price.jpeg");
    background-size: 37rem;
    background-repeat: no-repeat;
}
</style>
@section('content')

    <!-- Banner -->
    <div class="container-fluid banner">
        <div class="banner-title">
            <img src="{{ cloudekaBucketLocalUrl($productTranslate->images) }}" class="w-100"
                alt="Banner product detail in cloudeka">
            <h1 data-aos="fade-up" data-aos-duration="500">{{ $productTranslate->title }}</h1>
            <div class="icon-product"><img src="{{ cloudekaBucketLocalUrl($productTranslate->logo_1) }}" class="img-fluid"
                    data-aos="zoom-in" data-aos-duration="500" data-aos-delay="300" alt="Icon" /></div>
        </div>
        <br><br><br>{{ Breadcrumbs::render('products.show', $productTranslate) }}
    </div>

    <!-- Section description -->
    <section class="sections">
        <div class="container-fluid">
            <div class="row" data-aos="fade-up" data-aos-duration="500">
                <div class="col-12 col-lg-3 offset-lg-1 pb-4">
                    <h2 class="subtitle dark-color">{!! $productTranslate->subtitle !!}</h2>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="description dark-color">
                        {!! $productTranslate->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Our Price -->
    <section class="sections">
        <div class="container-fluid">
            <div class="row" data-aos="fade-up" data-aos-duration="500">
                <div class="col-12 col-lg-3 offset-lg-1 pb-4">
                    <h2 class="subtitle dark-color">Our Price</h2>
                </div>
                <div class="row">
                    <div class="col-9">
                <div class="card card-price border-0">
                    <div class="card-body">
                        <h5 class="card-title" style="color: white;">Our Deka Prime (PX1) price, start from :</h5><br><br><br>
                        <p class="card-text price"><b>Rp 551.600/mo*</b></p>
                        <div class="row">
                            <div class="col-6">
                            </div>
                            <div class="col-6" style="text-align: right">
                                <a href="#" class="btn btn-danger">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-2" style="padding-top: 3rem">
                    
                    <ul>
                        <li class="octagon"><img style="width: 16px"  src="{{ '/imgs/octagon.png' }}">&nbsp;&nbsp;1vCPU</li>
                        <li class="octagon"><img style="width: 16px"  src="{{ '/imgs/octagon.png' }}">&nbsp;&nbsp;1 GB RAM</li>
                        <li class="octagon"><img style="width: 16px"  src="{{ '/imgs/octagon.png' }}">&nbsp;&nbsp;20GB SSD</li>
                        <li class="octagon"><img style="width: 16px"  src="{{ '/imgs/octagon.png' }}">&nbsp;&nbsp;CentOS 6.10</li>
                        <li class="octagon"><img style="width: 16px"  src="{{ '/imgs/octagon.png' }}">&nbsp;&nbsp; 24GB Storage</li>
                      </ul>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- Section partners -->
    <section class="sections pt-0">
        <div class="container-fluid">
            <div class="row">
                <div class="co-12 col-lg-3 offset-lg-1 pb-4" data-aos="fade-up" data-aos-duration="500">
                    <h2 class="subtitle dark-color">{{ __('title.technology_partners') }}</h2>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="owl-carousel owl-slide owl-theme tech-partners">
                        @foreach ($productTranslate->Product->Partners as $key => $partner)
                            <div class="items" data-aos="fade-up" data-aos-duration="500"
                                data-aos-delay="{{ $key + 1 }}00">
                                <img src="{{ cloudekaBucketLocalUrl($partner->logo) }}" class="img-fluid"
                                    alt="our Partners cloudeka indonesian cloud solution" loading="lazy">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (count(
        $productTranslate->Product->UseCases()->where('status', 1)->get()) > 0)

        <!-- Section carousel -->
        <section class="sections bg-pattern">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <h2 class="subtitle light-color mb-5" data-aos="fade-up" data-aos-duration="500">
                            {{ __('title.use_case') }}</h2>

                        <div class="px-lg-5 mx-lg-2">
                            <div class="owl-carousel owl-slide owl-carousel-1 owl-theme">
                                @foreach ($productTranslate->Product->UseCases()->where('status', 1)->get() as $key => $UseCase)
                                    <div class="slide-logo-light slide-logo-light--use-cases" data-aos="fade-up"
                                        data-aos-duration="500" data-aos-delay="{{ $key + 1 }}00">
                                        <div class="img-wrapper mb-4 mt-0">
                                            <img src="{{ cloudekaBucketLocalUrl($UseCase->Client->logo) }}"
                                                class="w-auto m-auto" alt="Icon" loading="lazy">
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
            </div>
        </section>

    @endif

    @if ($packages && empty($packages)))
        <!-- Section Price Package Scenario -->
        <section class="sections sections--price">
            <div class="container-fluid">
                <div class="col-lg-2 offset-lg-1 pb-4" data-aos="fade-up" data-aos-duration="500">
                    <h2 class="subtitle dark-color mb-5">
                        {{ __('title.price_package_scenario') }}
                    </h2>
                </div>
                <div class="col-lg-10 offset-lg-1" data-aos="fade-up" data-aos-duration="500">
                    <div class="slider-package owl-carousel owl-theme">
                        @foreach ($packages as $key => $item)
                            <div class="cards__package">
                                <div class="cards__package--heading">
                                    <h2 class="subtitle txt-primary">
                                        {{ $item->name }}
                                    </h2>
                                </div>
                                <div class="cards__package--detail">
                                    <div class="description txt-light txt-primary mb-3">
                                        @if ($lang == 'en')
                                            {!! $item->excerpt_en !!}
                                        @else
                                            {!! $item->excerpt_id !!}
                                        @endif
                                    </div>
                                    <a href="{{ route('calculator', ['calculator' => $productTranslate->slug, 'package' => $item->name]) }}"
                                        class="btn btn-block btn-secondary btn-rounded btn-gradient description">
                                        {{ __('title.calculate_now') }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Section benefit -->
    <section class="sections">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-2 offset-lg-1 pb-4" data-aos="fade-up" data-aos-duration="500">
                    <h2 class="subtitle dark-color mb-5">
                        {{ __('title.features_and_benefit', ['product' => $productTranslate->title]) }}</h2>
                </div>
                <div class="col-lg-8 dark-color pt-2">
                    <div class="row product-lists owl-carousel owl-theme">
                        @foreach ($productTranslate->Product->Benefits as $key => $benefit)
                            <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5" data-aos="fade-up"
                                data-aos-duration="500" data-aos-delay="{{ $key + 2 }}00">
                                <img src="{{ cloudekaBucketLocalUrl($benefit->translate($lang)->icon) }}"
                                    class="img-fluid" style="max-width: 100px; height:100px;" alt="Icon"
                                    loading="lazy">
                                <h4 class="mt-4 mb-3">{!! $benefit->translate($lang)->title !!}</h4>
                                <div class="description">
                                    {!! $benefit->translate($lang)->description !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column flex-md-row align-items-center justify-content-center mt-3">
                <a href="{{ route('calculator', ['calculator' => $productTranslateEN->slug]) }}"
                    class="btn btn-secondary btn-rounded mx-2 px-4 btn-gradient min-width mt-2 description">{{ __('title.see_pricing') }}</a>
                <a href="{{ route('product.index') }}"
                    class="btn btn-secondary btn-rounded mx-2 px-4 btn-gradient min-width mt-2 description">{{ __('title.see_all_products') }}</a>
                <a href="https://cmd.cloudeka.id/"
                    class="btn btn-secondary btn-rounded mx-2 px-4 btn-gradient min-width mt-2 description">Portal</a>
                <a href="{{ route('contact-us') }}"
                    class="btn btn-secondary btn-rounded mx-2 px-4 btn-gradient min-width mt-2 description">{{ __('title.contact_us') }}</a>
            </div>
        </div>
    </section>

    @if (count($productTranslate->Product->Solutions) > 0)
        <div id="other-products" class="container-fluid">
            <div class="container-fluid">
                <div class="row">
                    <div class="offset-lg-1 col-lg-10 text-center">
                        <h3 class="light-color font-25 mb-5" data-aos="fade-up" data-aos-duration="500"
                            data-aos-delay="{{ $key + 1 }}00">
                            {{ __('title.see_our_solutions', ['product' => $productTranslate->title]) }}</h3>
                        <div class="owl-carousel owl-slide owl-carousel-2 owl-theme">
                            @foreach ($productTranslate->Product->Solutions as $key => $solution)
                                <div class="slide-logo-light" data-aos="fade-up" data-aos-duration="500"
                                    data-aos-delay="{{ $key + 2 }}00">
                                    <img src="{{ cloudekaBucketLocalUrl($solution->translate($lang)->logo_2) }}"
                                        class="img-fluid" style="max-height: 36px;margin-bottom: 7px;"
                                        alt="Icon Product cloudeka indonesian cloud solutions" loading="lazy">
                                    <h3>{{ $solution->translate($lang)->title }}</h3>
                                    <p class="text-center mt-1 description">
                                        <!-- {{ $solution->translate($lang)->excerpt }} -->
                                        {{ \Illuminate\Support\Str::words($solution->translate($lang)->excerpt, 10, '...') }}
                                        <a href="{{ route('solution.show', $solution->translate($lang)->slug) }}">Read
                                            More</a>
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@stop

@push('scripts')
    <script src="{{ '/js/owl/owl.carousel.min.js' }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.carousel').carousel();

            var owlItem1 = $('.owl-carousel-1').find('img').length;

            $('.owl-carousel-1').owlCarousel({
                items: 1,
                loop: false,
                margin: 20,
                nav: true,
                responsive: {
                    1365: {
                        items: 4,
                        loop: (owlItem1 > 4),
                    },
                    1025: {
                        items: 3,
                        loop: (owlItem1 > 3),
                    },
                    600: {
                        items: 2,
                        loop: (owlItem1 > 2),
                    }
                }
            });

            $('.slider-package').owlCarousel({
                items: 1,
                loop: false,
                stagePadding: 20,
                margin: 20,
                nav: true,
                responsive: {
                    1365: {
                        items: 4
                    },
                    1025: {
                        items: 3
                    },
                    600: {
                        items: 2
                    }
                }
            });

            @if (count($productTranslate->Product->Solutions) > 5)
                $('.owl-carousel-2').owlCarousel({
                    items: 1,
                    loop: true,
                    margin: 10,
                    nav: true,
                    responsive: {
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
            @else
                $('.owl-carousel-2').owlCarousel({
                    items: 1,
                    loop: false,
                    margin: 10,
                    nav: true,
                    responsive: {
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
            @endif

            $('.tech-partners').owlCarousel({
                items: 1,
                loop: false,
                margin: 40,
                nav: true,
                responsive: {
                    992: {
                        items: 3
                    },
                    700: {
                        items: 2
                    }
                }
            });
        });

        $(function() {
            var owl = $('.product-lists'),
                owlOptions = {
                    loop: true,
                    margin: 5,
                    nav: true,
                    items: 1,
                    responsive: {
                        600: {
                            items: 2
                        }
                    }
                };

            if ($(window).width() < 992) {
                var owlActive = owl.owlCarousel(owlOptions);
            } else {
                owl.addClass('off');
            }

            $(window).resize(function() {
                if ($(window).width() < 992) {
                    if ($('.product-lists').hasClass('off')) {
                        var owlActive = owl.owlCarousel(owlOptions);
                        owl.removeClass('off');
                    }
                } else {
                    if (!$('.product-lists').hasClass('off')) {
                        owl.addClass('off').trigger('destroy.owl.carousel');
                        owl.find('.owl-stage-outer').children(':eq(0)').unwrap();
                    }
                }
            });
        });
    </script>
@endpush
