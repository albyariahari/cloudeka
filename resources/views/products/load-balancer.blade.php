@extends('app')

@push('styles')
    <link rel="stylesheet" href="/js/owl/assets/owl.carousel.min.css" />
@endpush

@section('content')

    <!-- Banner -->
    <div class="container-fluid banner">
        <div class="banner-title">
            <img src="/imgs/products/banners/load-balancer.png" alt="Load Balancer" class="w-100">
            <h1>Load Balancer</h1>
            <div class="icon-product"><img src="/imgs/solutions/svg/solutions/products/cloud-premium-2.svg" class="img-fluid"/></div>
        </div>

    </div>

    <!-- Section description -->
    <section class="sections">
        <div class="container-fluid">
            <div class="row">
                <div class="co-12 col-lg-3 offset-lg-1 pb-4">
                    <h2 class="subtitle dark-color">What is <br>Load Balancer</h2>
                </div>
                <div class="co-12 col-lg-7 dark-color" >
                    <p>Lintasarta Load Balancer is a web security feature that can only be used by Lintasarta Cloudeka and Lintasarta Colocation customers in managing data traffic and is able to split the work of a group of web servers evenly. This way, your web application will still be available in any situation.</p>
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
                        <img src="/imgs/products/f5.png" width="300">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section carousel -->
    {{--  <section class="sections bg-pattern">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <h2 class="subtitle light-color mb-5">Uses Cases</h2>

                    <div class="px-lg-5 mx-lg-2">
                        <div class="owl-carousel owl-slide owl-carousel-1 owl-theme">
                            <div class="slide-logo-light slide-logo-light--use-cases">
                                <div class="img-wrapper mb-4 mt-0">
                                    <img src="/imgs/solutions/startup.svg" class="w-auto m-auto">
                                </div>
                                <p>“something exciting is coming to town”</p>
                            </div>
                            <div class="slide-logo-light slide-logo-light--use-cases">
                                <div class="img-wrapper mb-4 mt-0">
                                    <img src="/imgs/solutions/startup.svg" class="w-auto m-auto">
                                </div>
                                <p>“something exciting is coming to town”</p>
                            </div>
                            <div class="slide-logo-light slide-logo-light--use-cases">
                                <div class="img-wrapper mb-4 mt-0">
                                    <img src="/imgs/solutions/startup.svg" class="w-auto m-auto">
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
    </section>  --}}

    <!-- Section benefit -->
    <section class="sections">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-2 offset-lg-1 pb-4">
                    <h2 class="subtitle dark-color mb-5">Load Balancer <br>Features and Benefit</h2>
                </div>
                <div class="col-lg-8 dark-color pt-2">
                    <div class="row product-lists owl-carousel owl-theme">
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/reliable-management.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">Reliable Management</h4>
                            <p>With application traffic management, you can have the ability to perform statically and dynamically load balancing to eliminate points of failure. The application proxy will provide an awareness protocol in controlling critical application traffic.
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/optimal-delivery.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">Optimal Delivery</h4>
                            <p>Application delivery optimization can significantly improve page load times and user experience by using the HTTP / 2 protocol, caching, compression, F5 TCP Express ™, and F5 OneConnect ™.</p>
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/fast-and-reliable.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">Fast And Reliable</h4>
                            <p>Optimizing web-based applications with HTTP / 2 to ensure that customers and application users will always have access to the applications they need at any time.</p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/programmable-infrastructure.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">Programmable Infrastructure</h4>
                            <p>Perform application control, from connection and data traffic to do configuration and management, with the F5 iRules LX, which is the next evolution of network programmability using the Node.js language on the BIG-IP platform.</p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/easy-implementation.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">Easy Implementation</h4>
                            <p>Facilitates the implementation and management process, and provides complete visibility into the application.
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/monthly-report-analysis.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">Monthly Report Analysis</h4>
                            <p>You can view metrics for the application, virtual server, member pool, URL, specific country, and additional detailed statistics about application traffic traveling through the system.</p>
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
                    <h3 class="light-color mb-5">See Our Solutions Industry Covered by <strong>Load Balancer</strong> Product</h3>
                    <div class="owl-carousel owl-slide owl-carousel-2 owl-theme">
                        <div class="slide-logo-light">
                            <img src="/imgs/solutions/svg/solutions/banking-blue.svg" class="img-fluid" style="max-height: 36px;margin-bottom: 7px;">
                            <h3>Banking</h3>
                            <p class="text-left mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                        </div>
                        <div class="slide-logo-light">
                            <img src="/imgs/solutions/svg/solutions/finance-non-bank-blue.svg" class="img-fluid" style="max-height: 36px;margin-bottom: 7px;">
                            <h3>Finance Non-Bank</h3>
                            <p class="text-left mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                        </div>
                        <div class="slide-logo-light">
                            <img src="/imgs/solutions/svg/solutions/government-blue.svg" class="img-fluid" style="max-height: 36px;margin-bottom: 7px;">
                            <h3>Government</h3>
                            <p class="text-left mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                        </div>
                        <div class="slide-logo-light">
                            <img src="/imgs/solutions/svg/solutions/resources-blue.svg" class="img-fluid" style="max-height: 36px;margin-bottom: 7px;">
                            <h3>Resources</h3>
                            <p class="text-left mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                        </div>
                        <div class="slide-logo-light">
                            <img src="/imgs/solutions/svg/solutions/plantation-blue.svg" class="img-fluid" style="max-height: 36px;margin-bottom: 7px;">
                            <h3>Plantation</h3>
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
