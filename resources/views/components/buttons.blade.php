@props([
	'back'
	, 'type' => 'create'
])

<span class="form-button">
	<a href="{{ $back }}" class="btn btn-secondary pull-right">Back</a>
	
	@if ($type !== 'show')
		{{ Form::submit(($type === 'create' ? 'Create' : 'Update'), ['class' => 'btn btn-success pull-right']) }}
	@endif
</span>