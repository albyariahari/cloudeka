@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
      	<!-- Default box -->
        <span class="form-button">
			<a href="{{ route('admin.calculator.index') }}" class="btn btn-secondary pull-right">Back</a>
		</span>
      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">General Info</h3>
			</div>
      		<div class="card-body">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Product</label>
                    <div class="col-sm-10">
                        <p>
                            {{$calculator->Product->title}}
                        </p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Select Package List</label>
                    <div class="col-sm-10">
                        <p>
                            {!! $calculator->Package->name ?? '<i class="fas fa-minus"></i>' !!}
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
                @foreach ($calculator->CalculatorComponents as $calComponent)
                <div class="card card-default border border-dark component">
                    <div class="card-header border-0 p-0 m-0">
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Component</label>
                            <div class="col-sm-10">
                                <p>
                                    {{$calComponent->title}} ({{$calComponent->unit}})
                                </p>
                            </div>
                        </div>
                        @php
                            $price = json_decode($calComponent->pivot->price,true)
                        @endphp
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-10">
                                <div class="card card-default">
                                    <div class="card-body">

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Pay as You Use</label>
                                            <div class="col-sm-10">
                                                <p>
                                                    {{$price['pay-as-you-use']}}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Monthly</label>
                                            <div class="col-sm-10">
                                                <p>
                                                    {{$price['monthly']}}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 control-label">1-year</label>
                                            <div class="col-sm-10">
                                                <p>
                                                    {{$price['1-year']}}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 control-label">3-year</label>
                                            <div class="col-sm-10">
                                                <p>
                                                    {{$price['3-year']}}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 control-label">5-year</label>
                                            <div class="col-sm-10">
                                                <p>
                                                    {{$price['5-year']}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Rules</label>
                            <div class="col-sm-10">
                                <div class="card card-default">
                                    <div class="card-body">

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Min</label>
                                            <div class="col-sm-10">
                                                <p>
                                                    {{$calComponent->pivot->rule_min_value}}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Max</label>
                                            <div class="col-sm-10">
                                                <p>
                                                    {{$calComponent->pivot->rule_max_value}}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Must be even</label>
                                            <div class="col-sm-10">
                                                <p>
                                                    {{$calComponent->pivot->rule_must_be_even === 1 ? 'True' : 'False'}}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Rule Editable</label>
                                            <div class="col-sm-10">
                                                <p>
                                                    {{$calComponent->pivot->rule_editable === 1 ? 'True' : 'False'}}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Rule visible</label>
                                            <div class="col-sm-10">
                                                <p>
                                                    {{$calComponent->pivot->visible === 1 ? 'True' : 'False'}}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Display mode</label>
                                            <div class="col-sm-10">
                                                <p>
                                                    {{$calComponent->pivot->display_mode}}
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- /.card-body -->

                </div>
                @endforeach
            </div>
            <!-- /.card-body -->

        </div>
    <!-- /.card-body -->
<!-- /.box -->
@stop

@push('js')
@endpush
