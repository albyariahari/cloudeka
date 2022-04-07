@extends('app')

@section('meta')
<meta name="description" content="{{$newsTranslation->meta_description }}">
<meta name="keywords" content=" {{ $newsTranslation->meta_keyword }}">
<title>{{$newsTranslation->meta_title}} - Lintasarta Cloudeka</title>
@endsection

@push('styles')
@endpush

@section('content')

    <!-- Banner -->
    <div class="container-fluid px-0">
        <div class="banner-title">
            <img src="{{ cloudekaBucketLocalUrl($banner->image_1) }}" class="w-100" alt="{{$newsTranslation->meta_title}}">
            <div class="text">
                <h2 class="light-color mb-0" data-aos="fade-up" data-aos-duration="500">{{$banner->title}}</h2>
            </div>
        </div>
    </div>
    <!-- /Banner -->


    <section class="sections" id="news-detail">
        <div class="container-fluid">
            <div id="news-content">

                <div class="row">
                    <div class="col-3 pr-5 d-none d-lg-block">
                        <ul class="news">
                            @foreach ($news as $item)

                            <li data-aos="fade-left" data-aos-duration="500"  data-aos-delay="100">
                                <div class="content-wrapper">
                                    <strong class="date">{{\Carbon\Carbon::parse($item->created_at)->format('d')}} <span>{{\Carbon\Carbon::parse($item->created_at)->format('F')}}</span> {{\Carbon\Carbon::parse($item->created_at)->format('Y')}}</strong>
                                    <h1><a href="{{route('news.detail',[$item->Category->translate($lang)->slug,$item->translate($lang)->slug])}}">{{ $item->translate($lang)->title }}</a></h1>
                                </div>
                            </li>

                            @endforeach
                        </ul>
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="news-data mb-5" data-aos="fade-right" data-aos-duration="500">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <a class="back d-flex align-items-center" href="{{route('news')}}">
                                    <img src="{{ '/imgs/news/back.svg' }}" alt="" class="mr-2 mb-0">
                                    Back to News & Event
                                </a>
                                <div class="tags d-none d-lg-block">
                                    <a href="{{ route('news.category', [$newsTranslation->news->category->slug]) }}" class="badge badge-primary">{!! $newsTranslation->News->Category->translate($lang)->title !!}</a>
                                    @foreach ($newsTranslation->News->Tags as $item)
                                    <a href="{{ route('search').'?src='.urlencode(strtolower($item->title)) }}" class="badge badge-primary">{!! $item->title !!}</a>
                                    @endforeach
                                </div>
                            </div>

                            <div class="content-wrapper">
                                <div class="d-flex flex-column">
                                    <h1 class="order-1 order-lg-0">{{$newsTranslation->title}}</h1>
                                    <strong class="date order-0  order-lg-1" >{{\Carbon\Carbon::parse($item->created_at)->format('d')}} <span>{{\Carbon\Carbon::parse($item->created_at)->format('F')}}</span> {{\Carbon\Carbon::parse($item->created_at)->format('Y')}} <span class="main-color"> | {{$newsTranslation->News->Author->name}}</span></strong>
                                </div>

                                {!! $newsTranslation->description !!}
                            </div>


                            <div class="tags d-block d-lg-none">
                                <div class="badge badge-primary">{{$newsTranslation->News->Category->translate($lang)->title}}</div>
                                @foreach ($newsTranslation->News->Tags as $item)
                                <div class="badge badge-primary">{{$item->title}}</div>
                                @endforeach
                            </div>
                        </div>
                        <button class="btn btn-primary btn-rounded d-block ml-auto" id="sharePostBtn">
                            <img src="{{ '/imgs/news/share.svg' }}" width="15" class="mr-2 mb-0">
                            Share this
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" tabindex="-1" role="dialog" id="shareModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>URL copied!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script>
    $(document).ready(function() {
        var $temp = $("<input>");
        var $url = $(location).attr('href');
        var $sharePostBtn = $('#sharePostBtn');

        $sharePostBtn.click(function() {
            $("body").append($temp);
            $temp.val($url).select();
            document.execCommand("copy");
            $temp.remove();
            $("#shareModal").modal("show");
        });
    });
</script>
@endpush
