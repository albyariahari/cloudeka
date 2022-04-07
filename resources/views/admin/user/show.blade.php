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
                            {{$user->name}}
                        </p>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <p>
                            {{$user->email}}
                        </p>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Role</label>
                    <div class="col-sm-10">
                        @if($user->getRoleNames()->count()>0)
                            @foreach($user->getRoleNames() as $v)
                                <p>
                                    {{ $v }}
                                </p>
                            @endforeach
                        @else
                            <p>
                                Belum memiliki role
                            </p>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Profile Picture</label>
                    <div class="col-sm-10">
                        <div class="col-sm-5 no-padding">
                            <?php if($user->profile_picture != '' || !is_null($user->profile_picture)): ?>
                                <img src="<?=env('APP_URL').'/storage/'.$user->profile_picture?>" class="img-responsive">
                            <?php else: ?>
                                <p>
                                    Tidak Ada Profile
                                </p>
                            <?php endif; ?>
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
