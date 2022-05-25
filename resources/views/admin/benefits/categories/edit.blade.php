@extends('layouts.title')

@section('content')
	<x-form :action="$save" :back="$back" type="edit">
      	<x-general-info>
			<x-inputs name="name" :old="$data->name" note="Required, Unique, Min. Length: 3 chars, Max. Length: 50 chars" />
			<x-inputs name="code" :old="$data->code" note="Min. Length: 3 chars, Max. Length: 50 chars" />
			<x-inputs name="is_active" type="checkbox" :old="$data->is_active" :values="['&nbsp;' => 1]" />
			{!! Form::hidden('type_id', $data->type_id) !!}
		</x-general-info>
	</x-form>
@stop