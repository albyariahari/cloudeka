

<div data-sortable-id="{{ $content->id }}" class="list-group-item nested-1">
	{!! $content->translate($lang)->title !!}

	@if ($content->childsRec->count())
	<div class="list-group nested-sortable mt-3">
		@foreach ($content->childsRec as $child)
			@include('admin.documentations.subsectionsort', ['content' => $child])
		@endforeach
	</div>
	@else
	<div class="list-group nested-sortable mt-3">
	</div>
	@endif

</div>