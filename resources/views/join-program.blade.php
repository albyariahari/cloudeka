@extends('app')

@section('meta')
	<meta name="description" content="{!! $metadata['meta_description'] !!}">
	<meta name="keywords" content="{!! $metadata['meta_keyword'] !!}">
	<title>{!! $metadata['meta_title'] !!} - Lintasarta Cloudeka</title>
@endsection

@push('styles')
	<link rel="stylesheet" href="{{ '/js/owl/assets/owl.carousel.min.css' }}" />
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
		
		.join--program--radio {
			display: inline !important;
			margin-bottom: 0;
			width: initial !important;
		}
    </style>
@endpush

@section('content')
    <!-- Banner -->
    <div class="container-fluid px-0">
        <div class="banner-title">
            <img src="{{ cloudekaBucketLocalUrl($banner->image_1) }}" class="w-100" alt="Join Program Banner" />
            <div class="icon-product icon-product--page">
				<img src="/imgs/contact-us.png" alt="Join Program Contact Us" class="img-fluid" />
			</div>
            <div class="text">
				<h2 class="light-color join--program--title" data-aos="fade-up" data-aos-duration="500">
					{!! $banner->title !!}
                </h2>
            </div>
        </div>
    </div>
    <!-- /Banner -->

    <!-- Join Program Title -->
    <section class="sections">
      <div class="container-fluid">
        <div class="row " data-aos="fade-up" data-aos-duration="500">
          <div class="col-12 col-lg-2 offset-lg-1 pb-4">
            <h2 class="subtitle dark-color">
              {!! $top->title !!}
            </h2>
          </div>
          <div class="col-12 col-lg-7">
            <h5 class="mb-2">{!! $top->subtitle !!}</h5>
            <div class="description dark-color" style="font-weight: 300;">
              {!! $top->description !!}
            </div>
			<div class="mb-3">{!! $form->title !!}</div>

              <form id="form">
                {{ Form::text('', '', ['id' => 'name', 'placeholder' => 'Name', 'data-aos' => 'fade-up', 'data-aos-duration' => 500]) }}
                {{ Form::text('', '', ['id' => 'email', 'placeholder' => 'Corporate Email', 'data-aos' => 'fade-up', 'data-aos-duration' => 500]) }}
                {{ Form::text('', '', ['id' => 'job_title', 'placeholder' => 'Job Title', 'data-aos' => 'fade-up', 'data-aos-duration' => 500]) }}
                {{ Form::text('', '', ['id' => 'job_function', 'placeholder' => 'Job Function', 'data-aos' => 'fade-up', 'data-aos-duration' => 500]) }}
                {{ Form::text('', '', ['id' => 'phone', 'placeholder' => 'Phone Number', 'data-aos' => 'fade-up', 'data-aos-duration' => 500]) }}
                <div class="join--program p-3" data-aos="fade-up" data-aos-duration="500">
                  <div class="mb-2">Choose Your Partnership Type</div>
                  <div class="join--program--checkbox--wrapper">
					@foreach ($partnershipTypes as $val)
						<div>
							<input type="radio" name="partnership_types" id="pt-{!! $val->code !!}" value="{!! $val->id !!}" class="join--program--radio"> 
							<label for="pt-{!! $val->code !!}">{!! $val->name !!}</label>
						</div>
					@endforeach
					</div>
				</div>
                <div class="join--program p-3 mt-1 mb-2" data-aos="fade-up" data-aos-duration="500" style="border-radius: 0px 0px 10px 10px">
                  <div class="mb-2">Cloudeka Solution Interest</div>
                  <div class="join--program--checkbox--wrapper">
					@foreach ($solutionInterests as $val)
						<div>
							<input type="checkbox" name="solution_interests" id="si-{!! $val->code !!}" value="{!! $val->id !!}" class="join--program--checkbox"> 
							<label for="si-{!! $val->code !!}">{!! $val->name !!}</label>
						</div>
					@endforeach
                  </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="500">
					{!! $form->subtitle !!}
                </div>
                <div class="mt-5" data-aos="fade-up" data-aos-duration="500" style="font-weight: 300;">
					<h5>Contract Statement</h5>
					<p style="font-weight: 300;">{!! $form->description !!}</p>
                </div>
                <div class="p-3 join--program" data-aos="fade-up" data-aos-duration="500">
                  <div>
                    <input type="checkbox" name="partnership" id="confirm" value=1 class="join--program--checkbox"> 
                    <label for="confirm" class="d-inline" style="font-weight: 300;">{!! json_decode($form->others)->confirm !!}</label>
                  </div>
                </div>
                <div class="p-3 join--program mt-1" data-aos="fade-up" data-aos-duration="500">
                  <div>
                    <input type="checkbox" name="partnership" id="agree" value=1 class="join--program--checkbox"> 
                    <label for="agree" style="font-weight: 300;">{!! json_decode($form->others)->agree !!}</label>
                  </div>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-duration="500">
					<button id="btn-send" class="btn text-white btn-gradient btn-rounded px-5 font-20 mx-auto mt-5" disabled>
						Submit
					</button>
                </div>
              </form>
          </div>
        </div>
      </section>
      <!-- Join Program Title -->

      @include('layouts.subscription')
      
    <!-- Modal -->
	<div class="modal fade modal-home" id="modal-join-program" tabindex="-1" aria-labelledby="contactFailedLabel" aria-hidden="true">
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
									<div id="modal-title" class="subtitle subtitle--center font-size-40">
										<!--- Modal Title --->
									</div>
									<h2 id="modal-message" class="font-size-20 dark-color text-center my-4">
										<!--- Modal Message --->
									</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- /Modal -->
@stop

@push('scripts')
    <script src="{{ '/js/owl/owl.carousel.min.js' }}"></script>
    <script>
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
    </script>
    <script>
		let confirm = $('#confirm'),
			agree = $('#agree'), 
			send = $('#btn-send'), 
			inputs = $('#form input'), 
			modal = $('#modal-join-program');
		
		confirm.on('change', function (e) {
			send.prop('disabled', !agree.is(':checked') || !confirm.is(':checked'));
		});
		
		agree.on('change', function (e) {
			send.prop('disabled', !agree.is(':checked') || !confirm.is(':checked'));
		});
		
		send.on('click', function (e) {
			e.preventDefault();
			inputs.prop('disabled', true);
			send.prop('disabled', true);
			
			let solutionInterests = [];
			
			$('input[name=solution_interests]:checked').each((idx, val) => solutionInterests.push(val.value));
			
			if (confirm.is(':checked') && agree.is(':checked')) {
				$.ajax({
					"url": "{!! route('join-program.send') !!}", 
					"type": "POST", 
					"dataType": "JSON", 
					"headers": {
						"X-CSRF-TOKEN": $('meta[name=csrf-token]').prop('content'), 
					}, 
					"data": {
						"name": $('#name').val(), 
						"email": $('#email').val(), 
						"job_title": $('#job_title').val(), 
						"job_function": $('#job_function').val(), 
						"phone": $('#phone').val(), 
						"partnership_types": $('input[name=partnership_types]:checked').val(), 
						"solution_interests": solutionInterests, 
						"confirm": $('#confirm:checked').val(), 
						"agree": $('#agree:checked').val(), 
					}, 
					"success": (data, textStatus, jqXHR) => {
						$('#form input[type=text]').val('');
						$('#form input[type=checkbox]').prop('checked', false);
						modal.find('#modal-title').empty().append(data.type);
						modal.find('#modal-message').empty().append(data.message);
					}, 
					"error": (jqXHR, textStatus, errorThrown) => {
						let response = jqXHR.responseJSON, 
							message = response.message;
						
						if (response.errors)
							Object.keys(response.errors).forEach(val => message += `<br>${response.errors[val][0]}`);
						
						modal.find('#modal-title').empty().append(response.type ?? 'Failed!');
						modal.find('#modal-message').empty().append(message);
					}, 
					"complete": (jqXHR, textStatus) => {
						modal.modal('show');
						inputs.prop('disabled', false);
						send.prop('disabled', !confirm.is(':checked') || !agree.is(':checked'));
					}, 
				});
			} else {
				inputs.prop('disabled', false);
				send.prop('disabled', true);
			}
		});
	</script>
@endpush