@extends('layouts.title')

@section('content')
	<x-form :action="route('admin.faq.store', [$slug])" :back="route('admin.faq.index', [$slug])">
      	<x-translatable-fields>
			<x-inputs name="title" note="Required, Min. Length: 5 chars, Max. Length: 255 chars" />
			<x-inputs name="name" note="Required, Min. Length: 5 chars, Max. Length: 255 chars" />
		</x-translatable-fields>
	</x-form>
@stop