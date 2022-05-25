@extends('layouts.title')

@section('content')
	<x-form :action="route('admin.faq.item.store', [$slug, $faqID])" :back="route('admin.faq.item.index', [$slug, $faqID])">
      	<x-translatable-fields>
			<x-inputs name="title" note="Required, Unique, Min. Length: 5 chars, Max. Length: 255 chars" />
			<x-inputs name="slug" note="Unique, Min. Length: 5 chars, Max. Length: 255 chars, Format: [alphanumeric(s)]-[alphanumeric(s)]" />
			<x-inputs name="description" type="textarea" note="Required, Min. Length: 10 chars" />
		</x-translatable-fields>
	</x-form>
@stop

@push('js')
<script>
	$(document).ready(function () {
		CKEDITOR.replace('description', {
			filebrowserUploadMethod : 'form',
			filebrowserUploadUrl: "{{ route('admin.documentations.ajax.upload', ['_token' => csrf_token() ]) }}"
		});
	});
</script>
@endpush