@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
	<form action="{{route('admin.product.category.update',$category->id)}}" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">
		@csrf
        @method('PUT')
        <span class="form-button"><a href="{{route('admin.product.category.index')}}" class="btn btn-secondary pull-right">Back</a><button type="submit" class="btn btn-success pull-right create">Update</button></span>
        @include('layouts.session')
      	<!-- Default box -->
      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">General Info</h3>
			</div>
      		<div class="card-body">

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Title" value="{{ old('title',$category->title)}}" name='title'>
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                </div>

      		</div>
      		<!-- /.card-body -->

        </div>

        <!-- /.card-footer -->
      	<!-- /.box -->
	</form>
    <!-- /.card-body -->
<!-- /.box -->
@stop

@push('js')
@endpush
