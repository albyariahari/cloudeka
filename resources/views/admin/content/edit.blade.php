@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
    @php
        $lang = app('request')->get('lang','en');
    @endphp
	<form action="{{route('admin.content.update',[$contentable->slug,$content_setting->id,$content->id])}}" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">
		@csrf
        @method('PUT')
        <input type="hidden" name="contentable_id" value="{{$content_setting->contentable_id}}">
        <input type="hidden" name="contentable_type" value="{{$content_setting->contentable_type}}">
        <span class="form-button"><a href="{{url()->previous()}}" class="btn btn-secondary pull-right">Back</a><button type="submit" class="btn btn-success pull-right create">Update</button></span>
        <select class="form-control" id="languages" style="width: 5%;margin-bottom: 20px;" name="lang">
            @foreach ($languages as $item)
            <option value="{{$item}}" {{$lang === $item ? 'selected':''}}>{{strtoupper($item)}}</option>
            @endforeach
        </select>
        @include('layouts.session')
      	<!-- Default box -->
      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">General Info</h3>
			</div>
      		<div class="card-body">

                @if($content_setting->field_title)
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{$content_setting->field_title_label}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="{{$content_setting->field_title_label}}" value="{{ old('title',$content->translate($lang)->title)}}" name="title">
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>
                    </div>
                @endif

                @if($content_setting->field_subtitle)
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{$content_setting->field_subtitle_label}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="{{$content_setting->field_subtitle_label}}" value="{{ old('subtitle',$content->translate($lang)->subtitle)}}" name="subtitle">
                            <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                        </div>
                    </div>
                @endif

                @if($content_setting->field_excerpt && $content_setting->id === 4)
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{$content_setting->field_excerpt_label}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="{{$content_setting->field_excerpt_label}}" value="{{ old('excerpt',$content->translate($lang)->excerpt)}}" name="excerpt">
                            <span class="text-danger">{{$errors->first('excerpt')}}</span>
                        </div>
                    </div>
                @elseif($content_setting->field_excerpt)
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{$content_setting->field_excerpt_label}}</label>
                        <div class="col-sm-10">
                            <textarea id="editor0" name="excerpt" rows="10" cols="80" class="form-control">{{old('excerpt',$content->translate($lang)->excerpt)}}</textarea>
                            <span class="text-danger">{{$errors->first('excerpt')}}</span>
                        </div>
                    </div>
                @endif

                @if($content_setting->field_description)
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{$content_setting->field_description_label}}</label>
                        <div class="col-sm-10">
                            <textarea id="editor2" name="description" rows="10" cols="80">{{ old('description',$content->translate($lang)->description) }}</textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>
                    </div>
                @endif
                @if($content_setting->field_cta)
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{$content_setting->field_cta_label}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Call To Action Label" value="{{old('cta_label',$content->translate($lang)->cta_label)}}" name="cta_label">
                            <span class="text-danger">{{ $errors->first('cta_label') }}</span>
                        </div>
                    </div>
                @endif
                @if ($content_setting->id === 4)
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputEmail3" placeholder="created" value="{{old('created_at', \Carbon\Carbon::parse($content->translate($lang)->created_at)->format('Y-m-d'))}}" name="created_at">
                        <span class="text-danger">{{ $errors->first('created_at') }}</span>
                    </div>
                </div>
                @endif
                @if ($content_setting->field_video_1)
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">{{$content_setting->field_video_1_label}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Call To Action Link" value="{{old('video_1',$content->translate($lang)->video_1)}}" name="video_1">
                            <span class="text-danger">{{ $errors->first('video_1') }}</span>
                        </div>
                    </div>
                @endif
                @if ($content_setting->field_image_1)
                    <div class="form-group row">
                        <label for="exampleInputFile" class="col-sm-2 control-label">{{$content_setting->field_image_1_label}}</label>
                        <div class="col-sm-5">
                            <input type="file" name="image_1">
                            <p class="help-block">Example block-level help text here.</p>
                            <span class="text-danger">{{ $errors->first('image_1') }}</span>
                        </div>
                        <div class="col-sm-5">
                            @if($content->translate($lang)->image_1 != '' || !is_null($content->translate($lang)->image_1))
                                <img src="{{ cloudekaBucketLocalUrl($content->translate($lang)->image_1) }}" class="img-responsive">
                            @endif
                        </div>
                    </div>
                @endif
                @if ($content_setting->field_image_2)
                    <div class="form-group row">
                        <label for="exampleInputFile" class="col-sm-2 control-label">{{$content_setting->field_image_2_label}}</label>
                        <div class="col-sm-5">
                            <input type="file" name="image_2">
                            <p class="help-block">Example block-level help text here.</p>
                            <span class="text-danger">{{ $errors->first('image_2') }}</span>
                        </div>
                        <div class="col-sm-5">
                            @if($content->image_2 != '' || !is_null($content->translate($lang)->image_2))
                                <img src="{{ cloudekaBucketLocalUrl($content->translate($lang)->image_2) }}" class="img-responsive">
                            @endif
                        </div>
                    </div>
                @endif
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
    $(function () {
        $('#languages').focus(function(){
            prev_val = $(this).val();
        }).on('change', function() {
            url = '{{env('APP_URL')}}/admin/{{$contentable->slug}}/{{$content_setting->id}}/content/{{$content->id}}/edit?lang='+this.value
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
       // Replace the <textarea id="editor1"> with a CKEditor
       // instance, using default configuration.
       CKEDITOR.replace('editor2');
     });
</script>
@endpush
