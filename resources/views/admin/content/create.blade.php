@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
	<form action="{{route('admin.content.store',[$contentable->slug,$content_setting->id])}}" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">
		@csrf
        <input type="hidden" name="contentable_id" value="{{$content_setting->contentable_id}}">
        <input type="hidden" name="contentable_type" value="{{$content_setting->contentable_type}}">
        <span class="form-button"><a href="{{url()->previous()}}" class="btn btn-secondary pull-right">Back</a><button type="submit" class="btn btn-success pull-right create">Create</button></span>
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
                            <input type="text" class="form-control" placeholder="{{$content_setting->field_title_label}}" value="{{ old('title')}}" name="title">
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>
                    </div>
                @endif

                @if($content_setting->field_subtitle)
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{$content_setting->field_subtitle_label}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="{{$content_setting->field_subtitle_label}}" value="{{ old('subtitle')}}" name="subtitle">
                            <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                        </div>
                    </div>
                @endif

                @if($content_setting->field_excerpt && $content_setting->id === 4)
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{$content_setting->field_excerpt_label}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="{{$content_setting->field_excerpt_label}}" value="{{ old('excerpt')}}" name="excerpt">
                            <span class="text-danger">{{$errors->first('excerpt')}}</span>
                        </div>
                    </div>
                @elseif($content_setting->field_excerpt)
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{$content_setting->field_excerpt_label}}</label>
                        <div class="col-sm-10">
                            <textarea id="editor0" name="excerpt" rows="10" cols="80" class="form-control">{{old('excerpt')}}</textarea>
                            <span class="text-danger">{{$errors->first('excerpt')}}</span>
                        </div>
                    </div>
                @endif

                @if($content_setting->field_description)
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{$content_setting->field_description_label}}</label>
                        <div class="col-sm-10">
                            <textarea id="editor2" name="description" rows="10" cols="80">{{ old('description') }}</textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>
                    </div>
                @endif
                @if($content_setting->field_cta)
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{$content_setting->field_cta_label}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Call To Action Label" value="{{old('cta_label')}}" name="cta_label">
                            <span class="text-danger">{{ $errors->first('cta_label') }}</span>
                        </div>
                    </div>
                @endif
                @if ($content_setting->id === 4)
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputEmail3" placeholder="created" value="{{old('created_at', \Carbon\Carbon::now()->format('Y-m-d'))}}" name="created_at">
                        <span class="text-danger">{{ $errors->first('created_at') }}</span>
                    </div>
                </div>
                @endif
                @if ($content_setting->field_video_1)
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">{{$content_setting->field_video_1_label}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Call To Action Link" value="{{old('video_1')}}" name="video_1">
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
       // Replace the <textarea id="editor1"> with a CKEditor
       // instance, using default configuration.
       CKEDITOR.replace('editor2');
     });
</script>
@endpush
