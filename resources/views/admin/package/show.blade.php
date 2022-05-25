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
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <p>
                            {{$package->name}}
                        </p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Product</label>
                    <div class="col-sm-10">
                        <p>
                            {{$package->Product->title}}
                        </p>
                    </div>
                </div>

        		{{-- <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Parent Component</label>
                    <div class="col-sm-10">
                        <select name="parent_id"  class="form-control" style="width: 100%;">
                            <option selected disabled>Select Parent Component</option>
                            @foreach ($components as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                    </div>
                </div> --}}

        		{{-- <div class="form-group row">
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
                </div> --}}
                {{-- <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Data Type</label>
                    <div class="col-sm-10">
                        <select name="data_type" class="form-control" style="width: 100%;">
                            <option selected disabled>Select Data Type</option>
                            @foreach ($data_types as $item)
                            <option value="{{$item}}">{{ucfirst(str_replace('-',' ',$item))}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('data_type') }}</span>
                    </div>
                </div> --}}

        		{{-- <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Data Group</label>
                    <div class="col-sm-10">
                        <select name="data_group"  class="form-control" style="width: 100%;">
                            <option selected disabled>Select Data Group</option>
                            @foreach ($data_groups as $item)
                            <option value="{{$item}}">{{ucfirst(str_replace('-',' ',$item))}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('data_group') }}</span>
                    </div>
                </div> --}}

        		{{-- <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-10">
                        <div class="card card-default">
                            <div class="card-body">

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Pay as You Use</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" placeholder="0" value="{{ old('price.pay-as-you-use')}}" name="price[pay-as-you-use]">
                                    <span class="text-danger">{{ $errors->first('price.pay-as-you-use') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Monthly</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" placeholder="0" value="{{ old('price.monthly')}}" name="price[monthly]">
                                    <span class="text-danger">{{ $errors->first('price.monthly') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">1-year</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" placeholder="0" value="{{ old('price.1-year')}}" name="price[1-year]">
                                    <span class="text-danger">{{ $errors->first('price.1-year') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">3-year</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" placeholder="0" value="{{ old('price.3-year')}}" name="price[3-year]">
                                    <span class="text-danger">{{ $errors->first('price.3-year') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">5-year</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" placeholder="0" value="{{ old('price.5-year')}}" name="price[5-year]">
                                    <span class="text-danger">{{ $errors->first('price.5-year') }}</span>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

      		</div>
      		<!-- /.card-body -->
      	</div>
    <!-- /.card-body -->
<!-- /.box -->
@stop

@push('js')
@endpush
