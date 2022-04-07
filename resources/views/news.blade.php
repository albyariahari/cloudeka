@extends('app')

@section('meta')
<meta name="description" content="{{$metadata->meta_description }}">
<meta name="keywords" content=" {{ $metadata->meta_keyword }}">
<title>{{$metadata->meta_title}} - Lintasarta Cloudeka</title>
@endsection

@push('styles')
	<style>
		ul.news .content-wrapper { 
			padding-right: 0 !important;
			padding-left: 30px; 
			position: relative;
		}
		ul.news li {
			align-items: flex-start !important;
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
				max-height: 22px;
				right: auto !important;
			}
			#news ul.news li .content-wrapper .tags span{
				height: 22px;
				margin-bottom: 5px;
			}
			#news .featured-news .tags {
				left: 20px !important;
				right: auto !important;
			}
		}
		@media (max-width: 575.98px) {
			#news ul.news li .img-wrapper {
				width: 100% !important;
				height: unset !important;
				padding-top: 50%;
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
			<div class="icon-product icon-product--page"><img src="/imgs/news-banner-icon.svg" class="img-fluid"/></div>
            <div class="text">
                <h2 class="light-color mb-0" data-aos="fade-up" data-aos-duration="500">{{$category->title ?? $banner->title}}</h2>
            </div>
        </div>
    </div>
    <!-- /Banner -->


    <section class="sections" id="news-page">
        <div class="container-fluid">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="news-tab-nav" data-toggle="tab" data-target="#news-tab" href="#news-tab" type="button" role="tab" aria-controls="news-tab" aria-selected="true">{{$news['title']->title}}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="event-tab-nav" data-toggle="tab" data-target="#event-tab" href="#event-tab" type="button" role="tab" aria-controls="event-tab" aria-selected="false">{{$event['title']->title}}</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="news-tab" role="tabpanel" aria-labelledby="news-tab">

                    <div id="news">
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
                                        <img src="{{cloudekaBucketLocalUrl($news['bigSection']->translate($lang)->outer_thumbnail)}}" alt="">
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
                                                <img src="{{cloudekaBucketLocalUrl($new->translate($lang)->outer_thumbnail)}}" alt="" />
                                            </a>
                                        </div>
                                        <div class="content-wrapper">
                                            <strong class="date">{{\Carbon\Carbon::parse($new->created_at)->format('d')}} <span>{{\Carbon\Carbon::parse($new->created_at)->format('F')}}</span> {{\Carbon\Carbon::parse($new->created_at)->format('Y')}}</strong>
                                            <h2 class="news-title"><a href="{{route('news.detail',[$new->Category->translate($lang)->slug,$new->translate($lang)->slug])}}">{{ $new->translate($lang)->title }}</a></h2>
                                            <div class="tags">
                                                <a href="{{route('news.category', $new->Category->translate($lang)->slug)}}">{{$new->Category->translate($lang)->title}}</a>
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

                        <div class="row news-cols mt-5 mb-5 d-lg-flex" >
                            @foreach ($news['slideRow'] as $new)
                            <div class="col-12 col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="500"  data-aos-delay="100">
                                <div class="card">
                                    <div class="tags">
                                        <a href="{{ route('news.category',$new->Category->translate($lang)->slug) }}" class="badge badge-primary">{{$new->Category->translate($lang)->title}}</a>
                                        @foreach ($new->Tags as $item)
                                        <a href="{{ route('search', ['src' => urlencode(strtolower($item->title))]) }}" class="badge badge-primary">{!! $item->title !!}</a>
                                        @endforeach
                                    </div>
                                    <div class="img-wrapper">
                                        <a href="{{route('news.detail',[$new->Category->translate($lang)->slug,$new->translate($lang)->slug])}}">
                                            <img src="{{cloudekaBucketLocalUrl($new->translate($lang)->outer_thumbnail)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="content-wrapper">
                                        <h2 class="news-title"><a href="{{route('news.detail',[$new->Category->translate($lang)->slug,$new->translate($lang)->slug])}}">{{ $new->translate($lang)->title }}</a></h2>
                                        <div class="d-flex align-items-center news-meta">
                                            <strong class="date">{{\Carbon\Carbon::parse($new->created_at)->format('d')}} <span>{{\Carbon\Carbon::parse($new->created_at)->format('F')}}</span> {{\Carbon\Carbon::parse($new->created_at)->format('Y')}}</strong>
                                            <img src="{{ '/imgs/news/eye.svg' }}" class="ml-auto mr-2" alt="">
                                            <span>{{$new->click_count}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="row news-cols all mt-0 mt-lg-5 mb-5" id="load-more-news-data">
                            @foreach ($news['fourthRow'] as $new)
                            <div class="col-12 pb-4 pb-lg-0" data-aos="fade-up" data-aos-duration="500"  data-aos-delay="100">
                                <div class="card">
                                    <div class="img-wrapper">
                                        <img src="{{cloudekaBucketLocalUrl($new->translate($lang)->outer_thumbnail)}}" alt="">
                                    </div>
                                    <div class="content-wrapper">
                                        <div class=" tag-date">
                                            <div class="tags">
                                                <a href="{{ route('news.category',$new->Category->translate($lang)->slug) }}" class="badge badge-primary">{{$new->Category->translate($lang)->title}}</a>
                                                @foreach ($new->Tags as $item)
                                                <a href="{{ route('search', ['src' => urlencode(strtolower($item->title))]) }}" class="badge badge-primary">{!! $item->title !!}</a>
                                                @endforeach
                                            </div>
                                            <strong class="date right">{{\Carbon\Carbon::parse($new->created_at)->format('d')}} <span>{{\Carbon\Carbon::parse($new->created_at)->format('F')}}</span> {{\Carbon\Carbon::parse($new->created_at)->format('Y')}}</strong>
                                        </div>
                                        <h1 class="mb-4"><a href="{{route('news.detail',[$new->Category->translate($lang)->slug,$new->translate($lang)->slug])}}">{{ $new->translate($lang)->title }}</a></h1>
                                        <p>{{ $new->translate($lang)->summary }}</p>

                                        <div class="d-flex align-items-center mt-auto">
                                            <img src="{{ '/imgs/news/eye.svg' }}" class="mr-2" alt="">
                                            <span>{{$new->click_count}}</span>
                                            <img src="{{ '/imgs/news/more.svg' }}" class="ml-auto mr-2" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @if (count($news['fourthRow']) === 4 & $news['count'] > 12)

                        <button class="btn btn-rounded btn-primary btn-gradient mx-auto d-flex align-items-center" id="load-more-news" data-count="{{$news['startData']}}" data-all="{{$news['count']}}" data-type="news" data-category_slug="{{$category_slug ?? null}}">
                            <span class="pl-3 ml-4 font-18 text-load">Load More</span>
                            <img src="{{ '/imgs/news/load-more.svg' }}" class="ml-4" height="20">
                        </button>

                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="event-tab" role="tabpanel" aria-labelledby="event-tab">

                    <div id="news">

                        <div class="row d-none d-lg-flex">

                            @if ($event['bigSection'])
                            <div class="col-12 col-lg-8">
                                <div class="featured-news m-0" data-aos="fade-right" data-aos-duration="500">
                                    <div class="tags">
                                        <a href="{{route('news.category',$event['bigSection']->Category->translate($lang)->slug)}}" class="badge badge-primary">{{$event['bigSection']->Category->translate($lang)->title}}</a>
                                        @foreach ($event['bigSection']->Tags as $item)
                                        <a href="{{ route('search', ['src' => urlencode(strtolower($item->title))]) }}" class="badge badge-primary">{!! $item->title !!}</a>
                                        @endforeach
                                    </div>
                                    <div class="img-wrapper">
                                        <img src="{{cloudekaBucketLocalUrl($event['bigSection']->translate($lang)->outer_thumbnail)}}" alt="">
                                    </div>
                                    <div class="content-wrapper">
                                        <strong class="date">{{\Carbon\Carbon::parse($event['bigSection']->created_at)->format('d/m/Y')}}</strong>
                                        <h1><a href="{{route('news.detail',[$event['bigSection']->Category->translate($lang)->slug,$event['bigSection']->translate($lang)->slug])}}">{{ $event['bigSection']->translate($lang)->title }}</a></h1>
                                        <p>{{ $event['bigSection']->translate($lang)->summary }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="col-12 col-lg-4">
                                <ul class="news">
                                    @foreach ($event['tripleRow'] as $new)
                                    <li data-aos="fade-left" data-aos-duration="500"  data-aos-delay="100">
                                        <div class="img-wrapper">
                                            <img src="{{cloudekaBucketLocalUrl($new->translate($lang)->outer_thumbnail)}}" alt="">
                                        </div>
                                        <div class="content-wrapper">
                                            <strong class="date">{{\Carbon\Carbon::parse($new->created_at)->format('d')}} <span>{{\Carbon\Carbon::parse($new->created_at)->format('F')}}</span> {{\Carbon\Carbon::parse($new->created_at)->format('Y')}}</strong>
                                            <h1><a href="{{route('news.detail',[$new->Category->translate($lang)->slug,$new->translate($lang)->slug])}}">{{ $new->translate($lang)->title }}</a></h1>
                                            <div class="tags">
                                                <span><a href="{{route('news.category',$new->Category->translate($lang)->slug)}}">{{$new->Category->translate($lang)->title}}</a></span>
                                                @foreach ($new->Tags as $item)
                                                <span><a href="{{ route('search', ['src' => urlencode(strtolower($item->title))]) }}"></a>{!! $item->title !!}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="row news-cols mt-5 mb-5  d-none d-lg-flex" >
                            @foreach ($event['slideRow'] as $new)
                            <div class="col-12 col-lg-3 pb-4" data-aos="fade-up" data-aos-duration="500"  data-aos-delay="100">
                                <div class="card">
                                    <div class="tags">
                                        <a href="{{ route('news.category', $new->Category->translate($lang)->slug) }}" class="badge badge-primary">{{$new->Category->translate($lang)->title}}</a>
                                        @foreach ($new->Tags as $item)
                                        <a href="{{ route('search', ['src' => urlencode(strtolower($item->title)) ]) }}" class="badge badge-primary">{!! $item->title !!}</a>
                                        @endforeach
                                    </div>
                                    <div class="img-wrapper">
                                        <img src="{{cloudekaBucketLocalUrl($new->translate($lang)->outer_thumbnail)}}" alt="">
                                    </div>
                                    <div class="content-wrapper">
                                        <h1><a href="{{route('news.detail',[$new->Category->translate($lang)->slug,$new->translate($lang)->slug])}}">{{ $new->translate($lang)->title }}</a></h1>
                                        <div class="d-flex align-items-center">
                                            <strong class="date">{{\Carbon\Carbon::parse($new->created_at)->format('d')}} <span>{{\Carbon\Carbon::parse($new->created_at)->format('F')}}</span> {{\Carbon\Carbon::parse($new->created_at)->format('Y')}}</strong>
                                            <img src="{{ '/imgs/news/eye.svg' }}" class="ml-auto mr-2" alt="">
                                            <span>{{$new->click_count}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="row news-cols all mt-0 mt-lg-5 mb-5" id="load-more-event-data">
                            @foreach ($event['fourthRow'] as $new)
                            <div class="col-12 pb-4 pb-lg-0" data-aos="fade-up" data-aos-duration="500"  data-aos-delay="100">
                                <div class="card">
                                    <div class="img-wrapper">
                                        <img src="{{cloudekaBucketLocalUrl($new->translate($lang)->outer_thumbnail)}}" alt="">
                                    </div>
                                    <div class="content-wrapper">
                                        <div class=" tag-date">
                                            <div class="tags">
                                                <a href="{{ route('news.category', $new->Category->translate($lang)->slug) }}" class="badge badge-primary">{{$new->Category->translate($lang)->title}}</a>
                                                @foreach ($new->Tags as $item)
                                                <a href="{{ route('search', ['src' => urlencode(strtolower($item->title))]) }}" class="badge badge-primary">{!! $item->title !!}</a>
                                                @endforeach
                                            </div>
                                            <strong class="date right">{{\Carbon\Carbon::parse($new->created_at)->format('d')}} <span>{{\Carbon\Carbon::parse($new->created_at)->format('F')}}</span> {{\Carbon\Carbon::parse($new->created_at)->format('Y')}}</strong>
                                        </div>
                                        <h1 class="mb-4"><a href="{{route('news.detail',[$new->Category->translate($lang)->slug,$new->translate($lang)->slug])}}">{{ $new->translate($lang)->title }}</a></h1>
                                        <p>{{ $new->translate($lang)->summary }}</p>

                                        <div class="d-flex align-items-center mt-auto">
                                            <img src="{{ '/imgs/news/eye.svg' }}" class="mr-2" alt="">
                                            <span>{{$new->click_count}}</span>
                                            <img src="{{ '/imgs/news/more.svg' }}" class="ml-auto mr-2" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        @if (count($event['fourthRow']) === 4 & $event['count'] > 12)
                        <button class="btn btn-rounded btn-primary btn-gradient mx-auto d-flex align-items-center" id="load-more-event" data-count="{{$event['startData']}}" data-all="{{$event['count']}}" data-category_slug="{{$category_slug ?? null}}">
                            <span class="pl-3 ml-4 font-18 text-load">Load More</span>
                            <img src="{{ '/imgs/news/load-more.svg' }}" class="ml-4" height="20">
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script>
    $(document).ready(function () {
        $('#load-more-news').on('click', function(){
            var row = Number($(this).data('count'))
            var allcount = Number($(this).data('all'));
            var category_slug = $(this).data('category_slug');
            var rowperpage = 10;

            $.ajax({
                url: "{{route('news.ajax')}}",
                type: 'post',
                data: {
                    "_token": '{{ csrf_token() }}',
                    "row":row,
                    "type":'news',
                    "perpage":rowperpage,
                    "category_slug":category_slug,
                },
                beforeSend:function(){
                    $("#load-more-news .text-load").text("Loading...");
                },
                success: function(response){

                    // Setting little delay while displaying new content
                    setTimeout(function() {
                        // appending posts after last post with class="post"
                        $("#load-more-news-data").append(response).show().fadeIn("slow");

                        var rowno = row + rowperpage;

                        // checking row value is greater than allcount or not
                        if(rowno > allcount){

                            // Change the text and background
                            $('#load-more-news').remove();
                        }else{
                            $("#load-more-news .text-load").text("Load More");
                            $('#load-more-news').attr('count', rowno);
                        }
                    }, 2000);

                }
            });
        });

        $('#load-more-event').on('click', function(){
            var row = Number($(this).data('count'))
            var allcount = Number($(this).data('all'));
            var category_slug = Number($(this).data('category_slug'));
            var rowperpage = 10;

            $.ajax({
                url: "{{route('news.ajax')}}",
                type: 'post',
                data: {
                    "_token": '{{ csrf_token() }}',
                    "row":row,
                    "type":'news',
                    "perpage":rowperpage,
                    "category_slug":category_slug,
                },
                beforeSend:function(){
                    $("#load-more-event .text-load").text("Loading...");
                },
                success: function(response){

                    // Setting little delay while displaying new content
                    setTimeout(function() {
                        // appending posts after last post with class="post"
                        $("#load-more-event-data").append(response).show().fadeIn("slow");

                        var rowno = row + rowperpage;

                        // checking row value is greater than allcount or not
                        if(rowno > allcount){

                            // Change the text and background
                            $('#load-more-event').remove();
                        }else{
                            $("#load-more-event .text-load").text("Load More");
                            $('#load-more-event').attr('count', rowno);
                        }
                    }, 2000);

                }
            });
        });
    });
</script>
@endpush
