@extends('layouts.title')

@section('content')
	<x-form :action="route('admin.faq.category.update', [$data->id])" type="edit" :back="route('admin.faq.category.index')">
      	<x-general-info>
			<x-inputs name="title" note="Required, Max. Length: 255, Unique" :old="$data->title" />
		</x-general-info>
	</x-form>
@stop