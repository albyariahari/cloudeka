@extends('app')

@section('meta')
<title>{!! $metadata['meta_title'] !!} - Lintasarta Cloudeka</title>
	<meta name="description" content="{!! $metadata['meta_description'] !!}">
	<meta name="keywords" content="{!! $metadata['meta_keyword'] !!}">
@endsection

@section('content')
	<!--- Banner --->
	<div class="container-fluid banner">
		<div id="bannerHome" class="carousel slide carousel-fade custom-rangga" >
			<div class="carousel-indicators">
			@foreach ($slideshows as $slideshow)
				<button 
				type="button" 
				class="{{ $loop->index > 1 ? 'active' : '' }}" 
				data-slide-to="{{ $loop->index }}" 
				data-target="#bannerHome" 
				aria-current="true" 
				aria-label="Slide 1"
				></button>
			@endforeach
			</div>
			
			<div class="carousel-inner">
			@foreach ($slideshows as $val)
				<div class="carousel-item {{$loop->index === 0 ? 'active':''}}">
					{{-- <!-- <img src="{{ cloudekaBucketLocalUrl($val->image) }}" class="d-block w-100" alt="Banner {{ $loop->index }}" width="100" height="300" /> --> --}}
					<picture>
						<source media="(min-width: 1024px)" srcset="{{ cloudekaBucketLocalUrl($val->image) }}">
						{{-- <!--- <source media="(max-width: 992px)" srcset="{{ cloudekaBucketLocalUrl(str_replace('uploads/', 'uploads/mobile/', $val->image)) }}"> ---> --}}
						<source media="(max-width: 992px)" srcset="{{ cloudekaBucketLocalUrl($val->image) }}">
						<img src="{{ cloudekaBucketLocalUrl($val->image) }}" alt="Banner {{ $loop->index }}" class="img-fluid d-block w-100" width="100" height="300" />
					</picture>
					<div class="carousel-caption">
						<div class="title-homepage-banner text-white">
							{!! $val->translate($lang)->title !!}
						</div>
					</div>
				</div>
			@endforeach
			</div>

			@if ($slideshows->count() > 1)
			<div class="button-wrapper">
				<a class="left carousel-control" href="#bannerHome" role="button" data-slide="prev">
					<span class="icon-prev" aria-hidden="true">
						<img src="/imgs/prevArrow.svg" class="img-fluid" alt="Banner Prev" width="69" height="69" />
					</span>
					<span class="sr-only">
						Previous
					</span>
				</a>
				<a class="right carousel-control" href="#bannerHome" role="button" data-slide="next">
					<span class="icon-next" aria-hidden="true">
						<img src="/imgs/nextArrow.svg" class="img-fluid" alt="Banner Next" width="69" height="69" />
					</span>
					<span class="sr-only">
						Next
					</span>
				</a>
			</div>
			@endif
		</div>
	</div>
	<!--- /Banner --->

	<!--- Top 1 --->
	<section class="sections">
		<div class="container-fluid">
			<div class="row" data-aos="fade-up" data-aos-duration="500">
				<div class="col-12 col-lg-3 offset-lg-1 pb-4">
					<h2 class="subtitle dark-color">
						{!! $top1->title !!}
					</h2>
				</div>
				<div class="col-12 col-lg-7">
					<div class="description dark-color">
						{!! $top1->description !!}.
					</div>
				</div>
			</div>
			<div class="row" data-aos="fade-up" data-aos-duration="500">
				<div class="col-12 col-lg-3 offset-lg-1 pb-4">
					<h2 class="subtitle dark-color">
						{!! $top2->title !!}
					</h2>
				</div>
				<div class="col-12 col-lg-7">
					<div class="description dark-color">
						{!! $top2->description !!}.
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--- /Top 1 --->

	<!--- Middle --->
	<section class="sections bg-pattern" id="requirement">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-lg-3 offset-lg-1 pb-4 d-flex align-items-end d-lg-block mb-4" data-aos="fade-up" data-aos-duration="500">
					<h2 class="subtitle light-color mb-0">
						{!! $middle->title !!}
					</h2>
				</div>
				<div class="col-12 col-lg-7">
					<div class="row" data-aos="fade-up" data-aos-duration="500">
					@foreach ($becomePartners as $val)
						<div class="col-12 col-lg-6">
							<div class="card mb-5 requirement--card">
								<div class="card-body">
									<img 
										src="{{ cloudekaBucketLocalUrl($val->translate($lang)->image_1) }}" 
										alt="{!! $val->translate($lang)->title !!} Image" 
										width="66" 
										height="66" 
										class="mb-3" 
									/>
									<h5 class="requirement--card--title mb-3">
										{!! $val->translate($lang)->title !!}
									</h5>
									{!! $val->translate($lang)->description !!}
								</div>
							</div>
						</div>
					@endforeach
					</div>
					<div class="row">
						<div class="col">
							<a href="{!! $middle->link_url_1 !!}" class="btn requirement--card--btn">
								{!! $middle->link_title_1 !!}
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
  <!--- /Middle --->

	<!--- Tables --->
	<div id="app">
		<!--- The Partner Program --->
		<section class="sections">
			<div class="container-fluid">
				<div class="row" data-aos="fade-up" data-aos-duration="500">
					<div class="col-12 col-lg-3 offset-lg-1 pb-4">
						<h2 class="subtitle dark-color">
							{!! $table1['main']->title !!}
						</h2>
					</div>
					<div class="col-12 col-lg-7">
						<!--- <become-partner-table></become-partner-table> --->
						<div>
							<div class="partner--program--btn--wrapper">
							@if ($table1['reseller']['columns'] && $table1['reseller']['columns']->count() && $table1['reseller']['rows']->count())
								<button id="reseller-tier" class="btn table1-btn btn-gradient text-white">
									Reseller Tier
								</button>
							@endif
							
							@if ($table1['wholesales']['columns']->count() && $table1['wholesales']['rows']->count())
								<button id="wholesales-tier" class="btn table1-btn btn-grey-light">
									Wholesales Tier
								</button>
							@endif
							</div>
							
							@if ($table1['reseller']['columns']->count() && $table1['reseller']['rows']->count())
							<div id="table-reseller-tier" class="mt-4 table-program">
								<h5>{!! $table1['reseller']['content']->title !!}</h5>
								{!! $table1['reseller']['content']->description !!}
								<div class="table-responsive mt-4">
									<table class="table partner--table">
										<thead class="partner--table--head">
											<tr>
											@foreach ($table1['reseller']['columns'] as $val)
												<td>{!! $val->title !!}</td>
											@endforeach
											</tr>
										</thead>
										<tbody>
										@foreach ($table1['reseller']['rows'] as $row)
											<tr>
											@foreach ($table1['reseller']['columns'] as $col)
												<td>{!! $row->columns->find($col->id)->pivot->description ? nl2br(e($row->columns->find($col->id)->pivot->description)) : '&nbsp;' !!}</td>
											@endforeach
											</tr>
										@endforeach
										</tbody>
									</table>
								</div>
								<div class="terms--condition--description mt-3">
									<h6>{!! $table1['reseller']['tnc']->title !!}</h6>
									{!! $table1['reseller']['tnc']->description !!}
								</div>
							</div>
							@endif
							
							@if ($table1['wholesales']['columns'] && $table1['wholesales']['columns']->count() && $table1['wholesales']['rows']->count())
							<div id="table-wholesales-tier" class="mt-4 table-program" style="display: none;">
								<h5>{!! $table1['wholesales']['content']->title !!}</h5>
								{!! $table1['wholesales']['content']->description !!}
								<div class="table-responsive mt-4">
									<table class="table partner--table">
										<thead class="partner--table--head">
											<tr>
											@foreach ($table1['wholesales']['columns'] as $val)
												<td>{!! $val->title !!}</td>
											@endforeach
											</tr>
										</thead>
										<tbody>
										@foreach ($table1['wholesales']['rows'] as $row)
											<tr>
											@foreach ($table1['wholesales']['columns'] as $col)
												@php
													\Log::debug(json_encode($row));
													\Log::debug(json_encode($col));
													\Log::debug(json_encode($row->columns->find($col->id)));
													\Log::debug(json_encode($row->columns->where('column_id', $col->id)->first()));
												@endphp
												<td>{!! $row->columns->find($col->id)->pivot->description ? nl2br(e($row->columns->find($col->id)->pivot->description)) : '&nbsp;' !!}</td>
											@endforeach
											</tr>
										@endforeach
										</tbody>
									</table>
								</div>
								<div class="terms--condition--description mt-3">
									<h6>{!! $table1['wholesales']['tnc']->title !!}</h6>
									{!! $table1['wholesales']['tnc']->description !!}
								</div>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--- /The Partner Program --->
		
		<!--- Benefit Tier Upgrade --->
		<section class="sections bg-pattern" id="requirement">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-lg-3 offset-lg-1 pb-4 d-flex align-items-end d-lg-block mb-4" data-aos="fade-up" data-aos-duration="500">
						<h2 class="subtitle light-color mb-0">
							{!! $table2['main']->title !!}
						</h2>
					</div>
					<div class="col-12 col-lg-7">
						{{-- <!--- <benefit-tier-table></benefit-tier-table> ---> --}}
						<div>
							<div class="partner--program--btn--wrapper">
							@foreach ($types as $type)
								<button class="btn table2-btn {!! $loop->index < 1 ? 'btn-gradient text-white' : 'btn-grey-light' !!}" id="{!! $type->code !!}">
									{!! $type->name !!}
								</button>
							@endforeach
							</div>
							<div class="mt-5 text-white">
								@foreach ($types as $type)
								<div id="table-{!! $type->code !!}" class="table-benefit" style="{!! $loop->index < 1 ? '' : 'display: none;' !!}">
									@if ($type->categories->count())
									<div class="table-responsive">
										<table class="table partner--table">
											<thead class="partner--table--head">
												<tr>
													<td></td>
													
													@foreach ($levels as $level)
														@if ($level->is_active)
															<td>{!! $level->name !!}</td>
														@endif
													@endforeach
												</tr>
											</thead>
											<tbody>
											@foreach ($type->categories as $category)
												@if ($category->is_active && $category->upgrades->count())
													<tr>
														<td class="font-weight-bold" colspan="{!! $levels->count() + 1 !!}">
															{!! $category->name !!}
														</td>
													</tr>
													
													@foreach ($category->upgrades as $upgrade)
														@if ($upgrade->is_active)
														<tr>
															<td>
																{!! $upgrade->name !!}

																@if (!empty($upgrade->hint))
																	<i class="fa fa-info-circle popover-icon" data-trigger="hover" data-toggle="popover" data-content="{{ $upgrade->hint }}" style="color:#848484"></i>
																@endif
															</td>
															@foreach ($levels as $level)
																@if ($level->is_active)
																	<td>
																	@if ($upgrade->levels->find($level->id))
																		<i class="fa fas fa-check"></i>
																	@endif
																	</td>
																@endif
															@endforeach
														</tr>
														@endif
													@endforeach
												@endif
											@endforeach
											</tbody>
										</table>
									</div>
									<div class="mt-4">
										<h6>{!! $table2[$loop->index < 1 ? 'reseller' : 'wholesales']['tnc']->title !!}</h6>
										{!! $table2[$loop->index < 1 ? 'reseller' : 'wholesales']['tnc']->description !!}
									</div>
									@endif
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--- /Benefit Tier Upgrade --->
	</div>
	<!--- Tables --->

	<!--- Bottom --->
	<section class="sections">
		<div class="container-fluid">
			<div class="row justify-content-center" data-aos="fade-up" data-aos-duration="500">
				<div class="col-12 col-lg-10">
					<div class="card text-white bg-solutions become--partner--card">
						<img src="{!! cloudekaBucketLocalUrl($bottom->image_1) !!}">
						<div class="card-body">
							<div class="become--partner--card--wrapper">
								<h2 class="mb-3">
									{!! $bottom->title !!}
								</h2>
								{!! $bottom->description !!}
								<a href="{!! $bottom->link_url_1 !!}" class="btn become--partner--btn--alternative mb-2">
									{!! $bottom->link_title_1 !!}
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--- /Bottom --->

	@include('layouts.subscription')
@stop

@push('scripts')
	<!-- <script src="/js/app.js"></script> -->
	<script>
		$('.popover-icon').popover();
		$('.table1-btn').on('click', function () {
			let t = $(this), 
				id = t.prop('id');
			console.log(id);
			$('.table1-btn').removeClass('btn-gradient text-white').addClass('btn-grey-light');
			t.removeClass('btn-grey-light').addClass('btn-gradient text-white');
			$('.table-program').hide();
			$(`#table-${id}`).show();
		});
		
		$('.table2-btn').on('click', function () {
			let t = $(this), 
				id = t.prop('id');
			
			$('.table2-btn').removeClass('btn-gradient text-white').addClass('btn-grey-light');
			t.removeClass('btn-grey-light').addClass('btn-gradient text-white');
			$('.table-benefit').hide();
			$(`#table-${id}`).show();
		});

		let minHeight = 0;
		$('.requirement--card').each(function(){
			if($(this).height() > minHeight)
				minHeight = $(this).height();
		});
		$('.requirement--card').height(minHeight);


	</script>
@endpush