@extends('layouts.title')

@section('content')
	<x-form :back="$back" type="show">
      	<x-general-info>
			<x-inputs name="name" :old="$data->name" disabled="1" />
			<x-inputs name="code" :old="$data->code" disabled="1" />
			<x-inputs name="status" :old="$data->is_active ? 'Active' : 'Inactive'" disabled="1" />
			<x-inputs name="Type" :old="$data->typeName" disabled="1" />
		</x-general-info>
	</x-form>
@stop