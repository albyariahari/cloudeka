@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<select class="form-control" id="languages" style="width: 5%;margin-bottom: 20px;" name="language">
            @foreach ($languages as $item)
            <option value="{{$item}}" {{$lang === $item ? 'selected':''}}>{{strtoupper($item)}}</option>
            @endforeach
        </select>
<!-- Default box -->
	<!-- form start -->
      	<!-- Default box -->
      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">General Info</h3>
			</div>
      		<div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Product</label>
                    <div class="col-sm-10">
                        <p>{!! $data->Documentation->Product->translate($lang)->title !!}</p>
                    </div>
                </div>
              <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Documentation</label>
                    <div class="col-sm-10">
                        <p>{!! $data->Documentation->translate($lang)->name !!}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Rate</label>
                    <div class="col-sm-10">
                        <p>{!! $data->rate !!}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Problems</label>
                    <div class="col-sm-10">
                        <p>{!! $data->problem !!}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Note</label>
                    <div class="col-sm-10">
                        <p>{!! $data->description !!}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
                    <div class="col-sm-10">
                        <p>{!! $data->name !!}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Company Name</label>
                    <div class="col-sm-10">
                        <p>{!! $data->company_name !!}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
                    <div class="col-sm-10">
                        <p>{!! $data->phone !!}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email Address</label>
                    <div class="col-sm-10">
                        <p>{!! $data->email !!}</p>
                    </div>
                </div>
      		</div>
      		<!-- /.card-body -->
      	</div>
    <!-- /.card-body -->
<!-- /.box -->
@stop

