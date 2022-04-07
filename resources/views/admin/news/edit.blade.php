@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
	<form action="{{route('admin.news.update',$news->id)}}" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">
		@csrf
        @method('PUT')
        <span class="form-button">
			<a href="{{ route('admin.news.index') }}" class="btn btn-secondary pull-right">Back</a>
			<button type="submit" class="btn btn-success pull-right create">Update</button>
		</span>
        <select class="form-control" id="languages" style="width: 5%;margin-bottom: 20px;" name="language">
            @foreach ($languages as $item)
            <option value="{{$item}}" {{old('language',$lang) === $item ? 'selected':''}}>{{strtoupper($item)}}</option>
            @endforeach
        </select>
        <input type="hidden" value="{{ $news->type }}" name='type'>
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
                        <select class="form-control select2" name="news_category_id">
                            <option value="0">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{ (int)old('news_category_id',$news->Category->id) === $category->id ? 'selected="selected"' : ''}}>{{$category->translate($lang)->title}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('news_category_id') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="type">
                            <option>Select Type</option>
                            <option value="news" {{ old('type',$news->type) === 'news' ? 'selected="selected"' : ''}}>News</option>
                            <option value="event" {{ old('type',$news->type) === 'event' ? 'selected="selected"' : ''}}>Event</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('type') }}</span>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Title" value="{{ old('title',$news->translate($lang)->title)}}" name='title'>
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                </div>

                @if ($news->type === 'event')

                    <x-inputs name="start_date" type="date" placeholder="dd/mm/yyyy" :old="$news->start_date !== null ? date('d/m/Y', strtotime($news->start_date)):''" note="Required, If type event" />
                    <x-inputs name="end_date" type="date" placeholder="dd/mm/yyyy" :old="$news->end_date !== null ? date('d/m/Y', strtotime($news->end_date)):''" note="Required, If type event, After Start Date" />

                @endif

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Summary</label>
                    <div class="col-sm-10">
                        <textarea name="summary" rows="3" cols="80" class="form-control">{!! old('summary',$news->translate($lang)->summary) !!}</textarea>
                        <span class="text-danger">{{ $errors->first('summary') }}</span>
                    </div>
                </div>

                <div class="form-group d-none row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Short Description</label>
                    <div class="col-sm-10">
                        <textarea name="short_description" rows="3" cols="80" class="form-control">{{old('short_description',$news->translate($lang)->short_description)}}</textarea>
                        <span class="text-danger">{{ $errors->first('short_description') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea  name="description" id="description">{!! old('description',$news->translate($lang)->description) !!}</textarea>
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Outer Thumbnail</label>
                    <div class="col-sm-5">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="outer_thumbnail">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        @if ($news->translate($lang)->outer_thumbnail != '' || !is_null($news->translate($lang)->outer_thumbnail))
                            <img src="{{ cloudekaBucketLocalUrl($news->translate($lang)->outer_thumbnail) }}" class="img-responsive"  style="width: 350px !important">
                        @endif
                    </div>
                </div>

                <div class="form-group d-none row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Inner Thumbnail</label>
                    <div class="col-sm-5">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="inner_thumbnail">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        @if ($news->translate($lang)->inner_thumbnail != '' || !is_null($news->translate($lang)->inner_thumbnail))
                            <img src="{{ cloudekaBucketLocalUrl($news->translate($lang)->inner_thumbnail) }}" class="img-responsive"  style="width: 350px !important">
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tags</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Tags" value="{{ old('tags',$news->Tags)}}" name="tags">
                        <span class="text-danger">{{ $errors->first('tags') }}</span>
                    </div>
                </div>
      		</div>
      		<!-- /.card-body -->

        </div>
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">SEO Metadata Info</h3>
            </div>
            <div class="card-body">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Title" value="{{ old('meta_title',$news->translate($lang)->meta_title)}}" name='meta_title'>
                        <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Keyword</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="meta_keyword" placeholder="Keyword" rows="3">{{ old('meta_keyword',$news->translate($lang)->meta_keyword) }}</textarea>
                        <span class="text-danger">{{ $errors->first('meta_keyword') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="meta_description" placeholder="Description" rows="3">{{ old('meta_description',$news->translate($lang)->meta_description) }}</textarea>
                        <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

      </div>

        <!-- /.card-footer -->
      	<!-- /.box -->
	</form>
    <!-- /.card-body -->
<!-- /.box -->
@stop

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/3.13.0/tagify.min.css">
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@3.14.1/dist/tagify.min.js" integrity="sha256-xjd0RtbL6sXRQ6uHWVgSgR3ZuFMdr/EPkgvzbE0LkFA=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('change', '.custom-file-input', function (event) {
                $(this).next('.custom-file-label').html(event.target.files[0].name);
            })
            $(".select2").select2()
            CKEDITOR.replace('description',{
                extraPlugins: ["codesnippet","colorbutton", "image"],
                filebrowserUploadMethod : 'form',
                filebrowserUploadUrl: "/admin/upload-ckeditor"
            });

            $('input#start_date').datepicker({
                "autoclose": true,
                "format": "dd/mm/yyyy",
                "startDate": "+0d"
            });

            $('input#end_date').datepicker({
                "autoclose": true,
                "format": "dd/mm/yyyy",
                "startDate": "+1d"
            });

            var tags = @json($tags);

            var inputElm = document.querySelector('input[name=tags]'),
                whitelist = tags;

                // initialize Tagify on the above input node reference
            var tagify = new Tagify(inputElm, {
                // enforceWhitelist: true,
                editTags:false,
                whitelist: inputElm.value.trim().split(/\s*,\s*/) // Array of values. stackoverflow.com/a/43375571/104380
            })

            tagify.on('input', function onInput(e){
                tagify.settings.whitelist.length = 0; // reset current whitelist
                tagify.loading(true).dropdown.hide.call(tagify) // show the loader animation

                // get new whitelist from a delayed mocked request (Promise)
                mockAjax()
                    .then(function(result){
                        // replace tagify "whitelist" array values with new values
                        // and add back the ones already choses as Tags
                        tagify.settings.whitelist.push(...result, ...tagify.value)

                        // render the suggestions dropdown.
                        tagify.loading(false).dropdown.show.call(tagify, e.detail.value);
                    })
            })

            var mockAjax = (function mockAjax(){
                var timeout;
                return function(duration){
                    clearTimeout(timeout); // abort last request
                    return new Promise(function(resolve, reject){
                        timeout = setTimeout(resolve, duration || 700, whitelist)
                    })
                }
            })()
        });
    </script>
@endpush
