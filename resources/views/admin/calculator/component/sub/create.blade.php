@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
	<form action="{{route('admin.calculator.component.sub.store',$parent_component->id)}}" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">
		@csrf
        <span class="form-button"><a href="{{url()->previous()}}" class="btn btn-secondary pull-right">Back</a><button type="submit" class="btn btn-success pull-right create">Create</button></span>
        @include('layouts.session')
      	<!-- Default box -->
      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">General Info</h3>
			</div>
      		<div class="card-body">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Parent Component</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$parent_component->title}}" readonly disabled>
                        <input type="hidden" value="{{$parent_component->id}}" name="parent_id">
                        <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Title" value="{{ old('title')}}" name="title">
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Unit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Unit" value="{{ old('unit')}}" name="unit">
                        <span class="text-danger">{{ $errors->first('unit') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Hint</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Hint" value="{{ old('hint')}}" name="hint">
                        <span class="text-danger">{{ $errors->first('hint') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Data Type</label>
                    <div class="col-sm-10">
                        <select name="data_type" class="form-control" style="width: 100%;">
                            <option selected value="0">Select Data Type</option>
                            @foreach ($data_types as $item)
                            <option value="{{$item}}" {{(int)old('data_type') === $item ? 'selected':''}}>{{ucfirst(str_replace('-',' ',$item))}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('data_type') }}</span>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Data Group</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Data Group" value="{{ old('data_group')}}" name="data_group">
                        <span class="text-danger">{{ $errors->first('data_group') }}</span>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-10">
                        <div class="card card-default">
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Pay as You Use</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" placeholder="0" value="{{ old('price.pay-as-you-use',0)}}" name="price[pay-as-you-use]">
                                        <span class="text-danger">{{ $errors->first('price.pay-as-you-use') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Monthly</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" placeholder="0" value="{{ old('price.monthly',0)}}" name="price[monthly]">
                                        <span class="text-danger">{{ $errors->first('price.monthly') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 control-label">1-year</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" placeholder="0" value="{{ old('price.1-year',0)}}" name="price[1-year]">
                                        <span class="text-danger">{{ $errors->first('price.1-year') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 control-label">3-year</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" placeholder="0" value="{{ old('price.3-year',0)}}" name="price[3-year]">
                                        <span class="text-danger">{{ $errors->first('price.3-year') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 control-label">5-year</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" placeholder="0" value="{{ old('price.5-year',0)}}" name="price[5-year]">
                                        <span class="text-danger">{{ $errors->first('price.5-year') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
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
