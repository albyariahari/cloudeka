@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
      	<!-- Default box -->
      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">General Info</h3>
			</div>
      		<div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">What do you need?</label>
                    <div class="col-sm-10">
                        <p>{!! $data->need->translate('en')->title !!}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Where do you hear us?</label>
                    <div class="col-sm-10">
					@if ($data->hear)
                        <p>{!! $data->hear->translate('en')->title !!}</p>
					@else
						<p>Others</p>
					@endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Company Name</label>
                    <div class="col-sm-10">
                        <p>{!! $data->company_name !!}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
                    <div class="col-sm-10">
                        <p>{!! $data->name !!}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email Address</label>
                    <div class="col-sm-10">
                        <p>{!! $data->email !!}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
                    <div class="col-sm-10">
                        <p>{!! $data->phone !!}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Message</label>
                    <div class="col-sm-10">
                        <p>{!! $data->description !!}</p>
                    </div>
                </div>
      		</div>
      		<!-- /.card-body -->
      	</div>
    <!-- /.card-body -->
<!-- /.box -->
@stop

