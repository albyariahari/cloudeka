@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
	<form action="{{ route('admin.use-cases.update', $content->id) }}" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">
		@csrf
        @method('PUT')
        <span class="form-button">
			<a href="{{ route('admin.use-cases.index') }}" class="btn btn-secondary pull-right">Back</a>
			<button type="submit" class="btn btn-success pull-right create">Update</button>
		</span>
        <select class="form-control" id="languages" style="width: 10%; margin-bottom: 20px;" name="language">
            @foreach ($languages as $item)
            <option value="{{ $item }}" {{ old('language', $lang) === $item ? 'selected' : '' }}>{{ strtoupper($item) }}</option>
            @endforeach
        </select>
        @include('layouts.session')
      	<!-- Default box -->
      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">General Info</h3>
			</div>
      		<div class="card-body">
				<div class="form-group row">
					{{ Form::label('client', 'Client', ['class' => 'col-sm-2 control-label']) }}
					<div class="col-sm-10">
						<select id="client" name="client" class="form-control select2" style="width: 100%;">
							<option selected value="0">Select Client</option>
							@foreach ($clients as $val)
								<option value="{{ $val->id }}" {{ $val->id === (int) old('client', $content->client_id) ? 'selected' : '' }}>{{ $val->name }}</option>
							@endforeach
						</select>
						<p class="help-block">Required</p>
						<span class="text-danger">{{ $errors->first('client') }}</span>
					</div>
				</div>
				<div class="form-group row">
					{{ Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) }}
					<div class="col-sm-10">
						{{ Form::textarea('description', old('description', $content->translate($lang)->description), ['class' => 'form-control', 'placeholder' => 'Description']) }}
						<p class="help-block">Required, Min. Length: 5 chars</p>
						<span class="text-danger">{{ $errors->first('description') }}</span>
					</div>
				</div>
      		</div>
      		<!-- /.card-body -->
      	</div>
      	<!-- /.box -->
	</form>
    <!-- /.card-body -->
<!-- /.box -->
@stop

@push('js')
<script type="text/javascript">
	$(function () {
		CKEDITOR.replace('description');
		
		$('select#languages').focus(function () {
			let prev_val = $(this).val();
		}).on('change', function () {
			let url = "{{ route('admin.use-cases.edit', $content->id) }}?lang=" + this.value;
			
			Swal.fire({
                "cancelButtonColor": "#d33", 
                "confirmButtonColor": "#3085d6", 
                "confirmButtonText": "Ya, Pindahkan!", 
                "icon": "warning", 
                "showCancelButton": true, 
                "text": "Mungkin ada perubahan yang belum di disimpan anda yakin?", 
                "title": "Apa anda yakin?"
			}).then(function (result) {
				result.value === true ? (window.location.href = url) : $(this).val(prev_val);
			});
		});
	});
</script>
@endpush