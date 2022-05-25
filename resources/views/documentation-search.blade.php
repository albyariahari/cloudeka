@extends('app')

@section('meta')
	<title>{!! $metadata->meta_title !!}</title>
@endsection

@push('styles')

@endpush

@section('content')
	<!-- Product Template -->
	<template id="tmp-pro">
		<li class="nav-item">
			<a class="nav-link font-size-16 txt-medium pro" href="#" data-id=""></a>
		</li>
	</template>
	<!-- /Product Template -->
	
	<!-- Documentation Template -->
	<template id="tmp-doc">
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
				<div class="font-size-18 txt-light"></div>
			</div>
		</div>
	</template>
	<!-- /Documentation Template -->
	
	<!-- Pagination Template -->
	<template id="tmp-pg">
		<a href="#" class="paging dark-color mr-2"></a>
	</template>
	<!-- /Pagination Template -->
	
	<!-- Banner Section -->
    <section class="documentation-banner">
        <div class="container-fluid px-0">
            <div class="banner-title">
                <img src='{{ cloudekaBucketLocalUrl($banner->image_1) }}' class="w-100" alt="Why Lintasarta cloud documentation seach cloudeka" loading="lazy">
                <img src="{{ '/imgs/documentations/documents.png' }}" class="img-fluid document-svg" alt="Icon" loading="lazy">
                <div class="text">
                    <h2 class="light-color">{!! $banner->title !!}</h2>
                    <p class="light-color description d-none d-lg-block">{!! $banner->subtitle !!}</p>
                </div>
            </div>
        </div>
    </section>
	<!-- /Banner Section -->
	
	<!-- Main Section -->
    <section class="sections documentation">
        <div class="container-fluid">
			<!-- Search Box -->
            <div class="row justify-content-center documentation__search">
                <div class="col-12 text-center mb-3">
                    <h1 class="txt-dark font-25 txt-bold d-none d-lg-block">Document Center</h1>
                </div>
                <div class="col-lg-5">
                    <form id="form-search" action="" method="get" class="search__wrapper">
                        <i class="icon-search mr-0"></i>
						{{ Form::text('qry', $search, ['class' => 'custom-search', 'Placeholder' => 'Search by Keyword']) }}
                    </form>
                </div>
            </div>
			<!-- /Search Box -->

            <div class="row">
				<!-- Sidebar -->
                <div class="col-lg-3 pr-lg-0 documentation__sidebar">
                    <aside class="calculator__sidebar calculator__sidebar--w100">
						<ul class="accordion nav flex-column" id="accordionSidebar">
                            <div class="calculator__sidebar__head">
                                <h1 id="get-all" class="font-size-18 text-light txt-bold">
									All Results ({{ $total['all'] }})
								</h1>
                            </div>
							
						@foreach ($categories as $cat)
                            <li class="card nav-item">
                                <div id="cat-{{ $cat->id }}" class="card-header collapsed cat" data-id="{{ $cat->id }}" data-target="#cat-pro-{{ $cat->id }}" data-toggle="collapse" aria-expanded="false" aria-controls="cat-pro-{{ $cat->id }}">
                                    <h6 class="mb-0 font-size-18">
										{!! $cat->title !!} ({{ count($total[$cat->id]) }})
                                        <i class="fa fa-chevron-down font-size-13" aria-hidden="true"></i>
                                    </h6>
                                </div>
                                <div id="cat-pro-{{ $cat->id }}" class="collapse" data-parent="#accordionSidebar" aria-labelledby="cat-{{ $cat->id }}">
                                    <div class="card-body">
										<ul class="nav flex-column"></ul>
                                    </div>
                                </div>
                            </li>
						@endforeach
						</ul>
					</aside>
                </div>
				<!-- /Sidebar -->
				
				<!-- Documentations List -->
                <div class="col-lg-9 documentation__content">
                    <div class="row documentation__tables active">
                        <div class="col-12 head-document">
                            <h1 id="product" class="font-25 txt-medium txt-primary">Search results for "{{ $search }}"</h1>
							<p id="res-info" class="font-15 txt-secondary"></p>
							<p class="font-15 txt-secondary d-flex justify-content-end"><b class="dark-color mr-2">Page:</b> <span id="paging"></span></p>
                        </div>
                        <div class="col-12 p-lg-0 table-document right-border">
                            <div class="document__wrapper">
                                <div class="document__wrapper__body">
                                    <div id="doc-list" class="item-wrapper"></div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
				<!-- /Documentations List -->
            </div>
        </div>
    </section>
	<!-- /Main Section -->

    @include('layouts.subscription')
@stop

@push('scripts')
	<script>
		function CloneBasic(templateID) {
			return $($(`#${templateID}`).clone().html());
		}
		
		function CloneProduct(templateID, productID, name, total) {
			let string = `${name} (${total})`;
			
			return CloneBasic(templateID).find('a').attr({
				"data-id": productID, 
				"id": `pro-${productID}`
			}).append(string).end();
		}
		
		function CloneDoc(templateID, name, url, date) {
			return CloneBasic(templateID).find('a').prop('href', url).append(name).end()
										 .find('div.txt-light').append(date).end();
		}
		
		function ClonePagination(templateID, number) {
			return CloneBasic(templateID).addClass(number === 1 ? 'active' : '').append(number);
		}
		
		function ResetResultInfo(id, start, end, total) {
			let string = `Displaying ${start}-${end} of ${total} result(s)`;
			
			$(`#${id}`).empty().append(string);
		}
		
		function ResetPagination(id, templateID, length) {
			let elem = $(`#${id}`);
			
			elem.empty();
			
			for (let a = 1; a <= length; a++)
				elem.append(ClonePagination(templateID, a));
		}
		
		function ResetDocList(id, templateID, docs, fromCat = 0) {
			let elem = $(`#${id}`);
			
			elem.empty();
			if (fromCat !== 0) console.log(1);
			$.each(docs, function (idx, val) {
				elem.append(CloneDoc(templateID, val.name, val.url, val.date));
			});
		}
		
		$(document).ready(function () {
			const _doc = $(this), 
				  _src = "{{ $search }}", 
				  _tmpPro = 'tmp-pro', 
				  _tmpDoc = 'tmp-doc', 
				  _tmpPg = 'tmp-pg', 
				  _idResInfo = 'res-info', 
				  _idPaging = 'paging', 
				  _idDocList = 'doc-list';
			
			_doc.on('click', 'a.paging', function (e) {
				e.preventDefault();
				
				let t = $(this), 
					active = _doc.find('a.pro.active'), 
					id = active.length ? active.first().data('id') : 0;
				
				if (t.hasClass('active') === false) {
					$.ajax({
						"type": "POST", 
						"dataType": "JSON", 
						"data": {
							"id": id, 
							"pg": t.text(), 
							"src": _src
						}, 
						"url": "{{ route('documentation.search.docs') }}", 
						"headers": {
							"X-CSRF-TOKEN": "{{ csrf_token() }}"
						}, 
						"success": function(response, textStatus, jqXHR) {
							let dt = response.data;
							
							$('a.paging').removeClass('active');
							t.addClass('active');
							ResetResultInfo(_idResInfo, dt.start, dt.end, dt.total);
							ResetDocList(_idDocList, _tmpDoc, dt.docs);
						}, 
						"error": function (jqXHR, textStatus, errorThrown) {
							console.log(jqXHR.responseJSON);
						}
					});
				}
			});
			
			_doc.on('click', 'a.pro', function (e) {
				e.preventDefault();
				
				let t = $(this);
				
				if (t.hasClass('active') === false) {
					$.ajax({
						"type": "POST", 
						"dataType": "JSON", 
						"data": {
							"id": t.data('id'), 
							"src": _src
						}, 
						"url": "{{ route('documentation.search.docs') }}", 
						"headers": {
							"X-CSRF-TOKEN": "{{ csrf_token() }}"
						}, 
						"success": function(response, textStatus, jqXHR) {
							let dt = response.data;
							
							$('a.pro').removeClass('active');
							t.addClass('active');
							ResetResultInfo(_idResInfo, dt.start, dt.end, dt.total);
							ResetPagination(_idPaging, _tmpPg, dt.pages);
							ResetDocList(_idDocList, _tmpDoc, dt.docs);
						}, 
						"error": function (jqXHR, textStatus, errorThrown) {
							console.log(jqXHR.responseJSON);
						}
					});
				}
			});
			
			$('div.cat').on('click', function () {
				let t = $(this);
				
				if (t.hasClass('active') === false) {
					$.ajax({
						"type": "POST", 
						"dataType": "JSON", 
						"data": {
							"id": t.data('id'), 
							"src": _src
						}, 
						"url": "{{ route('documentation.search.products') }}", 
						"headers": {
							"X-CSRF-TOKEN": "{{ csrf_token() }}"
						}, 
						"success": function(response, textStatus, jqXHR) {
							$('div.cat').parent().find('ul').empty();
							
							$.each(response.data, function (idx, val) {
								t.parent().find('ul').append(CloneProduct(_tmpPro, val.id, val.name, val.total));
							});
							
							$('div.cat').removeClass('active');
							t.addClass('active').parent().find('a.pro').first().trigger('click');
						}, 
						"error": function (jqXHR, textStatus, errorThrown) {
							console.log(jqXHR.responseJSON);
						}
					});
				}
			});
			
			$('#get-all').on('click', function (e) {
				e.preventDefault();
				
				let t = $(this);
				
				$.ajax({
					"type": "POST", 
					"dataType": "JSON", 
					"data": {
						"id": 0, 
						"src": _src
					}, 
					"url": "{{ route('documentation.search.docs') }}", 
					"headers": {
						"X-CSRF-TOKEN": "{{ csrf_token() }}"
					}, 
					"success": function(response, textStatus, jqXHR) {
						let dt = response.data;
						
						$('a.pro').removeClass('active');
						$('div.collapse').removeClass('show');
						$('div.cat').addClass('collapsed').attr('aria-expanded', 'false');
						ResetResultInfo(_idResInfo, dt.start, dt.end, dt.total);
						ResetPagination(_idPaging, _tmpPg, dt.pages);
						ResetDocList(_idDocList, _tmpDoc, dt.docs);
					}, 
					"error": function (jqXHR, textStatus, errorThrown) {
						console.log(jqXHR.responseJSON);
					}
				});
			});
			
			$('.nav-item .txt-medium').on('click', function (e) {
				e.preventDefault();
				
				let t = $(this);
				
				$('.nav-item .txt-medium').removeClass('active');
				t.addClass('active');
			});
			
			$('#get-all').trigger('click');
		});
	</script>
@endpush