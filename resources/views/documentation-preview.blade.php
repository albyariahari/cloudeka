@extends('app')

@section('meta')
	<title>Documentation Detail - Lintasarta Cloudeka</title>
@endsection

@push('styles')
<link rel="stylesheet" href="/vendor/editor.md/css/editormd.min.css" />
<style>
	.d-submenu__header::before {
		background-color: transparent !important;
	}
	.d-submenu__header h1 { font-size: 28px; }
	.main-content__wrapper .title h1 {
		font-size: 32px;
	}
	.feedback h2 {
		font-size: 18px;
	}
	.feedback .rate {
		padding: 20px !important;
	}
	[class^=feedback-], [class*=feedback-] {
		font-size: 24px !important;
	}
</style>
@endpush

@section('content')
	<!-- Note Template -->
	<template id="tmp-note">
		<div class="alert alert-success alert--custom" role="alert">
			<h1 class="font-size-20 txt-dark txt-bold">
				<p class="font-size-18 txt-medium txt-dark"></p>
			</h1>
		</div>
	</template>
	<!-- /Note Template -->
	
	<!-- Search Section -->
    <section class="document-detail__search">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 col-lg-2 d-flex align-items-center">
                    <h1 class="text-white pb-4 pb-sm-0 font-size-26">
                        Document Center
                    </h1>
                </div>
                <div class="col-sm-8 col-lg-4 search-wrapper">
                    <form id="form-search" action="{{ route('documentation.search') }}" method="get" class="search__wrapper">
                        <i class="icon-search mr-0"></i>
						{{ Form::text('qry', '', ['class' => 'custom-search', 'Placeholder' => 'Search by Keyword']) }}
                    </form>
                </div>
            </div>
        </div>
    </section>
	<!-- /Search Section -->
	
	<!-- Side Title -->
    <div class="document-detail__breadcrumb">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="#" class="font-size-20 txt-bold">Documentation</a>
							</li>
							<li class="breadcrumb-item active font-size-20 txt-bold" aria-current="page">
								{!! $parent->product->translate($lang)->title !!} / {!! $parent->translate($lang)->name !!}
							</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
	<!-- /Side Title -->
	
	<!-- Main Section -->
    <section class="document-detail__content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 d-submenu">
					<!-- Main Title -->
                    <div class="d-submenu__header">
                        <h1 class="font-size-35 txt-bold txt-primary" style="min-width: 100% !important;">
                            {!! $parent->product->translate($lang)->title !!}
                        </h1>
                        <h4 class="font-size-22 txt-medium txt-dark">
                            {!! $parent->translate($lang)->name !!}
                        </h4>
                    </div>
					<!-- /Main Title -->
					
					<!-- Table of Contents -->
                    <div class="d-submenu__body pt-0">
                        <ul class="list-menu">
						@if ($parent->childs->count())
							@foreach ($parent->childs as $child)
                            <li class="menu-{{ $child->id }} font-size-18">
                                <a href="{{ documentationPreviewUrl(array($parent->id,$parent->name), array($child->id,$child->title)) }}" class="txt-dark txt-medium">
                                    @if ($child->childs->count())
                                        <i class="fas fa-caret-right"></i>
                                    @endif

                                    {!! $child->translate($lang)->title !!}
                                </a>
								@if ($child->childs->count())
                                <ul>
									@foreach ($child->childs as $grandchild)
                                    <li id="sub-{{ $grandchild->id }}">
										<a href="{{ documentationPreviewUrl(array($parent->id,$parent->name), array($child->id,$child->title), array($grandchild->id,$grandchild->title)) }}" class="txt-dark txt-medium">{!! $grandchild->translate($lang)->title !!}</a>
                                    </li>
									@endforeach
                                </ul>
								@endif
                            </li>
							@endforeach
						@endif
                        </ul>
                    </div>
					<!-- /Table of Contents -->
                </div>
				
				<!-- Main Content -->
                <div class="col-lg-9 sections main-content">
                    <div class="main-content__wrapper">

						@if($view == "parent")
							<!-- Title -->
							<div class="title">
								<h1 class="txt-dark font-size-40 txt-bold">
									{!! $parent->translate($lang)->title !!}
								</h1>
							</div>
							<!-- /Title -->
							
							@if ($parent->translate($lang)->file)
							<!-- PDF Download -->
							<div class="download">
								<a href="{{ $parent->translate($lang)->file }}" target="_blank">
									<i class="icon-pdf">
										<span class="path2"></span>
									</i>
									<span>PDF Version</span>
								</a>
							</div>
							<!-- PDF Download -->
							@endif
							
							<!-- Description -->
							<div class="description txt-medium" id="description">
								<textarea style="display:none;" name="test-editormd-markdown-doc">{{ $parent->translate($lang)->description }}</textarea>
							</div>
							<!-- /Description -->
						@endif
						@if($view == "child")
							<!-- Title -->
							<div class="title">
								<h1 class="txt-dark font-size-40 txt-bold">
									{!! $children->translate($lang)->title !!}
								</h1>
							</div>
							<!-- /Title -->
							
							@if ($children->translate($lang)->file)
							<!-- PDF Download -->
							<div class="download">
								<a href="{{ $children->translate($lang)->file }}" target="_blank">
									<i class="icon-pdf">
										<span class="path2"></span>
									</i>
									<span>PDF Version</span>
								</a>
							</div>
							<!-- PDF Download -->
							@endif
							
							<!-- Description -->
							<div class="description txt-medium" id="description">
								<textarea style="display:none;" name="test-editormd-markdown-doc">{{ $children->translate($lang)->description }}</textarea>
							</div>
							<!-- /Description -->
						@endif
						@if($view == "grandchild")
							<!-- Title -->
							<div class="title">
								<h1 class="txt-dark font-size-40 txt-bold">
									{!! $grandchildata->translate($lang)->title !!}
								</h1>
							</div>
							<!-- /Title -->
							
							@if ($grandchildata->translate($lang)->file)
							<!-- PDF Download -->
							<div class="download">
								<a href="{{ $grandchildata->translate($lang)->file }}" target="_blank">
									<i class="icon-pdf">
										<span class="path2"></span>
									</i>
									<span>PDF Version</span>
								</a>
							</div>
							<!-- PDF Download -->
							@endif
							
							<!-- Description -->
							<div class="description txt-medium" id="description">
								<textarea style="display:none;" name="test-editormd-markdown-doc">{{ $grandchildata->translate($lang)->description }}</textarea>
							</div>
							<!-- /Description -->
						@endif


						<div class="feedback">
							<h2>How Helpful Was This Page?</h2>
							<form action="#" id="sendFeedback">
								<input type="hidden" name="documentation_id" value="{{ $documentation_id }}">
								<div class="rate">
									<label class="form-inline">
										<input type="radio" name="star" value="1">
										<i class="feedback-1"></i>
									</label>
									<label class="form-inline">
										<input type="radio" name="star" value="2">
										<i class="feedback-2"></i>
									</label>
									<label class="form-inline">
										<input type="radio" name="star" value="3" >
										<i class="feedback-3"></i>
									</label>
									<label class="form-inline">
										<input type="radio" name="star" value="4" >
										<i class="feedback-4"></i>
									</label>
									<label class="form-inline">
										<input type="radio" name="star" value="5" >
										<i class="feedback-5"></i>
									</label>
								</div>
								<div class="form-feedback">
								
									<h4>What might be the problem?</h4>
									<label class="form-group">
										<input type="radio" name="problems" value="Inaccurate or outdated information">
										<i></i>
										<span>Inaccurate or outdated information</span>
									</label>
									
									<label class="form-group">
										<input type="radio" name="problems" value="Missing details">
										<i></i>
										<span>Missing details</span>
									</label>
									
									<label class="form-group">
										<input type="radio" name="problems" value="Hard to read and follow">
										<i></i>
										<span>Hard to read and follow</span>
									</label>
									
									<label class="form-group">
										<input type="radio" name="problems" value="No code samples (or the code sample don't work)">
										<i></i>
										<span>No code samples (or the code sample don't work)</span>
									</label>
									
									<label class="form-group">
										<input type="radio" name="problems" value="Bad illustrations">
										<i></i>
										<span>Bad illustrations</span>
									</label>
									
									<label class="form-group">
										<input type="radio" name="problems" value="This is not what I am looking for">
										<i></i>
										<span>This is not what I am looking for</span>
									</label>
									
									<!--- <label class="form-group">
										<input type="radio" name="problems" value="This documentation has little to no problem">
										<i></i>
										<span>This documentation has little to no problem</span>
									</label> --->


									<h4 class="mt-5 mb-3">More suggestion?</h4>
									<textarea name="notes" placeholder="Any other feedback? 1000 characters" cols="30" rows="3" style="height: 120px"></textarea>

									<h4 class="mt-5 mb-3">Let our team assist you more further</h4>
									<input type="text" name="name" placeholder="Name" class="form-control mb-3">
									<input type="text" name="company" placeholder="Company" class="form-control mb-3">
									<input type="text" name="phone" placeholder="Phone" class="form-control mb-3">
									<input type="text" name="email" placeholder="Email" class="form-control mb-3">

									<div class="d-flex justify-content-end">
										<button class="btn btn-primary btn-rounded btn-gradient px-4" type="submit">Send Feedback</button>
									</div>
								</div>
							</form>
						</div>
						
                    </div>
                </div>
				<!-- /Main Content -->
            </div>
        </div>
    </section>
	<!-- /Main Section -->

    @include('layouts.subscription')

	<!-- Modal Sukses -->
	<div class="modal fade modal-home" id="feedbackSuccess" tabindex="-1" aria-labelledby="subscribeSuccessLabel" aria-hidden="true">
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
										Thank You
									</div>
									<h2 class="font-size-20 dark-color text-center my-4">
										Your Feedback<br>
										has been received.
									</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Gagal -->
<div class="modal fade modal-home" id="feedbackFailed" tabindex="-1" aria-labelledby="subscribeSuccessLabel" aria-hidden="true">
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
                            <div class="wrapper text-center">
                                <div class="subtitle subtitle--center font-size-40">
									Can't send feedback! 
                                </div>
                                <h2 class="font-size-20 dark-color text-center my-4" id="feedbackErrorMessages">

                                </h2>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary btn-rounded btn-gradient description mt-4" style="width:150px;">
                                      Try Again
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
	<script src="/vendor/editor.md/editormd.min.js"></script>
	<script src="/vendor/editor.md/lib/marked.min.js"></script>
	<script src="/vendor/editor.md/lib/prettify.min.js"></script>
	
	<script src="/vendor/editor.md/lib/raphael.min.js"></script>
	<script src="/vendor/editor.md/lib/underscore.min.js"></script>
	<script src="/vendor/editor.md/lib/sequence-diagram.min.js"></script>
	<script src="/vendor/editor.md/lib/flowchart.min.js"></script>
	<script src="/vendor/editor.md/lib/jquery.flowchart.min.js"></script>
    <script>
		function CloneBasic(templateID) {
			return $($(`#${templateID}`).clone().html());
		}
		
		function CloneNote(templateID, title, description) {
			return CloneBasic(templateID).find('h1').append(title).end()
										 .find('p').append(description);
		}

		(function($, window) {
			var adjustAnchor = function() {
				var $anchor = $(':target'),
					fixedElementHeight = 100;

				if ($anchor.length > 0) {
					window.scrollTo(0, $anchor.offset().top - fixedElementHeight);
				}
			};
			$(window).on('hashchange load', function() {
				adjustAnchor();
			});
		})(jQuery, window);
        
		$(document).ready(function () {


			editormd.markdownToHTML("description", {
				htmlDecode      : "style,script,iframe", 
				tocm            : true,
				emoji           : true,
				taskList        : true,
				tex             : true,  
				flowChart       : true,  
				sequenceDiagram : true,  
			});

			
			const _doc = $(this), 
				  _tmpNote = 'tmp-note', 
				  _ntTtl = _doc.find('input[name=note-title]'), 
				  _ntDsc = _doc.find('input[name=note-description]');
				
			if ($(window).width() >= 992) {
				let theLoc = 150, 
					links = $('.d-submenu'), 
					content = $('.main-content');
						
				$(window).scroll(function () {
					if (theLoc >= $(window).scrollTop()) {
						if (links.hasClass('fixed')) {
							links.removeClass('fixed');
							content.removeClass('fixed');
						}
					} else {
						if (!links.hasClass('fixed')) {
							links.addClass('fixed');
							content.addClass('fixed');
						}
					}
				});
			}
			
			$.each(_ntDsc, function (idx, val) {
				let title = _ntTtl.eq(a), 
					desc = val, 
					note = CloneNote(_tmpNote, title.val(), desc.val());
				
				title.remove();
				desc.after(note).remove();
			})
			
			$('.main-content').find('img').css('max-width', '100%');

			$('.form-inline').click(function(){
				$('.form-feedback').show();
			});
		});
		
		$('#sendFeedback').submit(function(e){
			e.preventDefault();

			let formData = new FormData(this);

			$.ajax({
				"type": "POST", 
				"dataType": "JSON", 
				"url": "{{ route('api.feedback.store') }}", 
				"data": {
					"documentation_id" : formData.get("documentation_id"),
					"rate" : formData.get("star"),
					"problems" : formData.get("problems"),
					"notes" : formData.get("notes"),
					"name" : formData.get("name"),
					"company" : formData.get("company"),
					"phone" : formData.get("phone"),
					"email" : formData.get("email")
				}, 
				"headers": {
					"X-CSRF-TOKEN": "{{ csrf_token() }}"
				}, 
				"success": function(response, textStatus, jqXHR) {
					// alert(response.message);
					$('#feedbackSuccess').modal('show');

					$('#sendFeedback')[0].reset();
					$('.form-feedback').hide();

				}, "error": function(jqXHR, textStatus, errorThrown) {
					let err = jqXHR.responseJSON;

					let feedbackErrorMessages = $("#feedbackErrorMessages");
					feedbackErrorMessages.empty();
					$.each(err.message, function(i, errorMessage){
						feedbackErrorMessages.append(errorMessage + '<br>');
					});   

					$('#feedbackFailed').modal('show')
					// err.errors ? alert(err.errors.email[0]) : alert(err.message);
				}
			});

		});
    </script>
@endpush