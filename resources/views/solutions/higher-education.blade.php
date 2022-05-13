@extends('app')

@push('styles')
    <link rel="stylesheet" href="/js/owl/assets/owl.carousel.min.css" />
@endpush

@section('content')

    <!-- Banner -->
    <div class="container-fluid banner">
        <div class="banner-title">
            <img src="/imgs/solutions/solution-detail.jpg" alt="Higher Education" class="w-100">
            <h1>Higher Education</h1>
            <div class="icon-product"><i class="icon-education my-auto"></i></div>
        </div>
    </div>

    <!-- Section description -->
    <section class="sections">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-xl-3 offset-xl-1 pr-5">
                    <h2 class="subtitle dark-color">Why Choose Us For<br>Higher Education<br>Solutions?</h2>
                </div>
                <div class="col-lg-8 col-xl-7 dark-color" >
                    <p>Lintasarta offers a comprehensive range of solutions to address a variety of needs in terms of delivering information and enabling communication between the government and the wider public. Lintasarta’s communications solutions enhance the efficiency and effectiveness of delivering information and enabling communication, thereby allowing government institutions to respond swiftly, appropriately, effectively and accurately to evolving issues in society.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section carousel -->
    {{--  <section class="sections bg-pattern sections--sd-slider">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h2 class="subtitle light-color mb-5">Uses Cases</h2>

                    <div class="owl-carousel owl-slide owl-carousel-1 owl-theme">
                        <div class="slide-logo-light">
                            <img src="/imgs/solutions/startup.svg" height="120" class="mb-3 w-auto mx-auto">
                            <h3 class="muted">“something exciting is coming to town”</h3>
                        </div>
                        <div class="slide-logo-light">
                            <img src="/imgs/solutions/startup.svg" height="120" class="mb-3 w-auto mx-auto">
                            <h3 class="muted">“something exciting is coming to town”</h3>
                        </div>
                        <div class="slide-logo-light">
                            <img src="/imgs/solutions/startup.svg" height="120" class="mb-3 w-auto mx-auto">
                            <h3 class="muted">“something exciting is coming to town”</h3>
                        </div>
                        <div class="slide-logo-light">
                            <img src="/imgs/solutions/startup.svg" height="120" class="mb-3 w-auto mx-auto">
                            <h3 class="muted">“something exciting is coming to town”</h3>
                        </div>
                        <div class="slide-logo-light">
                            <img src="/imgs/solutions/startup.svg" height="120" class="mb-3 w-auto mx-auto">
                            <h3 class="muted">“something exciting is coming to town”</h3>
                        </div>
                        <div class="slide-logo-light">
                            <img src="/imgs/solutions/startup.svg" height="120" class="mb-3 w-auto mx-auto">
                            <h3 class="muted">“something exciting is coming to town”</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  --}}

    <!-- Section benefit -->
    <section class="sections">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-2 offset-lg-1">
                    <h2 class="subtitle dark-color mb-5">Our Product<br>Solution</h2>
                </div>
                <div class="col-lg-8 dark-color pt-2">
                    <div class="row mb-3 product-solutions owl-carousel owl-theme">
                        <div class="col-md-6 col-lg-4 mb-5 px-md-3 px-xl-4">
                            <div class="d-flex align-items-center mb-4">
                                <i class="icon-cloud-premium rounded-icon mr-3 filled"></i>
                                <h4>Cloud<br>Premium</h4>
                            </div>
                            <p>Public Cloud service equipped with comprehensive features that will support your business.</p>
                            <a href="#" class="read-more">Read more <i class="icon-arrow-right  font-20"></i></a>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-5 px-md-3 px-xl-4">
                            <div class="d-flex align-items-center mb-4">
                                <i class="icon-cloud-premium rounded-icon mr-3 filled"></i>
                                <h4>Cloud<br>Lite</h4>
                            </div>
                            <p>Public Cloud service with pay-per-use model and simple VM deployment.</p>
                            <a href="#" class="read-more">Read more <i class="icon-arrow-right font-20"></i></a>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-5 px-md-3 px-xl-4">
                            <div class="d-flex align-items-center mb-4">
                                <i class="icon-cloud-premium rounded-icon mr-3 filled"></i>
                                <h4>Media<br>Anaytics</h4>
                            </div>
                            <p>Data Analytics service based on Social Intelligence technology to generate analytical reports for your company’s brand from digital media .</p>
                            <a href="#" class="read-more">Read more <i class="icon-arrow-right font-20"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-center">
                <button class="btn btn-secondary btn-rounded mx-2 px-4 font-20">Get Solution Now</button>
            </div>
        </div>
    </section>

    @include('layouts.subscription')

@stop

@push('scripts')
    <script src="/js/owl/owl.carousel.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.carousel').carousel();
            $('.owl-carousel-1').owlCarousel({
                loop:true,
                margin:40,
                nav: true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                    },
                    992:{
                        items:2
                    },
                    1200:{
                        items:3
                    },
                    1366:{
                        items:4
                    }
                }
            });
            $('.owl-carousel-2').owlCarousel({
                items:3,
                loop:true,
                margin:30,
                nav: true,
                responsive:{
                    600:{
                        items:5
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
                        600:{
                            items:2
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
