@extends('app')

@push('styles')
    <link rel="stylesheet" href="/js/owl/assets/owl.carousel.min.css" />
@endpush

@section('content')

    <!-- Banner -->
    <div class="container-fluid banner">
        <div class="banner-title">
            <img src="/imgs/products/banners/media-analytics.png" alt="Media Analytics cloudeka " class="w-100">
            <h1>Media Analytics</h1>
            <div class="icon-product"><img src="/imgs/solutions/svg/solutions/products/cloud-premium-2.svg" class="img-fluid" /></div>
        </div>

    </div>

    <!-- Section description -->
    <section class="sections">
        <div class="container-fluid">
            <div class="row">
                <div class="co-12 col-lg-3 offset-lg-1 pb-4">
                    <h2 class="subtitle dark-color">What is <br>Media Analytics</h2>
                </div>
                <div class="co-12 col-lg-7 dark-color" >
                    <p>Lintasarta Media Analytics is a social intelligence application that generates social insights by summarizing, analyzing, and monitoring public sentiments and trending issues from conversations happening in social media & online media. </p>
                    <p>With Lintasarta Media Analytics, you can monitor and listen to multiple channels from a single easy-to-use dashboard and respond in real-time. Lintasarta Media Analytics is a fully managed service from installation, transition, and maintenance conducted by Lintasarta Cloudeka professional technicians team who hold international certifications. </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section partners -->
    <section class="sections pt-0">
        <div class="container-fluid">
            <div class="row">
                <div class="co-12 col-lg-3 offset-lg-1 pb-4">
                    <h2 class="subtitle dark-color">Technology partners</h2>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="d-flex w-100 justify-content-center justify-content-lg-start">
                        <img src="/imgs/products/kazee.png">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section carousel -->
    <section class="sections bg-pattern">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <h2 class="subtitle light-color mb-5">Uses Cases</h2>

                    <div class="px-lg-5 mx-lg-2">
                        <div class="owl-carousel owl-slide owl-carousel-1 owl-theme">

                            <div class="slide-logo-light slide-logo-light--use-cases">
                                <div class="img-wrapper mb-4 mt-0">
                                    <img src="/imgs/solutions/ojk.png" class="w-auto m-auto">
                                </div>
                                <p>Kominfo Pusbang uses Cloud Bucket from Lintasarta Cloudeka for data storage in the backend that can be accessed by more than 1.000 users.</p>
                            </div>
                            <div class="slide-logo-light slide-logo-light--use-cases">
                                <div class="img-wrapper mb-4 mt-0">
                                    <img src="/imgs/solutions/diskominfo-pinang.png" class="w-auto m-auto">
                                </div>
                                <p>BKKBN has successfully used Cloud Deploy by Lintasarta Cloudeka service for the deployment of a family information system web application and as an Indonesian family database.</p>
                            </div>
                            <div class="slide-logo-light slide-logo-light--use-cases">
                                <div class="img-wrapper mb-4 mt-0">
                                    <img src="/imgs/solutions/langkat.png" class="w-auto m-auto">
                                </div>
                                <p>“something exciting is coming to town”</p>
                            </div>
                            <div class="slide-logo-light slide-logo-light--use-cases">
                                <div class="img-wrapper mb-4 mt-0">
                                    <img src="/imgs/solutions/kementrian-kalimanan-utara.png" class="w-auto m-auto">
                                </div>
                                <p>“something exciting is coming to town”</p>
                            </div>
                            <div class="slide-logo-light slide-logo-light--use-cases">
                                <div class="img-wrapper mb-4 mt-0">
                                    <img src="/imgs/solutions/startup.svg" class="w-auto m-auto">
                                </div>
                                <p>“something exciting is coming to town”</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section benefit -->
    <section class="sections">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-2 offset-lg-1 pb-4">
                    <h2 class="subtitle dark-color mb-5">Media Analytics <br>Features and Benefit</h2>
                </div>
                <div class="col-lg-8 dark-color pt-2">
                    <div class="row product-lists owl-carousel owl-theme">
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/the-best-choice-for-needs.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">The Best Choice<br>
                                For Your Needs</h4>
                                <p>Track, detect and monitor all mentions about your brands on digital platforms, conduct competitor analysis, and learn about market trends that suit your business area and field.
                                </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/must-have-data-analyst.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">A Must-Have<br>
                                Data Analysis</h4>
                                <p>Offers a complete analysis ranging from social media and online media analysis, competitor analysis, trend analysis, spatial analysis, sentiment analysis, and influence analysis.</p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/security-and-compilance.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">Security And Compliance</h4>
                            <p>Deployed in PCI DSS-certified Cloud which will be annually audited. PCI DSS is a reference to high-quality Service Level Agreement (SLA) and security of crucial customer data that is securely stored on a Cloud server.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column flex-md-row align-items-center justify-content-center mt-3">
                <button class="btn btn-secondary btn-rounded mx-2 px-4 btn-gradient min-width mt-2">See Pricing</button>
                <a href="/products" class="btn btn-secondary btn-rounded mx-2 px-4 btn-gradient min-width mt-2">See All Products</a>
            </div>
        </div>
    </section>

    <div id="other-products" class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-1 col-10 text-center">
                    <h3 class="light-color mb-5">See Our Solutions Industry Covered by <strong>Cloud Bucket</strong> Product</h3>
                    <div class="owl-carousel owl-slide owl-carousel-2 owl-theme">
                        <div class="slide-logo-light">
                            <img src="/imgs/solutions/svg/solutions/government-blue.svg" class="img-fluid" style="max-height: 36px;margin-bottom: 7px;">
                            <h3>Government</h3>
                            <p class="text-left mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                        </div>
                        <div class="slide-logo-light">
                            <img src="/imgs/solutions/svg/solutions/higher-education-blue.svg" class="img-fluid" style="max-height: 36px;margin-bottom: 7px;">
                            <h3>Higher Education</h3>
                            <p class="text-left mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                        </div>
                        <div class="slide-logo-light">
                            <img src="/imgs/solutions/svg/solutions/hospital-blue.svg" class="img-fluid" style="max-height: 36px;margin-bottom: 7px;">
                            <h3>Hospital</h3>
                            <p class="text-left mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@push('scripts')
    <script src="/js/owl/owl.carousel.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.carousel').carousel();
            $('.owl-carousel-1').owlCarousel({
                items:1,
                loop:true,
                margin:20,
                nav: true,
                responsive:{
                    1365:{
                        items:4
                    },
                    1025:{
                        items:3
                    },
                    600:{
                        items:2
                    }
                }
            });
            $('.owl-carousel-2').owlCarousel({
                items:1,
                loop:true,
                margin:10,
                nav: true,
                responsive:{
                    1200:{
                        items:5
                    },
                    992:{
                        items:4
                    },
                    600:{
                        items:3
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
                    if ( $('.product-lists').hasClass('off') ) {
                        var owlActive = owl.owlCarousel(owlOptions);
                        owl.removeClass('off');
                    }
                } else {
                    if ( !$('.product-lists').hasClass('off') ) {
                        owl.addClass('off').trigger('destroy.owl.carousel');
                        owl.find('.owl-stage-outer').children(':eq(0)').unwrap();
                    }
                }
            });
        });

    </script>
@endpush
