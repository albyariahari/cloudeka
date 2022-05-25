@extends('layouts.title')

@section('content')
	<x-form :action="route('admin.slider.item.store', [$sliderID])" :back="route('admin.slider.item.index', [$sliderID])">
      	<x-general-info>
		@if ($sliderID == 4)
			<x-inputs name="image" type="image" note="Required, Allowed Types: .jpeg, .jpg, .png, Recommended File Size: 500kb, Recommended Dimension: 1290 x 560" />
		@else
			<x-inputs name="image" type="image" note="Required, Allowed Types: .jpeg, .jpg, .png, Recommended File Size: 500kb" />
		@endif
			<x-inputs name="video" type="video" note="Required, Allowed Types: .3gp, .avi, .flv, .mkv, .mov, .mp4, .mpeg, .ogg, .webm, .wmv, .ts, Recommended File Size: 100Mb" />
		</x-general-info>
		
      	<x-translatable-fields>
			@if ($settings['field_title'] === 1)
			<x-inputs name="title" note="Required, Min. Length: 5 chars, Max. Length: 255 chars" />
			@endif
			
			@if ($settings['field_subtitle'] === 1)
			<x-inputs name="subtitle" note="Required, Min. Length: 5 chars, Max. Length: 255 chars" />
			@endif
			
			@if ($settings['field_description'] === 1)
			<x-inputs name="description" type="textarea" />
			@endif
			
			@if ($settings['field_cta'] === 1)
			<x-inputs name="cta_label" label="Button Name" note="Required, Min. Length: 5 chars, Max. Length: 255 chars" />
			<x-inputs name="cta" label="Button Action Target" note="Required, Full Path" />
			@endif
		</x-translatable-fields>
	</x-form>
@stop

@push('js')
<script>
	if ($('#description').length)
		CKEDITOR.replace('description');
	
	$('input#image').on('change',function () {
		let t = $(this);
		
		t.next('.custom-file-label').empty().append(t.val());
	})
</script>
@endpush