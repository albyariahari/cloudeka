@extends('layouts.title')

@section('content')
	<x-form :action="$save" :back="$back">
      	<x-general-info>
			<x-inputs name="name" note="Required, Unique, Min. Length: 3 chars, Max. Length: 50 chars" />
			<x-inputs name="code" note="Required, Unique, Min. Length: 3 chars, Max. Length: 50 chars" />
			<x-inputs name="is_active" type="checkbox" :values="['&nbsp;' => 1]" />
		</x-general-info>
	</x-form>
@stop