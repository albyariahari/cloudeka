@extends('app')

@section('meta')

<meta name="description" content="Cloud Hosting Provider di Indonesia persembahan Lintasarta Cloudeka. Kami berkomitmen memberikan solusi web/aplikasi hosting yang aman, mudah, terjangkau.">
<meta name="keywords" content="cloud hosting indonesia, cloud hosting, cloud indonesia, cloud provider indonesia">
<title>Cloud Hosting Provider di Indonesia - Lintasarta Cloudeka</title>

@endsection

@push('styles')
    <link rel="preload" href="{{ '/js/owl/assets/owl.carousel.min.css' }}" as="style" onload="this.onload=null;this.rel='stylesheet'"/>
    <noscript>
        <link rel="stylesheet" href="{{ '/js/owl/assets/owl.carousel.min.css' }}">
    </noscript>
    <style>
        ul.news .content-wrapper { 
            padding-right: 0;
            padding-left: 0; 
            position: relative;
            margin-left: 1rem;
        }
        ul.news li {
            align-items: flex-start !important;
        }
        /* #news .featured-news .img-wrapper {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100% !important;
            background-color: transparent;
            width: 100% !important;
            left: 0;
            top: 0;
        } */
        #news .featured-news .tags {
            position: absolute;
            max-height: 32px;
            overflow: hidden;
        }
        #news .featured-news {
            width: 100%;
            height: 100%;
            margin-left: 0 !important;
            margin-right: 0 !important;
        }
        #news ul.news li:last-child {
            padding-bottom: 0 !important;
        }
        #news ul.news li .content-wrapper .tags {
            display: inline-block !important;
            max-height: 32px;
            overflow: hidden;
        }
        #news ul.news li .content-wrapper .tags span {
            display: inline-block;
        }
        @media screen and (max-width: 991.98px) {
            #news ul.news li {
                margin-top: 20px;
            }
        }
        @media screen and (max-width: 768px) {
            #news ul.news li {
                flex-direction: row !important;
            }
            #news ul.news li .content-wrapper .tags {
                max-height: 26px;
                right: auto !important;
            }
            #news .featured-news .tags {
                left: 20px !important;
                right: auto !important;
            }
            #news .featured-news .img-wrapper {
                height: auto !important;
            }
        }
        @media (max-width: 575.98px) {
            #news ul.news li .img-wrapper {
                width: 100% !important;
            }
            #news ul.news li .img-wrapper {
                border-bottom-left-radius: 0 !important;
            }
            #news ul.news li .img-wrapper img {
                border-top-right-radius: 20px;
            }
            #news ul.news li {
                flex-direction: column !important;
            }
            #news .featured-news {
                height: auto;
            }
        }
    </style>
@endpush

@section('content')

    <!-- Banner -->
    <div class="container-fluid banner">
        <div id="bannerHome" class="carousel slide carousel-fade custom-rangga" >
            <div class="carousel-indicators">
                @foreach ($slideshows as $slideshow)
                <button type="button" data-target="#bannerHome" data-slide-to="{{ $loop->index }}" class="{{ $loop->index === 0 ? 'active':'' }}" aria-current="true" aria-label="Slide 1"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($slideshows as $slideshow)

                <div class="carousel-item {{$loop->index === 0 ? 'active':''}}">
                    <!-- <img src="{{ cloudekaBucketLocalUrl($slideshow->image) }}" class="d-block w-100" alt="Banner" width="100" height="300"> -->
                    <picture>
                        <source media="(min-width: 1024px)" srcset="{{ cloudekaBucketLocalUrl($slideshow->image) }}">
                        <source media="(max-width: 992px)" srcset="{{ cloudekaBucketLocalUrl(str_replace('uploads/', 'uploads/mobile/', $slideshow->image)) }}">
                        <img src="{{ cloudekaBucketLocalUrl($slideshow->image) }}" alt="Banner" class="img-fluid d-block w-100" width="100" height="300">
                    </picture>
                    <div class="carousel-caption">
                        <div class="title-homepage-banner">
                            {!! $slideshow->translate($lang)->description !!}
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
            <div class="button-wrapper">
                <a class="left carousel-control" href="#bannerHome" role="button" data-slide="prev">
                    <span class="icon-prev" aria-hidden="true">
                        <img src="{{ '/imgs/prevArrow.svg' }}" class="img-fluid" alt="Prev" width="69" height="69">
                    </span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#bannerHome" role="button" data-slide="next">
                    <span class="icon-next" aria-hidden="true">
                        <img src="{{ '/imgs/nextArrow.svg' }}" class="img-fluid" alt="Next" width="69" height="69">
                    </span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        {{ Breadcrumbs::render('home') }}
    </div>


    <!-- Section why -->
    <section class="sections why">
        <div class="container-fluid">
            <div class="row" data-aos="fade-up" data-aos-duration="500">
                <div class="col-12 col-lg-3 offset-lg-1 pb-4 pt-5 pt-lg-0">
                    <h1 class="subtitle dark-color">{!! $whyChoose->title !!}</h1>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="description dark-color">
                        <p>
                            {!! $whyChoose->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Product and services -->
    <section class="sections bg-pattern" id="products">

        <!-- Section products -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-3 offset-lg-1 pb-4 d-flex align-items-end d-lg-block mb-4" data-aos="fade-up" data-aos-duration="500">
                    <h1 class="subtitle light-color mb-0">
                        {!! $products['title'] !!}
                    </h1>
                    <a href="#" class="ml-auto font-12 text-shadow text-white mobile-only">SEE ALL PRODUCTS</a>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="row product-lists owl-carousel owl-theme custom-rangga">
                        @foreach ($products['data'] as $key => $product)

                        <div class="col-lg-4 px-1" data-aos="fade-up" data-aos-duration="500" data-aos-delay="{{ $key + 1 }}00">
                            <div class="navs">
                                <div class="nav-button d-flex">
                                    <span class="my-md-auto mr-auto">{!! $product->translate($lang)->title !!}</span>
                                    <img src="{{ cloudekaBucketLocalUrl($product->translate($lang)->logo_1) }}" alt="Lintasarta cloud indonesian cloud partners" width="44" height="40" class="mt-auto my-md-auto ml-md-4" loading="lazy">
                                    <!-- <picture class="d-flex">
                                        <source media="(max-width: 991px)" srcset="{{ cloudekaBucketLocalUrl($product->translate($lang)->logo_1) }}">
                                        <source media="(min-width: 992px)" srcset="{{ cloudekaBucketLocalUrl($product->translate($lang)->logo_1) }}">
                                        <img src="{{ cloudekaBucketLocalUrl($product->translate($lang)->logo_1) }}" alt="Lintasarta cloud" width="44" height="40" class="mt-auto my-md-auto ml-md-4" loading="lazy">
                                    </picture> -->
                                </div>
                                <div class="nav-button white d-flex">
                                    <div class="d-flex flex-column">
                                        <span>{!! $product->translate($lang)->title !!}</span>
                                        <p>{!! $product->translate($lang)->excerpt !!}</p>
                                        <a class="mt-auto" href="{{route('product.show',$product->translate($lang)->slug)}}">{{ __('title.more_details') }}</a>
                                    </div>

                                    <img src="{{ cloudekaBucketLocalUrl($product->translate($lang)->logo_1) }}" alt="{{$product->translate($lang)->title}}" height="40" width="44" class="mt-auto my-md-auto ml-md-4" loading="lazy">
                                    <!-- <picture class="d-flex">
                                        <source media="(max-width: 991px)" srcset="{{ cloudekaBucketLocalUrl($product->translate($lang)->logo_1) }}">
                                        <source media="(min-width: 992px)" srcset="{{ cloudekaBucketLocalUrl($product->translate($lang)->logo_1) }}">
                                        <img src="{{ cloudekaBucketLocalUrl($product->translate($lang)->logo_1) }}" alt="{{$product->translate($lang)->title}}" width="44" height="40" class="mt-auto my-md-auto ml-md-4" loading="lazy">
                                    </picture> -->
                                </div>
                            </div>
                        </div>

                        @endforeach
                        <div class="col-lg-4 px-1 desktop-only" data-aos="fade-up" data-aos-duration="500" data-aos-delay="900">
                            <div class="navs">
                                <div class="nav-button left-top-to-right d-flex">
                                    <span class="m-auto font-weight-bold">{{ __('title.see_more_products') }}</span>
                                </div>
                                <div class="nav-button white no-after d-flex">
                                    <a href="{{ route('product.index') }}" class="m-auto font-weight-bold font-20">{{ __('title.see_more_products') }}</a>
                                    <img src="{{ '/imgs/flowers.svg' }}" class="flower-abs" width="60" loading="lazy">
                                    <!-- <picture>
                                        <source media="(max-width: 991px)" srcset="{{ '/imgs/flowers.svg' }}">
                                        <source media="(min-width: 992px)" srcset="{{ '/imgs/flowers.svg' }}">
                                        <img src="{{ '/imgs/flowers.svg' }}" alt="{{ $product->translate($lang)->title }}" class="flower-abs" width="60" loading="lazy">
                                    </picture> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section services -->
        <div class="container-fluid" id="services">
            <div class="row">
                <div class="col-12 col-lg-3 offset-lg-1 pb-4 d-flex align-items-end d-lg-block mb-4" data-aos="fade-up" data-aos-duration="500">
                    <h1 class="subtitle light-color mb-0">
                        {!!$solutions['title']!!}
                    </h1>
                    <a href="#" class="ml-auto font-12 text-shadow text-white mobile-only">SEE ALL SOLUTIONS</a>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="row product-lists owl-carousel owl-theme custom-rangga">
                        @foreach ($solutions['data'] as $key => $solution)

                        <div class="col-lg-4 px-1" data-aos="fade-up" data-aos-duration="500" data-aos-delay="{{ $key + 1 }}00">
                            <div class="navs">
                                <div class="nav-button d-flex">
                                    <span class="my-md-auto mr-auto">{{ $solution->translate($lang)->title }}</span>
                                    <img src="{{ cloudekaBucketLocalUrl($solution->translate($lang)->logo_1) }}" alt="{{$solution->translate($lang)->title}}" height="40" width="44" class="mt-auto my-md-auto ml-md-4" loading="lazy">
                                    <!-- <picture class="d-flex">
                                        <source media="(max-width: 991px)" srcset="{{ cloudekaBucketLocalUrl($solution->translate($lang)->logo_1) }}">
                                        <source media="(min-width: 992px)" srcset="{{ cloudekaBucketLocalUrl($solution->translate($lang)->logo_1) }}">
                                        <img src="{{ cloudekaBucketLocalUrl($solution->translate($lang)->logo_1) }}" alt="{{$product->translate($lang)->title}}" width="44" height="40" class="mt-auto my-md-auto ml-md-4" loading="lazy">
                                    </picture> -->
                                </div>
                                <div class="nav-button white d-flex">
                                    <div class="d-flex flex-column">
                                        <span>{{$solution->translate($lang)->title}}</span>
                                        <p>{{$solution->translate($lang)->excerpt}}</p>
                                        <a class="mt-auto" href="{{env('APP_URL').'/solutions/'.$solution->translate($lang)->slug}}">{{ __('title.more_details') }}</a>
                                    </div>

                                    <img src="{{ cloudekaBucketLocalUrl($solution->translate($lang)->logo_1) }}" alt="{{$solution->translate($lang)->title}}" height="40" width="44" class="mt-auto my-md-auto ml-md-4" loading="lazy">
                                    <!-- <picture class="d-flex">
                                        <source media="(max-width: 991px)" srcset="{{ cloudekaBucketLocalUrl($solution->translate($lang)->logo_1) }}">
                                        <source media="(min-width: 992px)" srcset="{{ cloudekaBucketLocalUrl($solution->translate($lang)->logo_1) }}">
                                        <img src="{{ cloudekaBucketLocalUrl($solution->translate($lang)->logo_1) }}" alt="{{$product->translate($lang)->title}}" width="44" height="40" class="mt-auto my-md-auto ml-md-4" loading="lazy">
                                    </picture> -->
                                </div>
                            </div>
                        </div>

                        @endforeach
                        <div class="col-lg-4 px-1 desktop-only" data-aos="fade-up" data-aos-duration="500" data-aos-delay="900">
                            <div class="navs">
                                <div class="nav-button left-top-to-right d-flex">
                                    <span class="m-auto font-weight-bold">{{ __('title.see_more_solutions') }}</span>
                                </div>
                                <div class="nav-button white no-after d-flex">
                                    <a href="{{ route('solution.index') }}" class="m-auto font-weight-bold font-20">{{ __('title.see_more_solutions') }}</a>
                                    <img src="{{ '/imgs/flowers.svg' }}" class="flower-abs" width="60" loading="lazy">
                                    <!-- <picture>
                                        <source media="(max-width: 991px)" srcset="{{ '/imgs/flowers.svg' }}">
                                        <source media="(min-width: 992px)" srcset="{{ '/imgs/flowers.svg' }}">
                                        <img src="{{ '/imgs/flowers.svg' }}" class="flower-abs" width="60" loading="lazy">
                                    </picture> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Section stories -->
@if($setting->setting__success_story_display == 'true')
    <section class="sections sections--stories">
        <div class="container-fluid">
            <div class="row" data-aos="fade-up" data-aos-duration="500">
                <div class="col-lg-3 offset-lg-1">
                    <h1 class="subtitle dark-color">{!! $successStories['title'] !!}</h1>
                </div>
                <div class="col-lg-7">
                    <p class="dark-color desktop-only">{{$successStories['subtitle']}}</p>
                </div>
            </div>
            <div class="owl-carousel owl-theme owl-stories" id="stories" data-aos="fade-up" data-aos-duration="500">
                @foreach ($successStories['data'] as $story)

                <div class="row">
                    <div class="col-12 col-lg-3 offset-lg-1 d-flex flex-column">
                        <div class="mt-auto desktop-only">
                            <strong class="font-18 dark-color d-block">{!! $story->translate($lang)->subtitle !!}</strong>
                            <div class="font-weight-light font-21 dark-color line-height-1 mt-2">{{$story->translate($lang)->title}}</div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="story-banner">
                            <img src="{{ '/imgs/flower-transparent.svg' }}" class="flower-abs-left" width="100" loading="lazy">
                            <!-- <picture>
                                <source media="(max-width: 991px)" srcset="{{ '/imgs/flower-transparent.svg' }}">
                                <source media="(min-width: 992px)" srcset="{{ '/imgs/flower-transparent.svg' }}">
                                <img src="{{ '/imgs/flower-transparent.svg' }}" class="flower-abs-left" width="100" loading="lazy">
                            </picture> -->
                            <div class="w-50 pr-md-5">
                                <div class="d-flex">
                                    <h2>{!! $story->translate($lang)->subtitle !!}</h2>
                                    <img src="{{ cloudekaBucketLocalUrl($story->translate($lang)->image_1) }}" height="40" class="w-auto mobile-only ml-auto" loading="lazy">
                                    <!-- <picture>
                                        <source media="(max-width: 991px)" srcset="{{ cloudekaBucketLocalUrl($story->translate($lang)->image_1) }}">
                                        <source media="(min-width: 992px)" srcset="{{ cloudekaBucketLocalUrl($story->translate($lang)->image_1) }}">
                                        <img src="{{ cloudekaBucketLocalUrl($story->translate($lang)->image_1) }}" height="40" class="w-auto mobile-only ml-auto" loading="lazy">
                                    </picture> -->
                                </div>
                                {!! $story->translate($lang)->description !!}
                            </div>
                            <div class="image-abs desktop-only">
                                <img src="{{ cloudekaBucketLocalUrl($story->translate($lang)->image_2) }}" alt="" class="img-fluid" loading="lazy">
                                <!-- <picture>
                                    <source media="(max-width: 991px)" srcset="{{ cloudekaBucketLocalUrl($story->translate($lang)->image_2) }}">
                                    <source media="(min-width: 992px)" srcset="{{ cloudekaBucketLocalUrl($story->translate($lang)->image_2) }}">
                                    <img src="{{ cloudekaBucketLocalUrl($story->translate($lang)->image_2) }}" alt="" class="img-fluid" loading="lazy">
                                </picture> -->
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </section>

    <!-- Section carousel -->
    <section class="sections desktop-only py-0">
        <div class="container-fluid">
            <div class="owl-carousel owl-theme owl-stories-logo" id="stories-logo" data-aos="fade-up" data-aos-duration="500">
                @foreach ($successStories['data'] as $story)
                <div class="slide-logo">
                    <img src="{{ cloudekaBucketLocalUrl($story->translate($lang)->image_1) }}" height="110" class="w-auto mx-auto" loading="lazy">
                    <!-- <picture>
                        <source media="(max-width: 991px)" srcset="{{ cloudekaBucketLocalUrl($story->translate($lang)->image_1) }}">
                        <source media="(min-width: 992px)" srcset="{{ cloudekaBucketLocalUrl($story->translate($lang)->image_1) }}">
                        <img src="{{ cloudekaBucketLocalUrl($story->translate($lang)->image_1) }}" height="110" class="w-auto mx-auto" loading="lazy">
                    </picture> -->
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endif


    <section class="sections" id="news">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-11 offset-lg-1 pb-5 d-flex">
                    <h1 class="subtitle dark-color mb-0" data-aos="fade-right" data-aos-duration="500">{!! $news['title'] !!}</h1>
                    <a href="{{route('news')}}" class="more-link ml-auto font-20">
                        <img src="{{ '/imgs/news/see-more.svg' }}" width="30" class="mr-2">
                        See More
                    </a>
                </div>

                <div class="col-12 col-lg-11 offset-lg-1">
                    <div class="row d-lg-flex">
                        @if ($news['bigSection'])
                        <div class="col-12 col-lg-7">
                            <div class="featured-news m-0" data-aos="fade-right" data-aos-duration="500">
                                <div class="tags">
                                    <a href="{{ route('news.category',$news['bigSection']->Category->translate($lang)->slug) }}" class="badge badge-primary">{!! $news['bigSection']->Category->translate($lang)->title !!}</a>
                                    @foreach ($news['bigSection']->Tags as $item)
                                    <a href="{{ route('search', ['src' => urlencode(strtolower($item->title))]) }}" class="badge badge-primary">{!! $item->title !!}</a>
                                    @endforeach
                                </div>
                                <div class="img-wrapper">
                                    <img src="{{cloudekaBucketLocalUrl($news['bigSection']->translate($lang)->outer_thumbnail)}}" alt="news and events in cloudeka">
                                </div>
                                <div class="content-wrapper">
                                    <strong class="date">{{\Carbon\Carbon::parse($news['bigSection']->created_at)->format('d/m/Y')}}</strong>
                                    <h2 class="news-title"><a href="{{route('news.detail',[$news['bigSection']->Category->translate($lang)->slug,$news['bigSection']->translate($lang)->slug])}}">{{ $news['bigSection']->translate($lang)->title }}</a></h2>
                                    <p>{{ $news['bigSection']->translate($lang)->summary }}</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="col-12 col-lg-5">
                            <ul class="news">
                                @foreach ($news['tripleRow'] as $new)
                                <li data-aos="fade-left" data-aos-duration="500"  data-aos-delay="100">
                                    <div class="img-wrapper">
                                        <a href="{{route('news.detail',[$new->Category->translate($lang)->slug,$new->translate($lang)->slug])}}">
                                            <img src="{{cloudekaBucketLocalUrl($new->translate($lang)->outer_thumbnail)}}" alt="thumbnail news and events" />
                                        </a>
                                    </div>
                                    <div class="content-wrapper">
                                        <strong class="date">{{\Carbon\Carbon::parse($new->created_at)->format('d')}} <span>{{\Carbon\Carbon::parse($new->created_at)->format('F')}}</span> {{\Carbon\Carbon::parse($new->created_at)->format('Y')}}</strong>
                                        <h2 class="news-title"><a href="{{route('news.detail',[$new->Category->translate($lang)->slug,$new->translate($lang)->slug])}}">{{ $new->translate($lang)->title }}</a></h2>
                                        <div class="tags">
                                            <a href="{{ route('news.category', $new->Category->translate($lang)->slug) }}">{{$new->Category->translate($lang)->title}}</a>
                                            @foreach ($new->Tags as $item)
                                            <span><a href="{{ route('search', ['src' => urlencode(strtolower($item->title))]) }}">{!! $item->title !!}</a></span>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section clients -->
    <section class="sections">
        <div class="container-fluid">
            <div class="row" data-aos="fade-up" data-aos-duration="500">
                <div class="col-12 col-lg-3 offset-lg-1 pb-2">
                    <h1 class="subtitle dark-color">{!! $clients['title'] !!}</h1>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="d-xl-flex w-100 align-items-center justify-content-between owl-carousel owl-theme owl-clients">
                        @foreach ($clients['data'] as $client)
                        <img src="{{ cloudekaBucketLocalUrl($client->logo) }}" width="180" class="mx-2" alt="{{$client->title}}" loading="lazy">
                        <!-- <picture>
                            <source media="(max-width: 991px)" srcset="{{ cloudekaBucketLocalUrl($client->logo) }}">
                            <source media="(min-width: 992px)" srcset="{{ cloudekaBucketLocalUrl($client->logo) }}">
                            <img src="{{ cloudekaBucketLocalUrl($client->logo) }}" width="180" class="mx-2" alt="{{$client->title}}" loading="lazy">
                        </picture> -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section partners -->
    <section class="sections sections--our-partners">
        <div class="container-fluid">
            <div class="row" data-aos="fade-up" data-aos-duration="500">
                <div class="col-12 col-lg-3 offset-lg-1 pb-2">
                    <h1 class="subtitle dark-color">{!! $partners['title'] !!}</h1>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="d-xl-flex w-100 align-items-center justify-content-between owl-carousel owl-theme owl-partners">
                        @foreach ($partners['data'] as $partner)
                            <div class="slide-carousel">
                                <img src="{{ cloudekaBucketLocalUrl($partner->logo) }}" class="w-100" alt="{{$partner->title}}" loading="lazy">
                                <!-- <picture>
                                    <source media="(max-width: 991px)" srcset="{{ cloudekaBucketLocalUrl($partner->logo) }}">
                                    <source media="(min-width: 992px)" srcset="{{ cloudekaBucketLocalUrl($partner->logo) }}">
                                    <img src="{{ cloudekaBucketLocalUrl($partner->logo) }}" class="w-100" alt="{{$partner->title}}" loading="lazy">
                                </picture> -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Section Become Partner --}}
    <section class="sections">
        <div class="container-fluid">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="500">
                <div class="col-12 col-lg-10">
                    <div class="card text-white become--partner--card">
                        <img src="{!! cloudekaBucketLocalUrl($bottomBanner->image_1) !!}" alt="our partners in cloudeka">
                        <div class="card-body">
                            <div class="become--partner--card--wrapper">
								<h1 class="mb-3">{!! $bottomBanner->title !!}</h1>
								{!! $bottomBanner->description !!}
                                <a href="{!! $bottomBanner->link_url_1 !!}" class="btn become--partner--btn mb-2 mr-2">{!! $bottomBanner->link_title_1 !!}</a>
                                <a href="{!! $bottomBanner->link_url_2 !!}" class="btn become--partner--btn mb-2">{!! $bottomBanner->link_title_2 !!}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Section Become Partner --}}

@if ($promotion)
    <!-- Modal -->
    <div class="modal fade modal-home" id="homePopup" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="homePopupLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="close-trigger">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid-full">
                        <div class="row">
                            <div class="col-lg-7 modal-home__left">
                                <div class="bg-image">
                                    <img src="{{ cloudekaBucketLocalUrl($promotion->translate($lang)->image) }}" alt="cloudeka promotion" class="img-fluid">
                                    <!-- <picture>
                                        <source media="(max-width: 991px)" srcset="{{ ($promotion->translate($lang)->image) }}">
                                        <source media="(min-width: 992px)" srcset="{{ ($promotion->translate($lang)->image) }}">
                                        <img src="{{ ($promotion->translate($lang)->image) }}" alt="" class="img-fluid" loading="lazy">
                                    </picture> -->
                                </div>
                            </div>
                            <div class="col-lg-5 modal-home__right">
                                <div class="wrapper">
                                    <div class="subtitle font-size-40">
										{!! $promotion->translate($lang)->title !!}
                                    </div>
                                    <div class="font-size-20 dark-color my-4 modal-promo-text">
										{!! $promotion->translate($lang)->description !!}
                                    </div>
                                    <a href="{{ $promotion->translate($lang)->url }}" class="btn btn-block btn-grey btn-rounded btn-gradient-grey description mt-4 mb-3">
                                        @lang('title.read_tnc')
                                    </a>
                                    <a href="{{ route('product.show', [$promotion->product->translate($lang)->slug]) }}" class="btn btn-block btn-secondary btn-rounded btn-gradient description">
                                        @lang('title.see_product')
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif


@include('layouts.subscription')

@stop

@push('scripts')
    <script src="/js/owl/owl.carousel.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#homePopup .close-trigger').hide()

            setTimeout(function(){
                let lastPopupShow = localStorage.getItem("last-popup-show");

                if((lastPopupShow == undefined || lastPopupShow == '') || parseInt(lastPopupShow/1000) < {{ $setting->system_last_popup_show }}){
                    $('#homePopup').modal('show')

                    setTimeout(function(){
                        $('#homePopup .close-trigger').show()
                    }, 3000);

                    localStorage.setItem("last-popup-show", Date.now());
                }else if(lastPopupShow != undefined && lastPopupShow != ''){
                    let currentDate = new Date();
                    let lastPopupDate = new Date(parseInt(lastPopupShow));

                    console.log(currentDate.getDate());
                    console.log(lastPopupDate.getDate());

                    if(currentDate.getDate() != lastPopupDate.getDate()){
                        $('#homePopup').modal('show')

                        setTimeout(function(){
                            $('#homePopup .close-trigger').show()
                        }, 3000);

                        localStorage.setItem("last-popup-show", Date.now());
                    }
                }

            }, 500);

            $('.carousel').carousel({
                interval: 3000
            });

            $('.owl-clients').owlCarousel({
                loop: true,
                margin: 40,
                nav: true,
                dots: false,
                items: 2,
                responsive:{
                    600:{
                        items:4
                    }
                }
            });
            $('.owl-partners').owlCarousel({
                loop: true,
                margin: 40,
                nav: true,
                dots:false,
                items: 2,
                responsive:{
                    600:{
                        items:4
                    }
                }
            });
        });

        $(function() {
            var owl = $('.product-lists'),
                owlOptions = {
                    loop: true,
                    margin: 0,
                    nav: true,
                    items: 2,
                    responsive:{
                    700:{
                        items:3
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
            var indexToRemove = 8;
            $(".product-lists").trigger('remove.owl.carousel', [indexToRemove]).trigger('refresh.owl.carousel');
        });

        {{--  $(function() {
            var owl = $('.owl-clients'),
                owlOptions = {
                    loop: true,
                    margin: 5,
                    nav: true,
                    items: 3,
                    responsive:{
                        600:{
                            items:5
                        }
                    }
                };

            if ( $(window).width() < 1600 ) {
                var owlActive = owl.owlCarousel(owlOptions);
            } else {
                owl.addClass('off');
            }

            $(window).resize(function() {
                if ( $(window).width() < 1600 ) {
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
        });  --}}

        {{--  $(function() {
            var owl = $('.owl-partners'),
                owlOptions = {
                    loop: true,
                    margin: 5,
                    nav: true,
                    items: 2,
                    responsive:{
                        600:{
                            items:5
                        }
                    }
                };

            if ( $(window).width() < 1600 ) {
                var owlActive = owl.owlCarousel(owlOptions);
            } else {
                owl.addClass('off');
            }

            $(window).resize(function() {
                if ( $(window).width() < 1600 ) {
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
        });  --}}


        var sync1 = $("#stories");
        var sync2 = $("#stories-logo");
        var syncedSecondary = true;

        var owlItem1 = $("#stories").find('img').length;

        sync1.owlCarousel({
            items:1,
            loop: (owlItem1 > 5),
            margin: 20,
            animateOut: 'fadeOut',
            nav: false,
            responsive:{
                600:{
                    dots: true,
                    items:1,
                    margin: 0
                }
            }
        }).on('changed.owl.carousel', syncPosition);

        if ( $(window).width() > 767 ) {

            sync2
            .on('initialized.owl.carousel', function () {
                sync2.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                center: true,
                smartSpeed: 200,
                items:3,
                slideSpeed : 500,
                margin:25,
                loop: (owlItem1 > 5),
                nav: true,
                responsiveRefreshRate : 100,
                responsive:{
                    600:{
                        items:5
                    }
                }
            }).on('changed.owl.carousel', syncPosition2);
        }
        function syncPosition(el) {
            var current = el.item.index;

            if ( $(window).width() > 767 ) {
                sync2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync2.find('.owl-item.active.center').length - 1;
                var start = sync2.find('.owl-item.active.center').first().index();
                var end = sync2.find('.owl-item.active.center').last().index();

                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync2.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }
        }

        function syncPosition2(el) {
            if(syncedSecondary) {
            var number = el.item.index;
                sync1.data('owl.carousel').to(number, 100, true);
            }
        }

        sync2.on("click", ".owl-item", function(e){
            e.preventDefault();
            var number = $(this).index();
            sync1.data('owl.carousel').to(number, 300, true);
        });

    </script>
@endpush
