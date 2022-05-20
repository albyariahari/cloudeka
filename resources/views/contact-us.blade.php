@extends('app')

@section('meta')
	<meta name="description" content="{{ $metadata->meta_description }}">
	<meta name="keywords" content=" {{ $metadata->meta_keyword }}">
	<title>{{ $metadata->meta_title }} - Lintasarta Cloudeka</title>
@endsection

@push('styles')
	<link rel="stylesheet" href="{{ '/js/owl/assets/owl.carousel.min.css' }}" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <style>
        /* banner normal page*/
        .banner-title .icon-product.icon-product--page {
            background-image: unset !important;
        }
        @media only screen and (max-width: 768px) {
            .banner-title .icon-product {
                width: 60px !important;
            }
        }
        @media (max-width: 575.98px) {
            .banner-title .icon-product {
                width: 12% !important;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Banner -->
    <div class="container-fluid px-0">
        <div class="banner-title">
            <img src="{{ cloudekaBucketLocalUrl($banner->image_1) }}" class="w-100" alt="{{$metadata->meta_title}}">
            <div class="text">
                <h2 class="light-color" data-aos="fade-up" data-aos-duration="500">{!! $banner->title !!}</h2>
                <p class="light-color d-none d-lg-block" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">{!! $banner->subtitle !!}</p>
            </div>
        </div>
        {{ Breadcrumbs::render('contact-us') }}
    </div>
    <!-- /Banner -->
	
    <!-- Section Form -->
    <section class="sections">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <h2 class="font-25 dark-color text-center mb-5" data-aos="fade-up" data-aos-duration="500">{!! $form->title !!}</h2>

                    <form id="form">
						{{ Form::select('', $chooses, '', [
							'id' => 'cu-need'
							, 'placeholder' => __('title.form.choose_your_need')
							, 'data-aos' => 'fade-up'
							, 'data-aos-duration' => 500
						]) }}
						{{ Form::select('', $hearUs + ['other' => __('title.form.others')], '', [
							'id' => 'cu-hear'
							, 'placeholder' => __('title.form.where_do_your_hear_us_from')
							, 'data-aos' => 'fade-up'
							, 'data-aos-duration' => 500
						]) }}
						{{ Form::text('', '', ['id' => 'cu-reason', 'placeholder' => __('title.form.others')]) }}
						{{ Form::text('', '', ['id' => 'cu-company', 'placeholder' => __('title.form.company_name'), 'data-aos' => 'fade-up', 'data-aos-duration' => 500]) }}
						{{ Form::text('', '', ['id' => 'cu-full-name', 'placeholder' => __('title.form.full_name'), 'data-aos' => 'fade-up', 'data-aos-duration' => 500]) }}
						{{ Form::email('', '', ['id' => 'cu-email', 'placeholder' => __('title.form.email'), 'data-aos' => 'fade-up', 'data-aos-duration' => 500]) }}
						{{ Form::text('', '', ['id' => 'cu-phone', 'placeholder' => __('title.form.phone_number'), 'data-aos' => 'fade-up', 'data-aos-duration' => 500]) }}
						{{ Form::textarea('', '', ['id' => 'cu-message', 'placeholder' => __('title.form.message'), 'data-aos' => 'fade-up', 'data-aos-duration' => 500]) }}
                        <div class="text-center" data-aos="fade-up" data-aos-duration="500">
							{{ Form::button('Send Message', ['id' => 'btnSend', 'class' => 'btn btn-secondary btn-rounded px-4 font-20 mx-auto']) }}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /Section Form -->

    <!-- Section CS -->
    <section class="sections pt-0" id="half-grey">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cs">
                        <div data-aos="fade-up" data-aos-duration="500">
                            <h2>{!! $headOffice->title !!}</h2>
                            {!! $headOffice->description !!}
                        </div>
                        <div class="mid" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                            <h2>{!! $customerSupport->title !!}</h2>
                            {!! $customerSupport->description !!}
                        </div>
                        <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="600">
                            <h2>{!! $informationCenter->title !!}</h2>
                            {!! $informationCenter->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Section CS -->
	
    <!-- Section Office -->
    <section class="sections bg-grey pt-0 offices">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-12 col-lg-10 offset-lg-1">
                    <div class="d-flex justify-content-center align-items-center flex-column flex-lg-row">
                        <h2 class="dark-color font-25 mr-4 mb-4 mb-md-0" data-aos="fade-up" data-aos-duration="500">{!! $office['title'] !!}</h2>
                        <div class="search-box" data-aos="fade-up" data-aos-duration="500">
                            <i class="icon-search mr-0"></i>
                            <input type="text" placeholder="Search" class="search w-auto m-0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme owl-office pt-5">
                @foreach ($office['data'] as $val)
                <div class="offices" data-aos="fade-up" data-aos-duration="500" data-aos-delay="{{ $loop->index + 1 }}00">
                    <strong class="font-18">{!! $val->translate($lang)->title !!}</strong>
                    <div class="description">
                        {!! $val->translate($lang)->excerpt !!}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Section Office -->
	
    <!-- Section Connect -->
    <section class="sections">
        <div class="container-fluid text-center">
            <h2 class="dark-color font-25 mb-5">{!! $connect->title !!}</h2>
            <ul class="social-media">
                <li data-aos="fade-up" data-aos-duration="500" data-aos-delay="200"><a style="text-decoration: none" href="{{$setting->company_socmed_facebook}}"><i class="icon-fb"></i></a></li>
                <li data-aos="fade-up" data-aos-duration="500" data-aos-delay="300"><a style="text-decoration: none" href="{{$setting->company_socmed_instagram}}"><i class="icon-ig"></i></a></li>
                <li data-aos="fade-up" data-aos-duration="500" data-aos-delay="400"><a style="text-decoration: none" href="{{$setting->setting__social_media_linkedin_link}}"><i class="icon-linkedin"></i></a></li>
                <li data-aos="fade-up" data-aos-duration="500" data-aos-delay="500"><a style="text-decoration: none" href="{{$setting->company_socmed_twitter}}"><i class="icon-twitter"></i></a></li>
                <li data-aos="fade-up" data-aos-duration="500" data-aos-delay="600"><a style="text-decoration: none" href="{{$setting->setting__social_media_youtube_link}}"><i class="icon-youtube"></i></a></li>
            </ul>
        </div>
    </section>
    <!-- /Section Connect -->
	
	<!-- Maps -->
    <div id="maps" data-aos="fade-up" data-aos-duration="500"></div>
	<!-- /Maps -->
	
    @include('layouts.subscription')
	
    <!-- Modal Failed -->
    <div class="modal fade modal-home" id="contactFailed" tabindex="-1" aria-labelledby="contactFailedLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="close-trigger">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid-full">
                        <div class="row">
                            <div class="col-lg-12 modal-home__right">
                                <div class="wrapper">
                                    <div class="subtitle subtitle--center font-size-40">
                                        Failed!
                                    </div>
                                    <h2 class="font-size-20 dark-color text-center my-4">
                                        The given data<br>
                                        was invalid.
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Failed -->
	
    <!-- Modal Success -->
    <div class="modal fade modal-home" id="contactSuccess" tabindex="-1" aria-labelledby="contactSuccessLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="close-trigger">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid-full">
                        <div class="row">
                            <div class="col-lg-12 modal-home__right">
                                <div class="wrapper">
                                    <div class="subtitle subtitle--center font-size-40">
                                        Thank You!
                                    </div>
                                    <h2 class="font-size-20 dark-color text-center my-4">
                                        Your request has been received.<br>
                                        We’ll be in touch shortly to assist you
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Success -->
@stop

@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZKOUlHP5DzjJs_wrfKZklqnVhSobGlTI&callback=initMap" async="" defer=""></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ '/js/owl/owl.carousel.min.js' }}"></script>
    <script type="text/javascript">
        function initMap() {
            var map = new google.maps.Map(document.getElementById('maps'), {
                center: {
                    lat: {{$setting->setting__map_latitude}},
                    lng: {{$setting->setting__map_longitude}}
                },
                zoom: 14,
                zoomControl: false,
                streetViewControl: false,
                mapTypeControl: false,
                fullscreenControl: false,
                styles: [{
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#f5f5f5"
                        }]
                    },
                    {
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#616161"
                        }]
                    },
                    {
                        "elementType": "labels.text.stroke",
                        "stylers": [{
                            "color": "#f5f5f5"
                        }]
                    },
                    {
                        "featureType": "administrative.land_parcel",
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#bdbdbd"
                        }]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#eeeeee"
                        }]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#757575"
                        }]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#e5e5e5"
                        }]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#9e9e9e"
                        }]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#ffffff"
                        }]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#757575"
                        }]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#dadada"
                        }]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#616161"
                        }]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#9e9e9e"
                        }]
                    },
                    {
                        "featureType": "transit.line",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#e5e5e5"
                        }]
                    },
                    {
                        "featureType": "transit.station",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#eeeeee"
                        }]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#c9c9c9"
                        }]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#9e9e9e"
                        }]
                    }
                ]
            });

            var bounds = new google.maps.LatLngBounds();

            pos = new google.maps.LatLng({{$setting->setting__map_latitude}}, {{$setting->setting__map_longitude}});
            bounds.extend(pos);
            marker = new google.maps.Marker({
                position: pos,
                map: map,
                title: 'Lintasarta',
                icon: "/imgs/marker.png"
            });

            marker.setMap(map);
        }
    </script>
    <script>
        $(document).ready(function () {
            $('select').select2();
			
            $('.owl-carousel').owlCarousel({
                "dots": false, 
                "items": 2, 
                "margin": 40, 
                "nav": true, 
                "responsive": {
                    500: {
                        "items": 3
                    }, 
                    992: {
                        "dots": true, 
                        "items": 4, 
                        "nav": false
                    },
                    1199: {
                        "dots": true, 
                        "items": 5, 
                        "nav": false
                    }
                }
            });
			
			$('#cu-reason').hide();
			
            $('select#cu-hear').on('change', function () {
                $(this).find('option:selected').val() === 'other' ? $('#cu-reason').show() : $('#cu-reason').hide();
            });
			
			$('button#btnSend').on('click', function (e) {
				e.preventDefault();
				
				$.ajax({
					"type": "POST", 
					"dataType": "JSON", 
					"url": "{{ route('message.send') }}", 
					"data": {
						"need": $('select#cu-need').val(),
						"hear": $('select#cu-hear').val(), 
						"other": $('input[type=text]#cu-reason').val(), 
						"company": $('input[type=text]#cu-company').val(),
						"full-name": $('input[type=text]#cu-full-name').val(),
						"email": $('input[type=email]#cu-email').val(), 
						"phone": $('input[type=text]#cu-phone').val(), 
						"message": $('textarea#cu-message').val(), 
						"_token": "{{ csrf_token() }}"
					}, 
					"success": function(response, textStatus, jqXHR) {
						$('form#form').find('select').val('').change();
						$('form#form').find('input,textarea').val('');
                        $('#contactSuccess').modal('show')
					}, "error": function(jqXHR, textStatus, errorThrown) {
                        $('#contactFailed').modal('show')
					}
				});
			});
		});
	</script>
@endpush