@props([
	'action'
	, 'back'
	, 'type' => 'create'
])

<form id="form" method="POST" action="{{ $type === 'show' ? '' : $action }}" enctype="multipart/form-data" class="form-horizontal">
	@csrf
	
	@if ($type === 'edit')
		@method('PUT')
	@endif
	
	<x-buttons :type="$type" :back="$back" />
	
	@include('layouts.session')
	
	{{ $slot }}
</form>