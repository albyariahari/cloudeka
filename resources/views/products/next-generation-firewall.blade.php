@extends('app')

@push('styles')
    <link rel="stylesheet" href="/js/owl/assets/owl.carousel.min.css" />
@endpush

@section('content')

    <!-- Banner -->
    <div class="container-fluid banner">
        <div class="banner-title">
            <img src="/imgs/products/banners/ngfc.png" alt="Next Generation Firewall" class="w-100">
            <h1>Next Generation
                <br>Firewall</h1>
            <div class="icon-product"><img src="/imgs/solutions/svg/solutions/products/cloud-premium-2.svg" class="img-fluid"/></div>
        </div>

    </div>

    <!-- Section description -->
    <section class="sections">
        <div class="container-fluid">
            <div class="row">
                <div class="co-12 col-lg-3 offset-lg-1 pb-4">
                    <h2 class="subtitle dark-color">What is <br>Next Generation Firewall</h2>
                </div>
                <div class="co-12 col-lg-7 dark-color" >
                    <p>Lintasarta NGFW On Cloud is a value-added service for Lintasarta Cloud and Lintasarta Colocation customers. With Lintasarta NGFW On Cloud, your servers within the Lintasarta Cloud and Lintasarta Colocation networks will be protected from modern viruses and malware that come from the Internet.</p>
                    <p>Lintasarta NGFW On Cloud is the first and only Indonesian provider to offer such Cloud Security services. In collaboration with Palo Alto Networks, as a leading technology partner in the field, we ensure the security of your servers within Lintasarta Cloud and Lintasarta Colocation networks from cyber attacks.</p>
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
                        <img src="/imgs/products/palo-alto.png">
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
                                    <img src="/imgs/solutions/askrindo.png" class="w-auto m-auto">
                                </div>
                                <p>“something exciting is coming to town”</p>
                            </div>
                            <div class="slide-logo-light slide-logo-light--use-cases">
                                <div class="img-wrapper mb-4 mt-0">
                                    <img src="/imgs/solutions/bakti.png" class="w-auto m-auto">
                                </div>
                                <p>“something exciting is coming to town”</p>
                            </div>
                            <div class="slide-logo-light slide-logo-light--use-cases">
                                <div class="img-wrapper mb-4 mt-0">
                                    <img src="/imgs/solutions/ojk-2.png" class="w-auto m-auto">
                                </div>
                                <p>“something exciting is coming to town”</p>
                            </div>
                            <div class="slide-logo-light slide-logo-light--use-cases">
                                <div class="img-wrapper mb-4 mt-0">
                                    <img src="/imgs/solutions/yakult.png" class="w-auto m-auto">
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
                    <h2 class="subtitle dark-color mb-5">Next Generation Firewall <br>Features and Benefit</h2>
                </div>
                <div class="col-lg-8 dark-color pt-2">
                    <div class="row product-lists owl-carousel owl-theme">
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/threat-prevention.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">Threat Prevention</h4>
                            <p>Protects your network by providing multiple layers of prevention, confronting threats at each phase of the attack. In addition to traditional intrusion-prevention capabilities, we provide the unique ability to detect and block threats on any and all ports.</p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/url-filtering.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">URL Filtering</h4>
                            <p>URL filtering limits access by comparing web traffic against a database to prevent employees from accessing harmful sites, such as phishing pages.
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/application-identification.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">Application Identification</h4>
                            <p>Application Identification enables you to see the applications on your network and learn how they work, their behavioral characteristics, and their relative risk.</p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/wildfire.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">WildFire</h4>
                            <p>A Cloud-based service that provides malware sandboxing and fully integrates with the vendor’s on-premises or Cloud-deployed NGFW line. The NGFW detects anomalies and then sends data to the Cloud service for analysis.
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/economic-revolution.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">Economics Revolution</h4>
                            <p>By paying monthly, you will be free from capital cost to buy the NGFW hardware and software or license and support every year.</p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4 px-xl-4 pb-0 pb-lg-5">
                            <img src="/imgs/products/feature-products/monthly-report.svg" class="img-fluid" style="max-width: 100px; height:100px;">
                            <h4 class="mt-4 mb-3">Monthly Report Analysis</h4>
                            <p>The report will show you the source and target of the attack, severity level from each kind of the attack, most visited applications, and any other analytical report to support you from not getting hacked.
                            </p>
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
                    <h3 class="light-color mb-5">See Our Solutions Industry Covered by <strong>Next Generation Firewall</strong> Product</h3>
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
