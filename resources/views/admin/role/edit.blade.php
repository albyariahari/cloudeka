@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default card -->
	<!-- form start -->
	<form action="{{route('admin.role.update',$role->id)}}" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">
        @csrf
        @method('PUT')
        <span class="form-button"><a href="{{route('admin.role.index')}}" class="btn btn-secondary pull-right">Back</a><button type="submit" class="btn btn-success pull-right create">Update</button></span>

      	<!-- Default card -->
      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">General Info</h3>
			</div>
      		<div class="card-body">
        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Name" value="{{ old('name',$role->name)}}" name="name">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Permission</label>
                    <div class="col-sm-10">
                        <div class="row">
                            @foreach ($permission as $item)
                            <div class="col-sm-2">
                                <label class="card-inline"><input type="checkbox" name="permission[]" value="{{$item->id}}" {{in_array($item->id, old('permission',Illuminate\Support\Arr::pluck($role->permissions, 'id'))) ? 'checked="checked"' : ''}}> {{$item->name}}</label>
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
