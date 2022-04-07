@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
	<form action="{{ route('admin.clients.update', $content->id) }}" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">
		@csrf
        @method('PUT')
        <span class="form-button">
			<a href="{{ route('admin.clients.index') }}" class="btn btn-secondary pull-right">Back</a>
			<button type="submit" class="btn btn-success pull-right create">Update</button>
		</span>
        @include('layouts.session')
      	<!-- Default box -->
      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">General Info</h3>
			</div>
      		<div class="card-body">
				<div class="form-group row">
					{{ Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) }}
					<div class="col-sm-10">
						{{ Form::text('name', old('name', $content->name), ['class' => 'form-control', 'placeholder' => 'Name']) }}
						<p class="help-block">Required, Unique, Min. Length: 3 chars, Max. Length: 45 chars</p>
						<span class="text-danger">{{ $errors->first('name') }}</span>
					</div>
				</div>
				<div class="form-group row">
					{{ Form::label('logo', 'Logo', ['class' => 'col-sm-2 control-label']) }}
					<div class="col-sm-10">
						{{ Form::file('logo') }}
						<p class="help-block">Required, Recommended Dimension: 180 x 110, Max. Size: 500Kb, Allowed Types: gif, jpeg, jpg, png, svg</p>
						<span class="text-danger">{{ $errors->first('logo') }}</span>
					</div>
					<div class="col-sm-10">
						<img src="{{ cloudekaBucketLocalUrl($content->logo) }}" class="img-responsive">
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