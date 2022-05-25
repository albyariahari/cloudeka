@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
	<form action="{{route('admin.package.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">
		@csrf
        <span class="form-button"><a href="{{route('admin.package.index')}}" class="btn btn-secondary pull-right">Back</a><button type="submit" class="btn btn-success pull-right create">Create</button></span>
        @include('layouts.session')
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Product</label>
                    <div class="col-sm-10">
                        <select name="product_id"  class="form-control" style="width: 100%;">
                            <option selected value="0">Select Product</option>
                            @foreach ($products as $item)
                            <option value="{{$item->id}}" {{(int)old('product_id') === $item->id ? 'selected':''}}>{{$item->title}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('product_id') }}</span>
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

@push('js')
@endpush
