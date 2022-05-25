@props([
	'type' => 'create'
	, 'languages' => []
	, 'lang' => ''
])

<div id="translatables" class="card card-default">
	@if ($type === 'create')
	<div class="card-header with-border">
		<h3 class="card-title">Translatable Fields</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
		</div>
	</div>
	<div class="card-body">
		{{ $slot }}
	</div>
	@else
	<div class="card-header d-flex p-0 with-border">
		<h3 class="card-title p-3">Translatable Fields</h3>
		<ul class="nav nav-pills ml-auto p-2">
			<li class="nav-item dropdown">
				<a id="lang-selected" href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ strtoupper($lang) }} <span class="caret"></span></a>
				<div id="languages" class="dropdown-menu" style="position: absolute; transform: translate3d(-5px, 40px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start">
					@foreach ($languages as $val)
					<a href="#" class="dropdown-item" tabindex="-1" data-value="{{ $val }}">{{ strtoupper($val) }}</a>
					@endforeach
				</div>
			</li>
			<div class="card-tools p-2">
				<button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				</button>
			</div>
		</ul>
	</div>
	<div class="card-body">
		{{ Form::hidden('lang', $lang, ['id' => 'lang']) }}
		{{ $slot }}
	</div>
	<div class="overlay dark" style="display: none;">
		<i class="fas fa-2x fa-sync-alt fa-spin"></i>
	</div>
	@endif
</div>