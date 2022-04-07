@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
	<form action="{{route('admin.product.update',$product->id)}}" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">
		@csrf
        @method('PUT')
        <span class="form-button">
			<a href="{{ route('admin.product.index') }}" class="btn btn-secondary pull-right">Back</a>
			<button type="submit" class="btn btn-success pull-right create">Update</button>
		</span>
        <select class="form-control" id="languages" style="width: 5%;margin-bottom: 20px;" name="language">
            @foreach ($languages as $item)
            <option value="{{$item}}" {{old('language',$lang) === $item ? 'selected':''}}>{{strtoupper($item)}}</option>
            @endforeach
        </select>
        @include('layouts.session')
        <!-- Default box -->
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">General Info ({{strtoupper($lang)}})</h3>
            </div>
            <div class="card-body">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" style="width: 100%;" name="category_id">
                            <option selected value="0">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{(int)old('category_id',$product->Category->id) === $category->id ? 'selected':''}}>{{$category->title}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Title" value="{{ old('title',$product->translate($lang)->title)}}" name='title'>
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Subtitle</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Subtitle" value="{{ old('subtitle',$product->translate($lang)->subtitle)}}" name='subtitle'>
                        <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="inputEmail3" class="col-sm-2 control-label">Logo Putih</label>
                    <div class="col-sm-5">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="logo_1">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        @if ($product->translate($lang)->logo_1 != '' || !is_null($product->translate($lang)->logo_1))
                            <img src="{{ cloudekaBucketLocalUrl($product->translate($lang)->logo_1) }}" class="img-responsive"  style="width: 350px !important">
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="inputEmail3" class="col-sm-2 control-label">Logo Biru</label>
                    <div class="col-sm-5">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="logo_2">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        @if ($product->translate($lang)->logo_2 != '' || !is_null($product->translate($lang)->logo_2))
                            <img src="{{ cloudekaBucketLocalUrl($product->translate($lang)->logo_2) }}" class="img-responsive"  style="width: 350px !important">
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="inputEmail3" class="col-sm-2 control-label">Image Banner</label>
                    <div class="col-sm-5">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="images">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        @if ($product->translate($lang)->images != '' || !is_null($product->translate($lang)->images))
                            <img src="{{ cloudekaBucketLocalUrl($product->translate($lang)->images) }}" class="img-responsive"  style="width: 650px">
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Excerpt</label>
                    <div class="col-sm-10">
                        <textarea name="excerpt" rows="10" cols="80" class="form-control">{{old('excerpt',$product->translate($lang)->excerpt)}}</textarea>
                        <span class="text-danger">{{ $errors->first('excerpt') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea name="description" id="description">{{old('description',$product->translate($lang)->description)}}</textarea>
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

        </div>

        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Meta Info ({{strtoupper($lang)}})</h3>
            </div>
            <div class="card-body">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Title" value="{{ old('meta_title',$product->translate($lang)->meta_title)}}" name='meta_title'>
                        <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Keyword</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="meta_keyword" placeholder="Keyword" rows="3">{{ old('meta_keyword',$product->translate($lang)->meta_keyword) }}</textarea>
                        <span class="text-danger">{{ $errors->first('meta_keyword') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="meta_description" placeholder="Description" rows="3">{{ old('meta_description',$product->translate($lang)->meta_description) }}</textarea>
                        <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

        </div>

        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Technology Partner ({{strtoupper($lang)}})</h3>
            </div>
            <div class="card-body">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea  name="partner_description" id="partner_description">{{ old('partner_description',$product->translate($lang)->partner_description) }}</textarea>
                        <span class="text-danger">{{ $errors->first('partner_description') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Partners</label>
                    <div class="col-sm-10">
                        <div class="card card-default">
                            <div class="card-header with-border">
                            </div>
                            <div class="card-body" id="partner_wrapper">
                                @if (old('partner'))
                                @foreach (old('partner') as $item)
                                <div class="form-group row partner">
                                    <div class="col-sm-11">
                                        <select class="form-control select2" style="width: 100%;" name="partner[]">
                                            <option selected value="0">Select Partner</option>
                                            @foreach ($partners as $partner)
                                                <option value="{{$partner->id}}" {{(int)$item === $partner->id?'selected':''}}>{{$partner->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first("partner.$loop->index") }}</span>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="button" class="delete-partner btn btn-danger float-right" data-index="0">X</button>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                @foreach ($product->Partners as $item)
                                <div class="form-group row partner">
                                    <div class="col-sm-11">
                                        <select class="form-control select2" style="width: 100%;" name="partner[]">
                                            <option selected value="0">Select Partner</option>
                                            @foreach ($partners as $partner)
                                                <option value="{{$partner->id}}" {{$item->id === $partner->id?'selected':''}}>{{$partner->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('partner') }}</span>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="button" class="delete-partner btn btn-danger float-right" data-index="0">X</button>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="card-footer with-border">
                                <a href="javascript:void(0)" class="btn btn-info" id="add_partner" style="float: right;">Add Partner</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

        </div>

        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Use Cases ({{strtoupper($lang)}})</h3>
            </div>
            <div class="card-body" id="case_wrapper">
                @if (old('case'))
                    @foreach (old('case') as $case)
                    <div class="card card-default border border-dark case">
                    @if ($case['case_id'])
                        <div class="card-header border-0 p-0 m-0">
                            <button type="button" class="delete-case btn btn-danger float-right" data-index="0">X</button>
                            <h3 class="card-title font-weight-bold" style="padding: .75rem 1.25rem;">Choose From Existing use Case</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Choose Use Case</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" style="width: 100%;" name="case[{{$loop->index}}][case_id]">
                                        <option value="0" selected>Select Use Case</option>
                                        @foreach ($use_cases as $use_case)
                                            <option value="{{$use_case->id}}" {{(int)$case['case_id'] === $use_case->id ? 'selected':''}}>{{$use_case->Client->name}} - {!!$use_case->translate($lang)->description!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    @else

                    <div class="card-header border-0">
                        <h3 class="card-title font-weight-bold">Add New Use Case</h3>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="case[{{$loop->index}}][case_id]" value="0">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea  name="case[{{$loop->index}}][description]" id="case_description_{{$loop->index}}">{{ $case['description'] }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="inputEmail3" class="col-sm-2 control-label">Client</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" name="case[{{$loop->index}}][client_id]">
                                    <option selected value="0">Select Client</option>
                                    @foreach ($clients as $client)
                                    <option value="{{$client->id}}" {{(int)($case['client_id']) === $client->id ? 'selected':''}}>{{$client->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    @endif
                        <!-- /.card-body -->

                    </div>
                    @endforeach
                @else

                    @foreach ($product->UseCases as $key => $item)

                    <div class="card card-default border border-dark case">
                        <div class="card-header border-0 p-0 m-0">
                            <button type="button" class="delete-case btn btn-danger float-right" data-index="0">X</button>
                            <h3 class="card-title font-weight-bold" style="padding: .75rem 1.25rem;">Choose From Existing use Case</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Choose Use Case</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" style="width: 100%;" name="case[{{$key}}][case_id]">
                                        <option value="0" selected>Select Use Case</option>
                                        @foreach ($use_cases as $use_case)
                                            <option value="{{$use_case->id}}" {{$item->id === $use_case->id ? 'selected':''}}>{{$use_case->Client->name}} - {!!$use_case->translate($lang)->description!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    @endforeach
                @endif
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="javascript:void(0)" class="btn btn-info" id="add_case" style="float: right;">Add Use Case</a>
            </div>

        </div>

        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Benefits ({{strtoupper($lang)}})</h3>
            </div>
            <div class="card-body" id="benefit_wrapper">
                @if (old('benefit'))
                    @foreach (old('benefit') as $item)
                        <div class="card card-default border border-dark benefit">
                            <div class="card-header border-0 p-0 m-0">
                                <button type="button" class="delete-benefit btn btn-danger float-right" data-index="0">X</button>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Title" name="benefit[{{$loop->index}}][title]" value="{{$item['title']}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" value="{{$item['benefit_id']}}" name="benefit[{{$loop->index}}][benefit_id]">
                                        <textarea  name="benefit[{{$loop->index}}][description]" id="benefit_description_{{$loop->index}}">{{$item['description']}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Icon</label>
                                    <div class="col-sm-5">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="benefit[{{$loop->index}}][icon]">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        @if (isset($item['old_icon']) && !is_null($item['old_icon']))
                                            <input type="hidden" name="benefit[{{$loop->index}}][old_icon]" value="{{$item['old_icon']}}">
                                            <img src="{{$item['old_icon']}}" class="img-responsive"  style="width: 630px">
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                        </div>
                    @endforeach
                @else
                    @foreach ($product->Benefits as $key => $item)

                    <div class="card card-default border border-dark benefit">
                        <div class="card-header border-0 p-0 m-0">
                            <button type="button" class="delete-benefit btn btn-danger float-right" data-index="0">X</button>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Title" name="benefit[{{$key}}][title]" value="{{$item->translate($lang)->title}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="hidden" value="{{$item->id}}" name="benefit[{{$key}}][benefit_id]">
                                    <textarea  name="benefit[{{$key}}][description]" id="benefit_description_{{$key}}">{{$item->translate($lang)->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="inputEmail3" class="col-sm-2 control-label">Icon</label>
                                <div class="col-sm-5">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="benefit[{{$key}}][icon]">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    @if ($item->translate($lang)->icon != '' || !is_null($item->translate($lang)->icon))
                                        <input type="hidden" name="benefit[{{$key}}][old_icon]" value="{{ cloudekaBucketLocalUrl($item->translate($lang)->icon) }}">
                                        <img src="{{ cloudekaBucketLocalUrl($item->translate($lang)->icon) }}" class="img-responsive"  style="width: 630px">
                                    @endif
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                    </div>

                    @endforeach
                @endif

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="javascript:void(0)" class="btn btn-info" id="add_benefit" style="float: right;">Add Benefit</a>
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
            var languages = {!! json_encode($languages) !!};
            var i
            bsCustomFileInput.init()
            $(".select2").select2()
            $('#languages').focus(function(){
                prev_val = $(this).val();
            }).on('change', function() {
                url = '{{env('APP_URL')}}'+'/admin/product/'+{{$product->id}}+'/edit?lang='+this.value
                selectorDeleted = $(this);
                Swal.fire({
                    title: "Apa anda yakin?",
                    text: "Mungkin ada perubahan yang belum di disimpan anda yakin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Pindahkan!'
                }).then((result)=> {
                    if (result.value===true) {
                        window.location.href = url
                    }else{
                        $(this).val(prev_val)
                    }
                });
            });
            textareas = []
            textareas.push('description');
            textareas.push('partner_description');
            let partner = $(".partner").length;
            let cases = $(".case").length;
            let benefit = $(".benefit").length;
            for (i = 0; i < cases; i++) {
                textareas.push('case_description_'+i)
            }
            for (i = 0; i < benefit; i++) {
                textareas.push('benefit_description_'+i)
            }
            textareas.forEach(element => {
                CKEditorChange(element)
            });

            $(`#add_partner`).click(function(){
                var partners = {!! json_encode($partners->toArray()) !!};
                select_partner = mappingSelectPartners(partners)
                let html = '<div class="form-group row partner">'
                                +'<div class="col-sm-11">'
                                    +'<select class="form-control select2" style="width: 100%;" id="area" name="partner[]">'
                                        +'<option selected value="0">Select Partner</option>'
                                        +select_partner
                                    +'</select>'
                                +'</div>'
                                +'<div class="col-sm-1">'
                                    +'<button type="button" class="delete-partner btn btn-danger float-right" data-index="0">X</button>'
                                +'</div>'
                            +'</div>';
                $(`#partner_wrapper`).append(html);

                $(".select2").select2()
                partner++;
            });

            $(`#add_case`).click(function(){
                var use_cases = {!! json_encode($use_cases->toArray()) !!};
                var clients = {!! json_encode($clients->toArray()) !!};
                select_case = mappingSelectUseCase(use_cases);
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
                            +'                <option selected value="0">Select Use Case</option>'
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

                $(`#case_wrapper`).append(html);
                CKEditorChange(`case_description_${cases}`)
                $(".select2").select2()

                cases++;
            });

            $(`#add_benefit`).click(function(){
                let html = '<div class="card card-default border border-dark benefit">'
                                +'<div class="card-header border-0 p-0 m-0">'
                                +'    <button type="button" class="delete-benefit btn btn-danger float-right" data-index="0">X</button>'
                                +'</div>'
                                +'<div class="card-body">'
                                +'      <div class="form-group row">'
                                +'          <label for="inputEmail3" class="col-sm-2 control-label">Title</label>'
                                +'          <div class="col-sm-10">'
                                +'              <input type="hidden" value="0" name="benefit['+benefit+'][benefit_id]">'
                                +'              <input type="text" class="form-control" placeholder="Title" name="benefit['+benefit+'][title]">'
                                +'        </div>'
                                +'    </div>'
                                +'    <div class="form-group row">'
                                +'        <label for="inputEmail3" class="col-sm-2 control-label">Description</label>'
                                +'        <div class="col-sm-10">'
                                +'            <textarea  name="benefit['+benefit+'][description]" id="benefit_description_'+benefit+'"></textarea>'
                                +'        </div>'
                                +'    </div>'
                                +'    <div class="form-group row mb-4">'
                                +'        <label for="inputEmail3" class="col-sm-2 control-label">Client</label>'
                                +'        <div class="col-sm-10">'
                                +'             <div class="custom-file">'
                                +'                   <input type="file" class="custom-file-input" name="benefit['+benefit+'][icon]">'
                                +'                   <label class="custom-file-label">Choose file</label>'
                                +'             </div>'
                                +'       </div>'
                                +'    </div>'
                                +'</div>'
                            +'</div>';

                $(`#benefit_wrapper`).append(html);

                CKEditorChange(`benefit_description_${benefit}`)
                bsCustomFileInput.init()
                benefit++;
            });


			$(document).on("click", ".delete-partner", function(){
				$(this).parent().parent().remove();
			});

			$(document).on("click", ".delete-case", function(){
				$(this).parent().parent().remove();
				$(".case").each(function(index){
                    $(this).find('.name').attr('name', 'prices['+cases+'][key]');
                    $(this).find('.value').attr('name', 'prices['+cases+'][value]');
                });
			});

			$(document).on("click", ".delete-benefit", function(){
				$(this).parent().parent().remove();
			});

            function CKEditorChange(name){
                CKEDITOR.replace(name,{
                    extraPlugins: 'codesnippet',
                    removePlugins : 'cloudservices',
                });
            }

            function mappingSelectPartners(data){
                var select = null
                data.forEach(element => {
                    select+=`<option value="${element.id}">${element.name}</option>`;
                });
                return select
            }

            function mappingSelectUseCase(data){
                var select = null
                data.forEach(element => {
                    console.log(element);
                    select+=`<option value="${element.id}">${element.client.name} - ${element.description}</option>`;
                });
                return select
            }

            function mappingSelect(data){
                var select = null
                data.forEach(element => {
                    select+=`<option value="${element.id}">${element.name??element.title}${element.description??''}</option>`;
                });
                return select
            }
		});
    </script>
@endpush
