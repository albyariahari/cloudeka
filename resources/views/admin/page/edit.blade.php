@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
    <select class="form-control" id="languages" style="width: 5%;margin-bottom: 20px;" name="language">
	@foreach ($languages as $item)
        <option value="{{ $item }}" {{$lang === $item ? 'selected' : ''}}>{{ strtoupper($item) }}</option>
	@endforeach
    </select>
    @foreach ($pages->Sections as $section)
        @if($section->type == 'content' || $section->type == 'featured' )
            <form class="form-horizontal" method="POST" id="form_{{$loop->index}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" class="id" value="{{$section->id}}">
                <input type="hidden" name="lang" value="{{$lang}}">
                <div class="card card-default">
                    <div class="card-header with-border">
                        <h3 class="card-title">{{$section->name}}</h3>
                        <span class="float-right">{{$loop->index}}</span>
                    </div>
                    <div class="card-body">
                        @if ($section->field_title)
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Title" value="{{$section->translate($lang)->title}}" name="title">
                                    <span class="text-danger error_title"></span>
                                </div>
                            </div>
                        @endif
                        @if ($section->field_subtitle)
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Subtitle</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Title" value="{{$section->translate($lang)->subtitle}}" name="subtitle">
                                    <span class="text-danger error_subtitle"></span>
                                </div>
                            </div>
                        @endif
                        @if ($section->field_description)
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea id="editor{{$loop->index}}" name="description" rows="10" cols="80">{{$section->translate($lang)->description}}</textarea>
                                    <span class="text-danger error_description"></span>
                                </div>
                            </div>
                        @endif
                        @if ($section->field_link_title_1)
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Link Title 1</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Link Title 1" value="{{$section->translate($lang)->link_title_1}}" name="link_title_1">
                                    <span class="text-danger error_link_title_1"></span>
                                </div>
                            </div>
                        @endif
                        @if ($section->field_link_url_1)
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Link URL 1</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Link URL 1" value="{{$section->translate($lang)->link_url_1}}" name="link_url_1">
                                    <span class="text-danger error_link_url_1"></span>
                                </div>
                            </div>
                        @endif
                        @if ($section->field_link_title_2)
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Link Title 1</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Link Title 2" value="{{$section->translate($lang)->link_title_2}}" name="link_title_2">
                                    <span class="text-danger error_link_title_2"></span>
                                </div>
                            </div>
                        @endif
                        @if ($section->field_link_url_2)
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Link URL 2</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Link URL 2" value="{{$section->translate($lang)->link_url_2}}" name="link_url_2">
                                    <span class="text-danger error_link_url_2"></span>
                                </div>
                            </div>
                        @endif
                        @if ($section->field_cta)
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Call To Action Label</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Call To Action Label" value="{{$section->translate($lang)->cta_label}}" name="cta_label">
                                    <span class="text-danger error_cta_label"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Call To Action URL</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Call To Action Link" value="{{$section->translate($lang)->cta}}" name="cta">
                                    <span class="text-danger error_cta"></span>
                                </div>
                            </div>
                        @endif
                        @if ($section->field_video_1)
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Youtube Video URL</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Call To Action Link" value="{{$section->translate($lang)->video_1}}" name="video_1">
                                    <span class="text-danger error_video_1"></span>
                                </div>
                            </div>
                        @endif
                        @if ($section->field_image_1)
                            <div class="form-group row">
                                <label for="exampleInputFile" class="col-sm-2 control-label">Image 1</label>
                                <div class="col-sm-5">
                                    <input type="hidden" name="old_image_1" value="{{$section->translate($lang)->image_1}}">
                                    <input type="file" name="image_1">
                                    <p class="help-block">Example block-level help text here.</p>
                                    <span class="text-danger error_image_1"></span>
                                </div>
                                <div class="col-sm-5">
                                    @if($section->translate($lang)->image_1 != '' || !is_null($section->translate($lang)->image_1))
                                        <img src="{{ cloudekaBucketLocalUrl($section->translate($lang)->image_1) }}" class="img-responsive">
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if ($section->field_image_2)
                            <div class="form-group row">
                                <label for="exampleInputFile" class="col-sm-2 control-label">Image 2</label>
                                <div class="col-sm-5">
                                    <input type="hidden" name="old_image_2" value="{{$section->translate($lang)->image_2}}">
                                    <input type="file" name="image_2">
                                    <p class="help-block">Example block-level help text here.</p>
                                    <span class="text-danger error_image_2"></span>
                                </div>
                                <div class="col-sm-5">
                                    @if($section->image_2 != '' || !is_null($section->translate($lang)->image_2))
                                        <img src="{{ cloudekaBucketLocalUrl($section->translate($lang)->image_2) }}" class="img-responsive">
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if(!is_null($section->featured_module))
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Featured {{$section->featured_module}}</label>
                                <div class="col-sm-10">
                                    <a href="{{ '/admin/'.$section->featured_module_action}}" class="btn btn-success" target="_blank">Go to {{$section->featured_module}} module</a>
                                </div>
                            </div>
                        @endif
						
						@if(!is_null($section->other_field))
							@foreach (json_decode($section->other_field, true) as $field)
								@php
									$other = json_decode($section->others, true);
								@endphp
							
                            <div class="form-group row">
								{{ Form::label("others[{$field['field']}]", $field['label'], ['class' => 'col-sm-2 control-label']) }}
                                <!--- <label class="col-sm-2 control-label">Call To Action Label</label> --->
                                <div class="col-sm-10">
									{{ Form::textarea("others[{$field['field']}]", $other[$field['field']] ?? '', [
										'class' => 'form-control', 
										'placeholder' => $field['label'], 
									]) }}
                                    <!--- <input type="text" class="form-control" placeholder="Call To Action Label" value="{{$section->translate($lang)->cta_label}}" name="cta_label"> --->
                                    <span class="text-danger error_{{ "others[{$field['field']}]" }}"></span>
                                </div>
                            </div>
							@endforeach
						@endif
                    </div>
                    @if($section->type != 'featured')
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info float-right update" data-id="{{$loop->index}}" id="update_form_{{$loop->index}}">Update</button>
                        </div>
                    @endif
                </div>
            </form>
        @elseif ($section->type == 'metadata')
            <form class="form-horizontal" method="POST" id="form_{{$loop->index}}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" class="id" value="{{$section->id}}">
                <input type="hidden" name="lang" value="{{$lang}}">
                <div class="card card-default">
                    <div class="card-header with-border">
                        <h3 class="card-title">SEO Metadata</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Meta Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Meta Title" value="{{$section->translate($lang)->title}}" name="title">
                                <span class="text-danger error_title"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Meta Keyword</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Meta Keyword" value="{{$section->translate($lang)->subtitle}}" name="subtitle">
                                <span class="text-danger error_subtitle"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Meta Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputEmail3" placeholder="Meta Description" name="description">{{$section->translate($lang)->description}}</textarea>
                                <span class="text-danger error_description"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info float-right update" data-id="{{$loop->index}}" id="update_form_{{$loop->index}}">Update</button>
                    </div>
                </div>
            </form>
        @endif
    @endforeach
    <!-- /.card-body -->
<!-- /.box -->
@stop

@push('js')
    <script type="text/javascript">
        $(function(){
            $('#languages').focus(function(){
                prev_val = $(this).val();
            }).on('change', function() {
                url = '/admin/page/' + {{$pages->id}} + '/edit?lang='+this.value
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

            @foreach ($pages->Sections as $section)
		    	@if($section->field_description && $section->type == 'content')
		    		CKEDITOR.replace('editor<?=$loop->index?>', {
		    			extraPlugins: ["colorbutton", "image"],
		    			filebrowserUploadMethod : 'form',
		    			filebrowserUploadUrl: "/admin/upload-ckeditor"
		    		});
		    	@endif
		    @endforeach

            $(".update").click(function(e){
                e.preventDefault();

		    	for ( instance in CKEDITOR.instances )
        			CKEDITOR.instances[instance].updateElement();

                let key = $(this).data('id');
		    	let form = $("#form_"+key);
		    	let id = form.find('.id').val();

                form.find('.text-danger').html("");
		    	let formData = new FormData(form[0]);

                $("#loader-screen").show();

                $.ajax({
                    type: "POST",
                    url: "/admin/page/" + id,
                    data: formData,
		    		processData: false,
		    		contentType: false,
                    success: function (data) {
                        console.log("here");
                        Swal.fire({
                            title: data.message,
                            icon: data.type
                        });
                    },
                    error: function(jqXhr){
						console.log(jqXhr.responseJSON);
		    			response = $.parseJSON(jqXhr.responseText);

		    			for (let error in response.errors){
		    				form.find('.error_'+error).html(response.errors[error]);
		    			}
		    			$("#loader-screen").hide();
                        Swal.fire({
                            title: response.message,
                            icon: response.type
                        })
		    		}
                });

                return false;
            });
        });
    </script>
@endpush

