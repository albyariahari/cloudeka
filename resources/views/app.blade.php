<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="index,follow">
        <meta name="googlebot" content="index,follow">
        <link rel="alternate" hreflang="en-gb"href="{{ url()->current() }}" />
        <link rel="alternate" hreflang="id" href="{{ url()->current() }}" />
        <link rel="alternate" hreflang="en-us" href="{{ url()->current() }}" />
        <link rel="alternate" hreflang="en" href="{{ url()->current() }}" />
        <link rel="alternate" hreflang="x-default" href="{{ url()->current() }}" />
        {{-- <link rel="canonical" href="https://www.cloudeka.id/id" /> --}}
        <link rel="canonical" href="{{ url()->current() }}">
        <link rel="icon" href="{{ '/imgs/favicon.png' }}">

        @yield('meta', 'Lintasarta Cloudeka')

        <!-- Styles -->
        @stack('styles')
        <link href="{{ '/css/app.css' }}" rel="stylesheet">
        <link href="{{ '/fonts/lintasarta.eot?3khx33' }}" rel="preload" as="font" crossorigin="anonymous">
        <link href="{{ '/fonts/lintasarta.ttf?3khx33' }}" rel="preload" as="font" crossorigin="anonymous">
        <link href="{{ '/fonts/lintasarta.woff?3khx33' }}" rel="preload" as="font" crossorigin="anonymous">

        <!-- <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
        <link rel="preload" href="{{ '/vendor/aos-master/dist/aos.css' }}" as="style" onload="this.onload=null;this.rel='stylesheet'"/>
        <link rel="preload" href="{{ '/vendor/fontawesome-free/css/all.min.css' }}" as="style" onload="this.onload=null;this.rel='stylesheet'"/>
        <noscript>
            <link rel="stylesheet" href="{{ '/vendor/aos-master/dist/aos.css' }}">
            <link rel="stylesheet" href="{{ '/vendor/fontawesome-free/css/all.min.css' }}">
            <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
        </noscript>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-GPQ4TF9BYJ"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-GPQ4TF9BYJ');
        </script>

        <meta name="facebook-domain-verification" content="5fcrm4482r2usspla0b1qw17go2was" />
    </head>
    <body>
        @include('layouts.header')

        {{--  @if(URL::current() === url('/calculator') || URL::current() === url('/id/calculator'))
            <main id="app">
                @yield('calculator-content') 
            </main>
        @else   --}}
            <main id="main">
                @yield('content') 
            </main>
        {{--  @endif  --}}

        @include('layouts.live-chat')

        @include('layouts.footer')
    </body>

    @if(Request::is('calculator') || Request::is('id/calculator'))
        <script src="{{ '/js/app.js' }}"></script>
    @else
        <script src="{{ '/vendor/jquery/jquery.min.js' }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="{{ '/vendor/bootstrap-4.6/dist/js/bootstrap.js' }}"></script>
        <script src="{{ '/vendor/aos-master/dist/aos.js' }}"></script>
    @endif
    <script>
        AOS.init({
            startEvent: 'load',
        });
    </script>
    <script>
        function searchNav(){
            if($('.nav-item--search .form-search').hasClass('open')){
                $('.form-search').removeClass('open');
            }else{
                $('.form-search').addClass('open');
            }
        }

        $('.nav-item--search').hover(function(){
            searchNav();
        });

        $('.navbar-toggler').click(function(){
            $(this).toggleClass('opened');
            $('.navbar-collapse').slideToggle('fast');
        });
        
        $('.dropdown-toggle').click(function(){
            const id = $(this).data('id');
            if(id == "menu-product"){
                $('#menu-solution').slideUp('fast');
            }else{
                $('#menu-product').slideUp('fast');
            }
            $('#'+id).slideToggle('fast');
        });
        
        
        function detailMenu(id, menu) {
            $("#menu-"+menu+" .menu-details .content-section, #menu-"+menu+" .left-menu ul li").removeClass('shown');
            $("#menu-"+menu+" .left-menu ul").toggleClass('shown');
            $("#"+id).addClass('shown');
            $("#"+id+'-menu').addClass('shown');
        }
    </script>
	<script>
		$(document).ready(function () {
			if ($('button#btnSubscribe').length && $('input[type=text]#subscribe-email').length) {
				$('button#btnSubscribe').on('click', function (e) {
					e.preventDefault();
					
					$.ajax({
						"type": "POST", 
						"dataType": "JSON", 
						"url": "{{ route('subscribe') }}", 
						"data": {
							"email": $('input[type=text]#subscribe-email').val()
						}, 
						"headers": {
							"X-CSRF-TOKEN": "{{ csrf_token() }}"
						}, 
						"success": function(response, textStatus, jqXHR) {
							// alert(response.message);
                            $('#subscribeSuccess').modal('show')
							$('input[type=text]#subscribe-email').val('');
						}, "error": function(jqXHR, textStatus, errorThrown) {
							let err = jqXHR.responseJSON;
							
                            $('#subscribeFailed').modal('show')
							// err.errors ? alert(err.errors.email[0]) : alert(err.message);
						}
					});
				});
			}
		});
	</script>
    @stack('scripts')
</html>
