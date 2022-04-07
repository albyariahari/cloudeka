@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
	<form action="{{route('admin.package.item.store',$package->id)}}" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Name" value="{{ old('name')}}" name="name">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Package</label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" value="{{ $package->id }}" name="package_id">
                        <input type="text" class="form-control" value="{{ $package->name }}" readonly>
                    </div>
                </div>

      		</div>
      		<!-- /.card-body -->
      	</div>
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Component</h3>
                <a href="javascript:void(0)" class="btn btn-info" id="add_component" style="float: right;">Add Component</a>
            </div>
            <div class="card-body" id="component-wrapper">
                @if (old('component'))
                    @foreach (old('component') as $component)
                    <div class="card card-default border border-dark component">
                        <div class="card-header border-0 p-0 m-0">
                            <button type="button" class="delete-component btn btn-danger float-right" data-index="0">X</button>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Component</label>
                                <div class="col-sm-10">
                                    <select name="component[{{$loop->index}}][calculator_component_id]"  class="form-control" style="width: 100%;">
                                    <option selected value="0">Select Component</option>
                                        @foreach ($components as $item)
                                        <option value="{{$item->id}}" {{(int)$component['calculator_component_id'] === $item->id ?'selected':''}}>{{$item->title}} ({{$item->unit}})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Value</label>
                                <div class="col-sm-10">
                                    <input type="number" name="component[{{$loop->index}}][value]" value="{{$component['value']}}" placeholder="0" class="form-control">
                                </div>
                            </div>

                        </div>

                        <!-- /.card-body -->

                    </div>
                    @endforeach
                @else
                <div class="card card-default border border-dark component">
                    <div class="card-header border-0 p-0 m-0">
                        <button type="button" class="delete-component btn btn-danger float-right" data-index="0">X</button>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Component</label>
                            <div class="col-sm-10">
                                <select name="component[0][calculator_component_id]"  class="form-control" style="width: 100%;">
                                <option selected value="0">Select Component</option>
                                    @foreach ($components as $item)
                                    <option value="{{$item->id}}">{{$item->title}} ({{$item->unit}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Value</label>
                            <div class="col-sm-10">
                                <input type="number" name="component[0][value]" placeholder="0" class="form-control">
                            </div>
                        </div>

                    </div>

                </div>
                    
                @endif
                    <!-- /.card-body -->

            </div>
                  <!-- /.card-body -->

        </div>
      	<!-- /.box -->
	</form>
    <!-- /.card-body -->
<!-- /.box -->
@stop

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            let components = $(".component").length;
            $("#add_component").click(function(){
                var component = {!! json_encode($components->toArray()) !!};
                select_component = mappingSelect(component);
                let html = '<div class="card card-default border border-dark component">'
                            +'<div class="card-header border-0 p-0 m-0">'
                            +'    <button type="button" class="delete-component btn btn-danger float-right" data-index="0">X</button>'
                            +'</div>'
                            +'<div class="card-body">'
                            +'    <div class="form-group row">'
                            +'        <label for="inputEmail3" class="col-sm-2 control-label">Component</label>'
                            +'        <div class="col-sm-10">'
                            +'            <select class="form-control select2" style="width: 100%;" name="component['+components+'][calculator_component_id]">'
                            +'                <option selected value="0">Select Component</option>'
                            +                   select_component
                            +'            </select>'
                            +'        </div>'
                            +'    </div>'
                            +'    <div class="form-group row">'
                            +'        <label for="inputEmail3" class="col-sm-2 control-label">Value</label>'
                            +'        <div class="col-sm-10">'
                            +'            <input type="number" name="component['+components+'][value]" placeholder="0" class="form-control">'
                            +'        </div>'
                            +'    </div>'
                            +'</div>'
                            +'</div>';

				$("#component-wrapper").append(html);

				components++;
			});

			$(document).on("click", ".delete-component", function(){
				$(this).parent().parent().remove();
			});

            function mappingSelect(data){
                var select = null
                data.forEach(element => {
                    select+=`<option value="${element.id}">${element.title} (${element.unit})</option>`;
                });
                return select
            }
        });
    </script>
@endpush
