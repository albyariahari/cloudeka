@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default card -->
	<!-- form start -->
	<form action="{{route('admin.user.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">
		@csrf
        <span class="form-button"><a href="{{route('admin.user.index')}}" class="btn btn-secondary pull-right" style="margin-left: 15px;width:120px">Back</a><button type="submit" class="btn btn-success pull-right create" style="margin-left: 15px;width:120px">Create</button></span>
      	<!-- Default card -->
      	<div class="card">
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" placeholder="Email" value="{{ old('email')}}" name="email">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Role</label>
                    <div class="col-sm-10">
                        <select id="roles" class="form-control select2" name="roles">
                            <option value="0">Select Role</option>
                            @foreach($roles as $role)
                                <option value="{{$role->name}}" {{ old('roles') === $role->name ? 'selected="selected"' : ''}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('roles') }}</span>
                    </div>
                </div>

                <div class="form-group row">
					<label for="exampleInputFile" class="col-sm-2 control-label">Profile Picture</label>
					<div class="col-sm-5">
						<input type="file" name="profile_picture">
						<p class="help-block">Profile Picture dimension 900 * 500</p>
						<span class="text-danger">{{ $errors->first('profile_picture') }}</span>
					</div>
            	</div>

      		</div>
      		<!-- /.card-body -->
      	</div>
      	<!-- /.card -->
	</form>
    <!-- /.card-body -->
<!-- /.card -->
@stop
