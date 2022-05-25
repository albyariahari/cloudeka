@extends('layouts.title')

@section('content')
	<x-form :action="route('admin.faq.category.store')" :back="route('admin.faq.category.index')">
      	<x-general-info>
			<x-inputs name="title" note="Required, Max. Length: 255, Unique" />
		</x-general-info>
	</x-form>
@stop