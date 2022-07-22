@extends('app')

@section('meta')
<title>{!! $metadata->meta_title !!}</title>
@endsection

@push('styles')

@endpush

@section('content')
    <section class="documentation-banner">
        <div class="container-fluid px-0">
            <div class="banner-title">
                <img src='{{ cloudekaBucketLocalUrl($banner->image_1) }}' class="w-100" alt="Why Lintasarta cloud faq cloudeka">
                <img src="/imgs/faqs/faq-svg.png" class="img-fluid document-svg" alt="Icon">
                <div class="text">
                    <h2 class="light-color">{!! $banner->title !!}</h2>
                    <p class="light-color description d-none d-lg-block">{!! $banner->subtitle !!}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="sections documentation">
        <div class="container-fluid">
            <div class="row justify-content-center documentation__search">
                <div class="col-12 text-center mb-3">
                    <h1 class="txt-dark font-25 txt-bold d-none d-lg-block">FAQ</h1>
                </div>
                <div class="col-lg-5">
                    <form id="form" action="" class="search__wrapper">
                        <i class="icon-search mr-0"></i>
                        <input type="text" id="qry" placeholder="Search by Keyword" class="custom-search">
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 pr-lg-0 documentation__sidebar">
                    <aside class="calculator__sidebar calculator__sidebar--w100">
                        <ul class="accordion nav flex-column" id="accordionSidebar">
                            <div class="calculator__sidebar__head">
                                <h1 class="font-size-18 text-light txt-bold">
									Category
								</h1>
                            </div>
						
						@foreach ($categories as $cat)
                            <li id="li-cat-{{ $cat->id }}" class="card nav-item faq-cat">
                                <div id="heading-{{ $cat->id }}" class="card-header collapsed" data-target="#collapse-{{ $cat->id }}" data-toggle="collapse" aria-controls="collapse-{{ $cat->id }}" aria-expanded="false">
                                    <h6 class="mb-0 font-size-18">
										{!! $cat->title !!}
										<i class="fa fa-chevron-down font-size-13" aria-hidden="true"></i>
                                    </h6>
                                </div>
                                <div id="collapse-{{ $cat->id }}" class="collapse" data-parent="#accordionSidebar" aria-labelledby="heading-{{ $cat->id }}">
                                    <div class="card-body">
										<ul class="nav flex-column">
										@foreach ($cat->faqs as $faq)
											@if ($faq->items->count())
											<li id="li-{{ $faq->id }}" class="nav-item faq">
												<a href="#" class="nav-link font-size-16 txt-medium" data-menu="menu-{{ $faq->id }}">{!! $faq->translate($lang)->title !!}</a>
											</li>
											@endif
										@endforeach
										</ul>
                                    </div>
                                </div>
                            </li>
						@endforeach
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-9 documentation__content">
				@foreach ($categories as $cat)
					@foreach ($cat->faqs as $faq)
                    <div class="row documentation__tables faq-div" id="menu-{{ $faq->id }}">
                        <div class="col-12 head-document">
                            <h1 class="font-25 txt-medium txt-primary">
								{!! $cat->title !!}
							</h1>
                        </div>
                        <div class="col-12 p-lg-0 table-document">
                            <div class="document__wrapper">
                                <div class="document__wrapper__head no-top">
                                    <h1 class="txt-medium txt-secondary font-size-22">
                                        {!! $faq->translate($lang)->name !!}
                                    </h1>
                                </div>
                                <div class="document__wrapper__body">
                                    <div class="item-wrapper">
                                        <div class="accordion" id="accordionFAQ">
										@if ($faq->items->count())
											@foreach ($faq->items as $item)
											<div class="card">
												<div id="{{ $item->translate($lang)->slug }}" class="card-header faq-item" data-target="#item-col-{{ $item->id }}" data-toggle="collapse" aria-expanded="false" aria-controls="item-col-{{ $item->id }}">
													<p class="font-size-20 txt-dark">{!! $item->translate($lang)->title !!}</p>
													<div class="icon">
														<i class="fas fa-plus"></i>
														<i class="fas fa-times"></i>
													</div>
												</div>
												<div id="item-col-{{ $item->id }}" class="collapse" data-parent="#accordionFAQ" aria-labelledby="{{ $item->translate($lang)->slug }}">
													<div class="card-body font-size-16">
														{!! $item->translate($lang)->description !!}
													</div>
												</div>
											</div>
											@endforeach
										@endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					@endforeach
				@endforeach
                </div>
            </div>
        </div>
    </section>
    @include('layouts.subscription')
@stop

@push('scripts')
<script>
	$(document).ready(function () {
		let hash = window.location.hash;
		
		if (hash === '') {
			$('.faq-cat').first().find('div.card-header').first().removeClass('collapsed').attr('aria-expanded', 'true');
			$('.faq-cat').first().find('div.collapse').first().addClass('show');
			$('.nav-item .txt-medium').first().addClass('active');
			$('.faq-div').first().addClass('active');
		} else {
			let div = $(`${hash}`), 
				p7 = div.parents().eq(6), 
				faq = $(`a[data-menu=${p7.prop('id')}`)
				faqLabel = faq.attr('aria-labelledby');
			
			$(`div#${faqLabel}`).removeClass('collapsed').attr('aria-expanded', 'true');
			$(`div[aria-labelledby=${hash.substring(1)}]`).addClass('show');
			faq.addClass('active').parents().eq(3).addClass('show');
			p7.addClass('active');
			div.removeClass('collapsed').attr('aria-expanded', 'true');
		}
		
		$('.nav-item .txt-medium').on('click', function (e) {
			e.preventDefault();

			let t = $(this), 
				menu = t.data('menu');
			
			$('.nav-item .txt-medium').removeClass('active').end().find(`[data-menu=${menu}]`).addClass('active');
			$('.documentation__tables').removeClass('active').end().find(`#${menu}`).addClass('active');
		});
		
		$('#form').submit(function (e) {
			e.preventDefault();
			
			$.ajax({
				"type": "POST", 
				"dataType": "JSON", 
				"data": {
					"qry": $('#qry').val()
				}, 
				"url": "{{ route('faq.ajax.get') }}", 
				"headers": {
					"X-CSRF-TOKEN": "{{ csrf_token() }}"
				}, 
				"success": function(response, textStatus, jqXHR) {
					$('.faq-cat').hide();
					$('.faq').find('a').removeClass('active').end().hide();
					$('.faq-item').addClass('collapsed').hide();
					$('.faq-div').removeClass('active');
					$('.collapse').removeClass('show');
					
					$.each(response.data.cat, function (idx, val) {
						$(`#li-cat-${val}`).show();
						$(`#heading-${val}`).show();
					});
					
					$.each(response.data.faq, function (idx, val) {
						$(`#li-${val}`).show();
					});
					
					$.each(response.data.slug, function (idx, val) {
						$(`#${val}`).show();
					});
					
					$('.faq-cat:visible').first().find('.collapse').addClass('show');
					$(`#menu-${response.data.faq[0]}`).addClass('active');
				}, 
				"error": function (jqXHR, textStatus, errorThrown) {
					console.log(jqXHR.responseJSON);
				}
			});
		});
	});
</script>
@endpush