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
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <p>
                            {{$category->title}}
                        </p>
                    </div>
                </div>

      		</div>
      		<!-- /.card-body -->

        </div>
    <!-- /.card-body -->
<!-- /.box -->
@stop

@push('js')
@endpush
