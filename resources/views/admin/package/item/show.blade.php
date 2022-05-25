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
                            {{$packageItem->name}}
                        </p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Package</label>
                    <div class="col-sm-10">
                        <p>
                            {{$packageItem->Package->name}}
                        </p>
                    </div>
                </div>

      		</div>
      		<!-- /.card-body -->
      	</div>
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Component</h3>
            </div>
            <div class="card-body" id="component-wrapper">
                @foreach ($packageItem->CalculatorComponents as $component)
                <div class="card card-default border border-dark component">
                    <div class="card-header border-0 p-0 m-0">
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Component</label>
                            <div class="col-sm-10">
                                <p>
                                    {{$component->title}} ({{$component->unit}})
                                </p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Value</label>
                            <div class="col-sm-10">
                                <p>
                                    {{$component->pivot->value}}
                                </p>
                            </div>
                        </div>

                    </div>

                    <!-- /.card-body -->

                </div>
                @endforeach
            </div>
                <!-- /.card-body -->

        </div>
      	<!-- /.box -->
    <!-- /.card-body -->
<!-- /.box -->
@stop

