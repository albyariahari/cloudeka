@extends('app')

@section('meta')

<title>{{$metadata->meta_title}} - Lintasarta Cloudeka</title>
<meta name="description" content="{{$metadata->meta_description }}">
<meta name="keywords" content=" {{ $metadata->meta_keyword }}">

@endsection

@push('styles')
<link rel="stylesheet" href="{{ '/js/owl/assets/owl.carousel.min.css' }}" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <!-- Banner -->
    <div class="container-fluid px-0">
        <div class="banner-title">
            <img src="{{env('APP_URL').'/storage/'.$banner->image_1}}" class="w-100" alt="{{$metadata->meta_title}} banner image search">
            <div class="text">
                <h2 class="light-color mb-0" data-aos="fade-up" data-aos-duration="500">{!! $banner->title !!}</h2>
                <!-- <p class="light-color d-none d-lg-block" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">{!! $banner->subtitle !!}</p> -->
            </div>
        </div>
    </div>

    <!-- Section Form -->
    <section class="sections">
        <div class="container-fluid">
			<div class="col-12 offset-lg-1 search-result">
				<div class="search-result__info mb-5">
					<p class="description dark-color mb-0">
						Search results for "<i class="txt-bold">{!! $src !!}</i>"
					</p>
					<p class="description dark-color">
						Showing <b>{{ $cnt }}</b> result(s)
					</p>
				</div>

				@foreach ($results as $resKey => $resVal)
					<h3 class="dark-color mb-3">{{ ucwords($resKey) }} ({{ count($resVal) }})</h3>
					@foreach ($resVal as $key => $val)
						@if ($resKey === 'pages')
							<div class="quick-links pl-4">
								<p><a href="/{{ $val->title === 'Home' ? '' : $val->anchor }}" class="description dark-color" target="_blank">{{ $val->title }}</a></p>
							</div>
						@elseif ($resKey === 'products')
							<div class="quick-links pl-4">
								<p><a href="/products/{{ $val->slug }}" class="description dark-color" target="_blank">{{ $val->title }}</a></p>
							</div>
						@elseif ($resKey === 'news')
							<div class="quick-links pl-4">
								<p><a href="/news/{{$val->Category->translate($lang)->slug}}/{{ $val->slug }}" class="description dark-color" target="_blank">{{ $val->title }}</a></p>
							</div>
						@elseif ($resKey === 'solutions')
							<div class="quick-links pl-4">
								<p><a href="/solutions/{{ $val->slug }}" class="description dark-color" target="_blank">{{ $val->title }}</a></p>
							</div>
						@elseif ($resKey === 'faqs')
							<div class="quick-links pl-4">
								<p><a href="/faq#{{ $val->slug }}" class="description dark-color" target="_blank">{{ $val->title }}</a></p>
							</div>
						@elseif ($resKey === 'documentations')
							<div class="quick-links pl-4">
								<p><a href="/documentation/{{ $val->id }}" class="description dark-color" target="_blank">{{ $val->name }}</a></p>
							</div>
						@endif
					@endforeach
					<p>&nbsp;</p>
				@endforeach
			</div>
        </div>
    </section>
    @include('layouts.subscription')
@stop

@push('scripts')
@endpush
