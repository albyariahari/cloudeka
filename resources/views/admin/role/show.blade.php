@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default card -->
      	<!-- Default card -->
      	<div class="card">
      		<div class="card-header with-border">
		  		<h3 class="card-title">General Info</h3>
			</div>
      		<div class="card-body">

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <p>
                            {{$role->name}}
                        </p>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Permissions</label>
                    <div class="col-sm-10">
                        <div class="row">
                            @foreach ($role->permissions as $item)
                                <div class="col-sm-2">
                                    {{$item->name}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

      		</div>
      		<!-- /.card-body -->
      	</div>
      	<!-- /.card -->
    <!-- /.card-body -->
<!-- /.card -->
@stop
