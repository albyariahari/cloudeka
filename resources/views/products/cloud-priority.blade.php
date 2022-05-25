@extends('app')

@push('styles')
    <link rel="stylesheet" href="/js/owl/assets/owl.carousel.min.css" />
@endpush

@section('content')

    <!-- Banner -->
    <div class="container-fluid banner">
        <div class="banner-title">
            <img src="/imgs/products/banners/cloud-priority.png" alt="Cloud Priority" class="w-100">
            <h1>Cloud Priority</h1>
            <div class="icon-product"><img src="/imgs/solutions/svg/solutions/products/cloud-premium-2.svg" class="img-fluid"/></div>
        </div>

    </div>

    <!-- Section description -->
    <section class="sections">
        <div class="container-fluid">
            <div class="row">
                <div class="co-12 col-lg-3 offset-lg-1 pb-4">
                    <h2 class="subtitle dark-color">What is <br>Cloud Priority</h2>
                </div>
                <div class="co-12 col-lg-7 dark-color" >
                    <p>Cloud Priority by Lintasarta Cloudeka is a Private Cloud Service dedicated for one customer only. The particular extensive solution is accessible through both the internet network and private networks to support various data production, Disaster Recovery, or any kind of enviroment needed.</p>
                    <p>Supported by prestigious and well-known partners’ technologies, Cloud Priority from Lintasarta Cloudeka has reliable features that you can choose to support business operations.</p>
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
                        <img src="/imgs/products/cisco.png" height="48" style="margin-right:100px;">
                        <img src="/imgs/products/nutanix.png" height="48" style="margin-right:100px;">
                        <img src="/imgs/products/nettapp.png" height="48">
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
                                    <img src="/imgs/solutions/pertamina.png" class="w-auto m-auto">
                                </div>
                                <p>PHSS built end-to-end (private) Cloud Priority clusters for Data Center and Disaster Recovery Center. Also, PHSS combines Baremetal and Virtual Machine at more than two different sites, including at their customers’ location.</p>
                            </div>
                            <div class="slide-logo-light slide-logo-light--use-cases">
                                <div class="img-wrapper mb-4 mt-0">
                                    <img src="/imgs/solutions/pgn.png" class="w-auto m-auto">
                                </div>
                                <p>Lintasarta Cloudeka has successfully assisted SAKA in migrating and building an end-to-end (private) Cloud Priority cluster for the Data Center and Disaster Recovery Center.</p>
                            </div>
                            <div class="slide-logo-light slide-logo-light--use-cases">
                                <div class="img-wrapper mb-4 mt-0">
                                    <img src="/imgs/solutions/crif.png" class="w-auto m-auto">
                                </div>
                                <p>Not only they built an end-to-end (private) Cloud Priority cluster for Data Centers and Disaster Recovery Centers, CRIF also uses Managed Replication services and combines Baremetal and Virtual Machines with Lintasarta Cloudeka.</p>
                            </div>
                            <div class="slide-logo-light slide-logo-light--use-cases">
                                <div class="img-wrapper mb-4 mt-0">
                                    <img src="/imgs/solutions/yakult.png" class="w-auto m-auto">
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
                    <h2 class="subtitle dark-color mb-5">Cloud Priority <br>Features and Benefit</h2>
                </div>
                <div class="col-lg-8 dark-color pt-2">
                    <div class="row product-lists owl-carousel owl-theme">
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/024-target.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">The Best Choice<br>For Your Needs</h4>
                            <p>You can choose a device partner based on your company’s needs. Specifically for baremetal devices, you will have the opportunity to choose two different partners.</p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/Group 4378.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">Integrated With<br>Lintasarta Services</h4>
                            <p>Cloud Priority can be integrated with other Lintasarta Services such as network, security, etc., or with other service providers.</p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/018-insight.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">Simple And Fully<br>Managed</h4>
                            <p>Lintasarta Cloudeka’s professional technician team will manage all levels from hardware to the Cloud platform. You can also choose Lintasarta Enterprise on Advance Professional Services (Lintasarta IT Outsourcing) for other IT infrastructure management.</p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/007-productivity.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">Fast And Flexible <br>Performance</h4>
                            <p>Cloud Priority has various deployment options such as at the customer site, at the Lintasarta Data Center, or integrated into Lintasarta Cloudeka’s Cloud Premium / Cloud Lite (Public Cloud) via a private network or Metro Ethernet.</p>
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
                    <h3 class="light-color mb-5">See Our Solutions Industry Covered by <strong>Cloud Priority</strong> Product</h3>
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
                            <img src="/imgs/solutions/svg/solutions/telco-blue.svg" class="img-fluid" style="max-height: 36px;margin-bottom: 7px;">
                            <h3>Telco</h3>
                            <p class="text-left mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                        </div>
                        <div class="slide-logo-light">
                            <img src="/imgs/solutions/svg/solutions/resources-blue.svg" class="img-fluid" style="max-height: 36px;margin-bottom: 7px;">
                            <h3>Resources</h3>
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
