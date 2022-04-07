@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
	<form action="{{route('admin.solution.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">
		@csrf
        <span class="form-button">
			<a href="{{ route('admin.solution.index') }}" class="btn btn-secondary pull-right">Back</a>
			<button type="submit" class="btn btn-success pull-right create">Create</button>
		</span>
        @include('layouts.session')
      	<!-- Default box -->
      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">General Info</h3>
			</div>
      		<div class="card-body">

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Title" value="{{ old('title')}}" name='title'>
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                </div>
        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Subtitle</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Subtitle" value="{{ old('subtitle')}}" name='subtitle'>
                        <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                    </div>
                </div>
        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea  name="description" id="description">{{ old('description') }}</textarea>
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>
                </div>
        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Excerpt</label>
                    <div class="col-sm-10">
                        <textarea  name="excerpt" class="form-control" rows="10">{{ old('excerpt') }}</textarea>
                        <span class="text-danger">{{ $errors->first('excerpt') }}</span>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="inputEmail3" class="col-sm-2 control-label">Logo Putih</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="logo_1">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="inputEmail3" class="col-sm-2 control-label">Logo Biru</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="logo_2">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="inputEmail3" class="col-sm-2 control-label">Image Banner</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="images">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                </div>

      		</div>
      		<!-- /.card-body -->
        </div>
		
		<!-- Bottom Banner -->
      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">Bottom Banner</h3>
			</div>
      		<div class="card-body">
        		<div class="form-group row">
					{!! Form::label('bottom_title', 'Title', [ 'class' => 'col-sm-2 control-label' ]) !!}
                    <div class="col-sm-10">
						{!! Form::text('bottom_title', old('bottom_title'), [ 'class' => 'form-control', 'placeholder' => 'Title' ]) !!}
						<p class="text-help">Max. Length: 255 characters</p>
                        <span class="text-danger">{!! $errors->first('bottom_title') !!}</span>
                    </div>
                </div>
        		<div class="form-group row">
					{!! Form::label('bottom_description', 'Description', [ 'class' => 'col-sm-2 control-label' ]) !!}
                    <div class="col-sm-10">
						{!! Form::textarea('bottom_description', old('bottom_description')) !!}
                        <span class="text-danger">{!! $errors->first('bottom_description') !!}</span>
                    </div>
                </div>
        		<div class="form-group row">
					{!! Form::label('bottom_link', 'Button Name', [ 'class' => 'col-sm-2 control-label' ]) !!}
                    <div class="col-sm-10">
						{!! Form::text('bottom_link', old('bottom_link'), [ 'class' => 'form-control', 'placeholder' => 'Button Name' ]) !!}
						<p class="text-help">Max. Length: 50 characters</p>
                        <span class="text-danger">{!! $errors->first('bottom_link') !!}</span>
                    </div>
                </div>
        		<div class="form-group row">
					{!! Form::label('bottom_url', 'Button URL', [ 'class' => 'col-sm-2 control-label' ]) !!}
                    <div class="col-sm-10">
						{!! Form::text('bottom_url', old('bottom_url'), [ 'class' => 'form-control', 'placeholder' => 'Button URL' ]) !!}
						<p class="text-help">Valid URL</p>
                        <span class="text-danger">{!! $errors->first('bottom_url') !!}</span>
                    </div>
                </div>
        		<div class="form-group row">
					{!! Form::label('bottom_image', 'Image', [ 'class' => 'col-sm-2 control-label' ]) !!}
                    <div class="col-sm-10">
						<div class="custom-file">
							{!! Form::file('bottom_image', old('bottom_image'), [ 'class' => 'custom-file-input' ]) !!}
							{!! Form::label('bottom_image', 'Choose File', [ 'class' => 'custom-file-label' ]) !!}
						</div>
						<p class="text-help">Allowed Type: .jpeg, .jpg, .png</p>
						<p class="text-help">Max. Size: 500kb</p>
                        <span class="text-danger">{!! $errors->first('bottom_image') !!}</span>
                    </div>
                </div>
      		</div>
        </div>
		<!-- /Bottom Banner -->
		
      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">Use Cases</h3>
			</div>
      		<div class="card-body" id="case-wrapper">
                <div class="card card-default border border-dark case">
                    <div class="card-header border-0 p-0 m-0">
                        <button type="button" class="delete-case btn btn-danger float-right" data-index="0">X</button>
                        <h3 class="card-title font-weight-bold" style="padding: .75rem 1.25rem;">Choose From Existing use Case</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Choose Use Case</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" name="case[0][case_id]">
                                    <option selected value="0">Select Use Case</option>
                                    @foreach ($use_cases as $use_case)
                                        <option value="{{$use_case->id}}">{{$use_case->Client->name}} - {!! $use_case->translate('en')->description !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="card-header border-0">
                        <h3 class="card-title font-weight-bold">Add New Use Case</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea  name="case[0][description]" id="case_description_0"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="inputEmail3" class="col-sm-2 control-label">Client</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" name="case[0][client_id]">
                                    <option selected value="0">Select Client</option>
                                    @foreach ($clients as $client)
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                </div>
      		</div>
            <div class="card-footer">
                <a href="javascript:void(0)" class="btn btn-info" id="add_case" style="float: right;">Add Use Case</a>
            </div>
      		<!-- /.card-body -->

        </div>

      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">Products</h3>
			</div>
      		<div class="card-body" id="product-wrapper">
                @if (old('product'))
                @foreach (old('product') as $item)

                    <div class="card card-default border border-dark product">
                        <div class="card-header border-0 p-0 m-0">
                            <button type="button" class="delete-product btn btn-danger float-right" data-index="0">X</button>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Product</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" style="width: 100%;" name="product[]">
                                        <option selected value="0">Select Product</option>
                                        @foreach ($products as $product)
                                        <option value="{{$product->id}}" {{(int)$item === $product->id?'selected':''}}>{{$product->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                    </div>

                @endforeach
                @else
                    <div class="card card-default border border-dark product">
                        <div class="card-header border-0 p-0 m-0">
                            <button type="button" class="delete-product btn btn-danger float-right" data-index="0">X</button>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Product</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" style="width: 100%;" name="product[]">
                                        <option selected value="0">Select Product</option>
                                        @foreach ($products as $product)
                                        <option value="{{$product->id}}">{{$product->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                    </div>
                @endif
      		</div>
      		<!-- /.card-body -->
            <div class="card-footer">
                <a href="javascript:void(0)" class="btn btn-info" id="add_product" style="float: right;">Add Product</a>
			</div>

        </div>

        <!-- /.card-footer -->
      	<!-- /.box -->
	</form>
    <!-- /.card-body -->
<!-- /.box -->
@stop

@push('js')
    <script type="text/javascript">
        $(document).ready(function(){
            textareas = ['description','case_description_0', 'bottom_description']
            textareas.forEach(element => {
                CKEditorChange(element)
            });
            bsCustomFileInput.init()
            $(".select2").select2()
			let cases = $(".case").length;
			let products = $(".product").length;

			$("#add_case").click(function(){
                var use_cases = {!! json_encode($use_cases->toArray()) !!};
                var clients = {!! json_encode($clients->toArray()) !!};
                select_case = mappingSelect(use_cases);
                select_client = mappingSelect(clients);
                let html = '<div class="card card-default border border-dark case">'
                            +'<div class="card-header border-0 p-0 m-0">'
                            +'    <button type="button" class="delete-case btn btn-danger float-right" data-index="0">X</button>'
                            +'    <h3 class="card-title font-weight-bold" style="padding: .75rem 1.25rem;">Choose From Existing use Case</h3>'
                            +'</div>'
                            +'<div class="card-body">'
                            +'    <div class="form-group row">'
                            +'        <label for="inputEmail3" class="col-sm-2 control-label">Choose Use Case</label>'
                            +'        <div class="col-sm-10">'
                            +'            <select class="form-control select2" style="width: 100%;" name="case['+cases+'][case_id]">'
                            +'                <option selected value="0" value="0">Select Use Case</option>'
                            +                   select_case
                            +'            </select>'
                            +'        </div>'
                            +'    </div>'
                            +'</div>'
                            +'<div class="card-header border-0">'
                            +'    <h3 class="card-title font-weight-bold">Add New Use Case</h3>'
                            +'</div>'
                            +'<div class="card-body">'
                            +'    <div class="form-group row">'
                            +'        <label for="inputEmail3" class="col-sm-2 control-label">Description</label>'
                            +'        <div class="col-sm-10">'
                            +'            <textarea  name="case['+cases+'][description]" id="case_description_'+cases+'"></textarea>'
                            +'        </div>'
                            +'    </div>'
                            +'    <div class="form-group row mb-4">'
                            +'        <label for="inputEmail3" class="col-sm-2 control-label">Client</label>'
                            +'        <div class="col-sm-10">'
                            +'            <select class="form-control select2" style="width: 100%;" name="case['+cases+'][client_id]">'
                            +'                  <option selected value="0">Select Client</option>'
                            +                   select_client
                            +'              </select>'
                            +'        </div>'
                            +'    </div>'
                            +'</div>'
                            +'</div>';

				$("#case-wrapper").append(html);
                CKEditorChange('case_description_'+cases)
                $(".select2").select2()

				cases++;
			});

			$(document).on("click", ".delete-case", function(){
				$(this).parent().parent().remove();
				$(".case").each(function(index){
                    $(this).find('.name').attr('name', 'prices['+cases+'][key]');
                    $(this).find('.value').attr('name', 'prices['+cases+'][value]');
                });
			});

			$("#add_product").click(function(){
                var products = {!! json_encode($products->toArray()) !!};
                select_product = mappingSelect(products);
				let html = '<div class="card card-default border border-dark product">'
                        +'      <div class="card-header border-0 p-0 m-0">'
                        +'          <button type="button" class="delete-product btn btn-danger float-right" data-index="0">X</button>'
                        +'      </div>'
                        +'      <div class="card-body">'
                        +'          <div class="form-group row">'
                        +'              <label for="inputEmail3" class="col-sm-2 control-label">Product</label>'
                        +'              <div class="col-sm-10">'
                        +'                  <select class="form-control select2" style="width: 100%;" name="product[]">'
                        +'                      <option selected value="0">Select Product</option>'
                        +                       select_product
                        +'                  </select>'
                        +'              </div>'
                        +'          </div>'
                        +'      </div>'
                        +'  </div>';

				$("#product-wrapper").append(html);

                $(".select2").select2()
				products++;
			});

			$(document).on("click", ".delete-product", function(){
				$(this).parent().parent().remove();
			});

            function CKEditorChange(name){
                CKEDITOR.replace(name,{
                    extraPlugins: 'codesnippet',
                    removePlugins : 'cloudservices',
                });
            }

            function mappingSelect(data){
                var select = null
                data.forEach(element => {
                    select+=`<option value="${element.id}">${element.title??element.name??element.description}</option>`;
                });
                return select
            }
		});
    </script>
@endpush
