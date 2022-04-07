@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
	<form action="{{route('admin.role.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">
		@csrf
        <span class="form-button"><a href="{{route('admin.role.index')}}" class="btn btn-secondary pull-right">Back</a><button type="submit" class="btn btn-success pull-right create">Create</button></span>
      	<!-- Default box -->
      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">General Info</h3>
			</div>
      		<div class="card-body">

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Name" value="{{ old('name')}}" name="name">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Permission</label>
                    <div class="col-sm-10">
                        <div class="row">
                            @foreach ($permission as $item)
                            <div class="col-sm-3">
                                <label class="checkcard-inline"><input type="checkbox" name="permission[]" value="{{$item->id}}" {{(is_array(old('permission')) && in_array($item->id , old('permission'))) ? 'checked' : ''}}> {{$item->name}}</label>
                            </div>
                            @endforeach
                        </div>
                        <span class="text-danger">{{ $errors->first('permission') }}</span>
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
