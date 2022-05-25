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

                @if ($component->parentComponent)

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Parent Component</label>
                    <div class="col-sm-10">
                        <p>
                            {{$component->parentComponent->title}}
                        </p>
                    </div>
                </div>

                @endif

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <p>
                            {{$component->title}}
                        </p>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Unit</label>
                    <p>
                        {{$component->unit}}
                    </p>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Hint</label>
                    <p>
                        {{$component->hint}}
                    </p>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Data Type</label>
                    <div class="col-sm-10">
                        <p>
                            {{$component->data_type}}
                        </p>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Data Group</label>
                    <div class="col-sm-10">
                        <p>
                            {{$component->data_group}}
                        </p>
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
                                    <p>
                                        {{$component->price['pay-as-you-use']??'-'}}
                                    </p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Monthly</label>
                                <div class="col-sm-10">
                                    <p>
                                        {{$component->price['monthly']??'-'}}
                                    </p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">1-year</label>
                                <div class="col-sm-10">
                                    <p>
                                        {{$component->price['1-year']??'-'}}
                                    </p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">3-year</label>
                                <div class="col-sm-10">
                                    <p>
                                        {{$component->price['3-year']??'-'}}
                                    </p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">5-year</label>
                                <div class="col-sm-10">
                                    <p>
                                        {{$component->price['5-year']??'-'}}
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
        @if (count($component->subComponents) > 0)
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">SubComponent Info</h3>
            </div>

            <div class="card-body">
                @foreach ($component->subComponents as $item)
                <div class="card card-default border border-dark benefit">
                    <div class="card-header border-0 p-0 m-0">
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-10">
                                <p>
                                    {{$item->title}}
                                </p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Unit</label>
                            <div class="col-sm-10">
                                <p>
                                    {{$item->unit}}
                                </p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Hint</label>
                            <div class="col-sm-10">
                                <p>
                                    {{$item->hint}}
                                </p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Data Type</label>
                            <div class="col-sm-10">
                                <p>
                                    {{$item->data_type}}
                                </p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Data Group</label>
                            <div class="col-sm-10">
                                <p>
                                    {{$item->data_group}}
                                </p>
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
                                            <p>
                                                {{$item->price['pay-as-you-use']??'-'}}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Monthly</label>
                                        <div class="col-sm-10">
                                            <p>
                                                {{$item->price['monthly']??'-'}}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 control-label">1-year</label>
                                        <div class="col-sm-10">
                                            <p>
                                                {{$item->price['1-year']??'-'}}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 control-label">3-year</label>
                                        <div class="col-sm-10">
                                            <p>
                                                {{$item->price['3-year']??'-'}}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 control-label">5-year</label>
                                        <div class="col-sm-10">
                                            <p>
                                                {{$item->price['5-year']??'-'}}
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
        @endif
      	<!-- /.box -->
    <!-- /.card-body -->
<!-- /.box -->
@stop
