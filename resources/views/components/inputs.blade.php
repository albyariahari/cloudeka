<div class="form-group row">
	{{ Form::label($name, $label, ['class' => 'col-sm-2 control-label']) }}
	<div class="col-sm-10">
	@if ($type === 'date')
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text">
					<i class="far fa-calendar-alt"></i>
				</span>
			</div>
			{{ Form::text($name, old($name, $old), ['class' => 'form-control', 'placeholder' => $placeholder, 'disabled' => !is_null($disabled)]) }}
		</div>
	@elseif ($type === 'image' || $type === 'video')
		<div class="custom-file">
			{{ Form::file($name, ['class' => 'custom-file-input']) }}
			{{ Form::label($name, (empty($old) ? 'Choose file' : $old), ['class' => 'custom-file-label']) }}
		</div>
		<p></p>
		<div id="accordion" {!! empty($old) ? 'style="display: none;"' : '' !!}>
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">
						<a href="#img-collapse" class="collapsed" style="color: #000000;" data-parent="#accordion" data-toggle="collapse" aria-expanded="false">
							Show Content
						</a>
					</h4>
				</div>
				<div id="img-collapse" class="panel-collapse collapse">
					<div class="card-body" style="text-align: center;">
					@if ($type === 'image')
						<a id="img-url" href="{{ $old }}" target="_blank">
							<img id="img-display" src="{{ $old }}" style="max-width: 100%;" />
						</a>
					@else
						<video height="360" width="100%" controls>
							<source src="{{ $old }}" type="video/mp4">
							<source src="{{ $old }}" type="video/ogg">
							Your browser does not support the video tag.
						</video>
					@endif
					</div>
				</div>
			</div>
		</div>
	@elseif ($type === 'checkbox')
		@foreach ($values as $key => $val)
		<div class="form-check">
			{{ Form::checkbox($name, $val, (int) old($name, empty($old) || is_bool($old) || is_int($old) ? $old : ($old->find($val)->id ?? 0)) === $val, [
				'id' => "{$name}_{$val}", 
				'class' => 'form-check-input', 
				'disabled' => !is_null($disabled)
			]) }}
			{{ Form::label("{$name}_{$val}", $key) }}
		</div>
		@endforeach
	@elseif ($type === 'select')
		{{ Form::select($name, $values, old($name, $old), ['class' => 'form-control', 'disabled' => !is_null($disabled)]) }}
	@else
		{{ Form::{$type}($name, old($name, $old), ['class' => 'form-control', 'placeholder' => $placeholder, 'disabled' => !is_null($disabled)]) }}
	@endif
		<p class="help-block">{{ $note }}</p>
		<p class="text-danger">{{ $errors->first($name) }}</p>
	</div>
</div>