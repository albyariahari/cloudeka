@extends('layouts.title')

@section('content')
	<x-form :back="$back" type="show">
      	<x-general-info>
			<x-inputs name="name" :old="$data->name" disabled="1" />
			<x-inputs name="email" :old="$data->email" disabled="1" />
			<x-inputs name="job_title" :old="$data->job_title" disabled="1" />
			<x-inputs name="job_function" :old="$data->job_function" disabled="1" type="textarea" />
			<x-inputs name="phone" :old="$data->phone" disabled="1" />
			<x-inputs name="partnership_types" :old="$data->partnership_type_names" disabled="1" />
			<x-inputs name="solution_interests" :old="$data->solution_interest_names" disabled="1" />
			<x-inputs name="sent_at" :old="$data->sent_at" disabled="1" />
		</x-general-info>
	</x-form>
@stop