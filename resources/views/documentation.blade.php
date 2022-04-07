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
				<img src='{{ cloudekaBucketLocalUrl($banner->image_1) }}' class="w-100" alt="Why Lintasarta cloud">
				<img src="/imgs/documentations/documents.png" class="img-fluid document-svg" alt="Icon">
				<div class="text">
					<h2 class="light-color">{!! $banner->title !!}</h2>
					<p class="light-color description d-none d-lg-block">{!! $banner->subtitle !!}</p>
				</div>
			</div>
		</div>
    </section>
	
	<!-- Product Templates -->
	<template id="temp-pro-li">
		<li class="nav-item">
			<a class="nav-link txt-medium doc" href="#" data-id=""></a>
		</li>
	</template>
	<!-- /Product Templates -->
	
	<!-- Most Viewed Templates -->
	<template id="temp-act-div">
		<div class="document__item document__item--activity">
			<div class="thumbnail thumbnail--light-blue">
				<i class="icon-account"></i>
			</div>
			<div class="font-size-16 txt-secondary"></div>
			<div class="date">
				<div class="font-size-15 txt-light">
					<i class="far fa-clock"></i> <span class="act-date"></span>
				</div>
			</div>
		</div>
	</template>
	<!-- /Most Viewed Templates -->
	
	<!-- Activities List Templates -->
	<template id="temp-doc-div">
		<div class="document__item">
			<div class="content">
				<div class="thumbnail">
					<i class="icon-pdf">
						<span class="path2"></span>
					</i>
				</div>
				<a href="" target="_blank" class="font-size-16 txt-secondary"></a>
			</div>
			<div class="date">
				<div class="font-size-16 txt-light"></div>
			</div>
		</div>
	</template>
	<!-- /Activities List Templates -->

    <section class="sections documentation">
        <div class="container-fluid">
            <div class="row justify-content-center documentation__search">
                <div class="col-12 text-center mb-3">
                    <h1 class="txt-dark font-25 txt-bold d-none d-lg-block">Document Center</h1>
                </div>
                <div class="col-lg-5">
                    <form id="form-search" action="{{ route('documentation.search') }}" class="search__wrapper">
                        <i class="icon-search mr-0"></i>
						{{ Form::text('qry', '', ['class' => 'custom-search', 'Placeholder' => 'Search by Keyword']) }}
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 pr-lg-0 documentation__sidebar">
                    <aside class="calculator__sidebar calculator__sidebar--w100">
						<ul class="accordion nav flex-column" id="accordionSidebar">
							<li><h2 class="doc-title">Product Category</h2></li>
						@foreach ($categories as $cat)
                            <li class="card nav-item">
                                <div id="cat-{{ $cat->id }}" class="card-header collapsed cat" data-id="{{ $cat->id }}" data-target="#cat-pro-{{ $cat->id }}" data-toggle="collapse" aria-expanded="false" aria-controls="cat-pro-{{ $cat->id }}">
                                    <h3 class="mb-0">
										{!! $cat->title !!}
                                        <i class="fa fa-chevron-down font-size-13" aria-hidden="true"></i>
                                    </h3>
                                </div>
                                <div id="cat-pro-{{ $cat->id }}" class="collapse" aria-labelledby="cat-{{ $cat->id }}">
                                    <div class="card-body">
										<ul class="nav flex-column"></ul>
                                    </div>
                                </div>
                            </li>
						@endforeach
						</ul>
					</aside>
                </div>
				
                <div class="col-lg-9 documentation__content">
                    <div class="row documentation__tables active">
                        <div class="col-12 head-document">
                            <h2 id="product" class="txt-medium txt-primary"></h2>
                        </div>
                        <div class="col-lg-6 p-lg-0 table-document right-border">
                            <div class="document__wrapper">
                                <div class="document__wrapper__head">
                                    <h3 class="txt-medium txt-secondary font-size-22">
                                        Most Viewed Documents
                                    </h3>
                                </div>
                                <div class="document__wrapper__body">
                                    <div id="most-viewed" class="item-wrapper"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 p-lg-0 table-document">
                            <div class="document__wrapper">
                                <div class="document__wrapper__head">
                                    <h3 class="txt-medium txt-secondary font-size-22">
                                        Recent Activity
                                    </h3>
                                </div>
                                <div class="document__wrapper__body">
                                    <div id="activities-list" class="item-wrapper"></div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>
    </section>

    @include('layouts.subscription')

@stop

@push('scripts')
<script>
	function BasicClone(templateID) {
		return $($(`#${templateID}`).clone().html());
	}
	
	function CloneProductLI(templateID, id, name) {
		return BasicClone(templateID).find('a').attr({
			"data-id": id, 
			"id": `pro-${id}`
		}).append(name).end();
	}

	function CloneMostViewedDiv(templateID, url, name, date) {
		return BasicClone(templateID).find('a').prop({
			"href": url, 
			"text": name
		}).end().find('div.txt-light').append(date).end();
	}
	
	function CloneActivitiesListDiv(templateID, activity, date) {
		return BasicClone(templateID).find('div.txt-secondary').append(activity).end()
									 .find('span.act-date').append(date).end();
	}
	
	$(document).ready(function () {
		let doc = $(this), 
			mostViewed = $('div#most-viewed'), 
			activitiesList = $('div#activities-list');
		
		doc.on('click', 'a.doc', function (e) {
			e.preventDefault();
			
			let t = $(this);
			
			if (t.hasClass('active') === false) {
				$('a.doc').parent().removeClass('active');
				
				$.ajax({
					"type": "POST", 
					"dataType": "JSON", 
					"data": {
						"id": t.data('id')
					}, 
					"url": "{{ route('documentation.get.docs') }}", 
					"headers": {
						"X-CSRF-TOKEN": "{{ csrf_token() }}"
					}, 
					"success": function(response, textStatus, jqXHR) {
						$('a.doc').removeClass('active');
						t.addClass('active');
						mostViewed.empty().hide();
						activitiesList.empty().hide();
						
						$.each(response.data.docs, function (idx, val) {
							$('#product').text(t.text());
							mostViewed.append(CloneMostViewedDiv('temp-doc-div', val.url, val.name, val.date)).fadeIn(800);
						});
						
						$.each(response.data.acts, function (idx, val) {
							activitiesList.append(CloneActivitiesListDiv('temp-act-div', val.action, val.date)).fadeIn(800);
						});
					}, 
					"error": function (jqXHR, textStatus, errorThrown) {
						console.log(jqXHR.responseJSON);
					}
				});
			}
		});
		
		$('.nav-item .txt-medium').on('click', function (e) {
			e.preventDefault();
			$('.nav-item .txt-medium').removeClass('active');
			$(`.nav-item .txt-medium[data-menu=${$(this).data('menu')}]`).addClass('active');
		});
		
		$('div.cat').each(function () {
			let t = $(this);
			
			$.ajax({
				"type": "POST", 
				"dataType": "JSON", 
				"data": {
					"id": t.data('id')
				}, 
				"url": "{{ route('documentation.get.products') }}", 
				"headers": {
					"X-CSRF-TOKEN": "{{ csrf_token() }}"
				}, 
				"success": function(response, textStatus, jqXHR) {
					mostViewed.empty();
					activitiesList.empty();
					
					$.each(response.data, function (idx, val) {
						t.parent().find('ul').append(CloneProductLI('temp-pro-li', val.id, val.name));
					});
				}, 
				"error": function (jqXHR, textStatus, errorThrown) {
					console.log(jqXHR.responseJSON);
				}
			});
		});
		
		$('div.cat').first().trigger('click');
		setTimeout(function(){ 
			$('a.doc#pro-1').trigger('click');
		}, 1500);
	});
</script>
@endpush