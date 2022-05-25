@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop
@push('css')
<link rel="stylesheet" href="/vendor/editor.md/css/editormd.min.css" />
@endpush

@section('content')
	<template id="tmp-sub">
		<div id="" class="card-body" style="padding-bottom: 0%; padding-left: 1%; padding-right: 1%; padding-top: 1%;" data-level="" data-parent="">
			<div class="card card-default">
				<div class="card-header with-border">
					<h3 class="card-title"></h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-plus"></i>
						</button>
						<button type="button" class="btn btn-tool delete-sub" data-id="" data-url="">
							<i class="fas fa-times"></i>
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="card card-default">
						<div class="card-header with-border">
							<h3 class="card-title">General Info</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="form-group row">
								{{ Form::label('title_sub', 'Title', ['class' => 'col-sm-2 control-label']) }}
								<div class="col-sm-10">
									{{ Form::text('title_sub', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
									<span class="text-danger">{{ $errors->first('title') }}</span>
								</div>
							</div>
							<div class="form-group row">
								{{ Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) }}
								<div class="col-sm-10">
								<div class="editor">
									<textarea></textarea>
								</div>
									<span class="text-danger">{{ $errors->first('description') }}</span>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<a href="javascript:void(0)" class="btn btn-info add-sub" style="float: right;" data-id="" data-level="" data-parent="">Add Sub Section</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</template>
	
	<form id="form" action="{{ route('admin.documentations.update', $content->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		@csrf
		@method('PUT')
        <span class="form-button">
			<a href="{{ route('admin.documentations.index') }}" class="btn btn-secondary pull-right">Back</a>
			<button id="submit" type="submit" class="btn btn-success pull-right create">Update</button>
		</span>
        <select id="languages" name="lang" class="form-control" style="width: 10%; margin-bottom: 20px;">
            @foreach ($languages as $val)
            <option value="{{ $val }}" {{ $lang === $val ? 'selected' : '' }}>{{ strtoupper($val) }}</option>
            @endforeach
        </select>
        @include('layouts.session')
      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">General Info</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
      		<div class="card-body">
                <div class="form-group row">
					{{ Form::label('product', 'Product', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						<select id="product" name="product" class="form-control">
							<option value="">Select Product</option>
						@foreach ($products as $pro)
							<option value="{{ $pro->id }}" {{ $content->product_id === $pro->id ? 'selected' : '' }}>{!! $pro->translate($lang)->title !!}</option>
						@endforeach
						</select>
                        <span class="text-danger">{{ $errors->first('product') }}</span>
                    </div>
                </div>
                <div class="form-group row">
					{{ Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::text('name', old('name', $content->translate($lang)->name), ['class' => 'form-control', 'placeholder' => 'Name']) }}
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                </div>
                <div class="form-group row">
					{{ Form::label("title-{$content->id}", 'Title', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::text("title-{$content->id}", old("title-{$content->id}", $content->translate($lang)->title), ['class' => 'form-control title', 'placeholder' => 'Title']) }}
                        <span class="text-danger">{{ $errors->first("title-{$content->id}") }}</span>
                    </div>
                </div>
                <div class="form-group row">
					{{ Form::label("desc-{$content->id}", 'Description', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						<div class="editor" data-id="{{$content->id}}" id="editor-{{$content->id}}">
							{{ Form::textarea("desc-{$content->id}", old("desc-{$content->id}", $content->translate($lang)->description), ['class' => 'desc']) }}
						</div>
                        <span class="text-danger">{{ $errors->first("desc-{$content->id}") }}</span>
                    </div>
                </div>
                <div class="form-group row">
					{{ Form::label('file', 'File', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::file('file', ['class' => 'form-control']) }}
						@if ($content->translate($lang)->file)
						<a href="{{ $content->translate($lang)->file }}" target="_blank">Open file in new tab</a>
						@endif
                        <span class="text-danger">{{ $errors->first('file') }}</span>
                    </div>
                </div>
				<div class="form-group row">
					{{ Form::label('publish_at', 'Publish At', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						<input id="publish_at" type="datetime-local" value="{{ old('publish_at', \Carbon\Carbon::parse($content->publish_at)->format('Y-m-d\Th:m')) }}" class="form-control" placeholder="Publish At" min="{{ \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d\TH:m') }}">
                        <span class="text-danger">{{ $errors->first('publish_at') }}</span>
                    </div>
                </div>
      		</div>
      	</div>
      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">SEO Metadata</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
      		<div class="card-body">
                <div class="form-group row">
					{{ Form::label('meta_title', 'Meta Title', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::text('meta_title', old('meta_title', $content->translate($lang)->meta_title), ['class' => 'form-control', 'placeholder' => 'Meta Title']) }}
                        <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                    </div>
                </div>
                <div class="form-group row">
					{{ Form::label('meta_keywords', 'Meta Keywords', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::text('meta_keywords', old('meta_keywords', $content->translate($lang)->meta_keywords), ['class' => 'form-control', 'placeholder' => 'Meta Keywords']) }}
                        <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                    </div>
                </div>
                <div class="form-group row">
					{{ Form::label('meta_description', 'Meta Description', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::textarea('meta_description', old('meta_description', $content->translate($lang)->meta_description), ['class' => 'form-control', 'placeholder' => 'Meta Description', 'cols' => 50, 'rows' => 5]) }}
                        <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                    </div>
                </div>
      		</div>
      	</div>
		<div class="card card-default">
			<div class="card-header with-border">
				<h3 class="card-title">Sub-Sections</h3>
				<div class="card-tools">
					<a href="/admin/documentations/{{ $content->id }}/sort" class="btn btn-primary mr-3">
						Sort content
					</a>
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
			
		@if ($content->childsRec->count())
			@foreach ($content->childsRec as $child)
				@include('admin.documentations.subsection', ['content' => $child])
			@endforeach
		@endif
		
			<div class="card-footer">
				<a href="javascript:void(0)" class="btn btn-info add-sub" style="float: right;" data-id="{{ $content->id }}" data-level="{{ $content->level }}">Add Sub Section</a>
			</div>
		</div>
	</form>
@stop

@push('js')

<script src="/vendor/editor.md/editormd.min.js"></script>
<script src="/vendor/editor.md/languages/en.js"></script>

<script>
	var testEditor;
    function DeleteSub(url) {
        $.ajax({
            "type": "DELETE", 
            "dataType": "JSON", 
            "url": url, 
            "headers": {
				"X-CSRF-TOKEN": "{{ csrf_token() }}"
            }, 
            "success": function (response, textStatus, jqXHR) {
				console.log(response.message);
            }, 
            "error": function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR.responseJSON);
            }
        });
    }
	
	function CloneBasic(tempID) {
		return $($(`#${tempID}`).clone().html());
	}
	
	function CloneSubsection(tempID, parentID, level, counter) {
		let elem = CloneBasic(tempID), 
			padding = (level + 1) * 2;
			
		elem.attr({
			"data-level": level + 1, 
			"data-parent": parentID, 
			"id": `n-${counter}`
		});
		elem.css('padding-left', `${padding}%`);
		elem.find('button.delete-sub').attr('data-id', `n-${counter}`);
		elem.find('h3.card-title').eq(0).append($('<span>', {
			"text": `New Sub-Section ${counter}`
		}));
		elem.find('input[type=text]').prop('id', `title-n-${counter}`);
		elem.find('.editor').prop('id', `editor-n-${counter}`);
		elem.find('.editor textarea').prop('id', `desc-n-${counter}`);
		elem.find('a.add-sub').attr({
			"data-id": `n-${counter}`, 
			"data-level": level + 1, 
			"data-parent": parentID
		});
		
		return elem;
	}
	
	function RecursiveGetData(formData, index, elem, prefix) {
		elem = $(elem);
		
		let subs = $(`div[data-parent=${elem.prop('id')}]`), 
			id = elem.prop('id');
		console.log(id);
		formData.append(`${prefix}[${index}][description]`, $(`#desc-${id}`).val());
		formData.append(`${prefix}[${index}][id]`, id);
		formData.append(`${prefix}[${index}][lang]`, $('#languages').val());
		formData.append(`${prefix}[${index}][title]`, $(`#title-${id}`).val());
		
		$.each(subs, function (idx, val) {
			RecursiveGetData(formData, idx, val, `${prefix}[${index}][subs]`);
		});
	}
	
	function RecursiveRemoval(id) {
		let elem = $(`div#${id}`), 
			url = elem.find('button.delete-sub').data('url');
		
		if (url !== '')
			DeleteSub(url);
		
		$.each($(`div[data-parent=${id}]`), function (idx, val) {
			RecursiveRemoval(val.id);
		});
		
		elem.remove();
	}
	
	function Submit(formData) {
		$.ajax({
			"type": "POST", 
			"dataType": "JSON", 
			"data": formData, 
			"url": "{{ route('admin.documentations.ajax.update-all', $content->id) }}", 
			"headers": {
				"X-CSRF-TOKEN": "{{ csrf_token() }}"
			}, 
			"processData": false, 
			"contentType": false, 
			"cache": false, 
			"success": function(response, textStatus, jqXHR) {
				Swal.fire({
					"title": response.message, 
					"type": "success"
				}).then(function () {
					window.location.href = '{{ route('admin.documentations.edit', $content->id) }}?lang=' + $('#languages').val();
				});
			}, 
			"error": function (jqXHR, textStatus, errorThrown) {
				Swal.fire({
					"title": jqXHR.responseJSON.message, 
					"type": "error"
				}).then(function () {
					$('#button').empty().prop('disabled', false).append('Create');
					console.log(jqXHR.responseJSON);
				});
			}
		});
	}
	
	function ToggleTitleColor(divID, color) {
		let title = $(`div#${divID}`).find('h3').first().find('span');
		
		title.css('color', color);
	}
	
	$(document).ready(function () {
		const __doc = $(this), 
			  __tmpSub = 'tmp-sub';
		
		let _cnt = 1, 
			_arr = [];
		
		$.each($('input.title'), function (idx, val) {
			_arr[val.id] = val.value;
		});
		
		$.each($('.editor'), function (idx, val) {
			let id = $(this).data('id');
			editormd("editor-"+id, {
				width   : "100%",
				height  : 500,
				path : "/vendor/editor.md/lib/",
				imageUpload    : true,
				imageFormats   : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
				imageUploadURL : "/admin/documentations/upload?_token={{ csrf_token() }}",
			});
		});
		
		const __old = _arr;
		
		__doc.on('keydown keyup change', 'input.title', function () {
			let t = $(this), 
				id = t.prop('id'), 
				arr = id.split('-');
			
			if (arr.length === 2) {
				let color = t.val() !== __old[id] ? 'blue' : 'black';
				
				ToggleTitleColor(arr[1], color);
			}
		});
		
		__doc.on('click', 'a.add-sub', function () {
			let t = $(this), 
				id = t.data('id'), 
				level = t.data('level'), 
				sub = CloneSubsection(__tmpSub, id, level, _cnt);
			
			if (level === 0) {
				t.parent().before(sub);
			} else {
				let siblings = $(`div[data-parent=${id}]`);
					
				if (siblings.length)
					siblings.last().after(sub);
				else
					$(`div#${id}`).after(sub);
			}
			
			// CKEDITOR.replace(`desc-n-${_cnt++}`, __CKEprop);
			editormd(`editor-n-${_cnt++}`, {
				width   : "100%",
				height  : 500,
				path : "/vendor/editor.md/lib/",
				imageUpload    : true,
				imageFormats   : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
				imageUploadURL : "/admin/documentations/upload?_token={{ csrf_token() }}",
			});
		});
		
		__doc.on('click', 'button.delete-sub', function () {
			let t = $(this);
			
			t.prop('disabled', true);
			
			Swal.fire({
				"cancelButtonColor": "#D33000", 
				"confirmButtonColor": "#3085D6", 
				"confirmButtonText": "Yes, delete it!", 
				"icon": "warning", 
				"showCancelButton": true, 
				"text": "Deleting a section will delete all of its sub-section(s)!", 
				"title": "Are you sure?"
			}).then(function (result) {
				result.value === true ? RecursiveRemoval(t.data('id')) : t.prop('disabled', false);
			});
		});
		
		$('button#submit').on('click', function (e) {
			e.preventDefault();
			
			let t = $(this), 
				fd = new FormData(), 
				subs = $('div[data-parent={{ $content->id }}]');
			
			//t.empty().prop('disabled', true).append('Updating...');
			
			fd.append('file', $('input#file')[0].files[0]);
			fd.append('description', $('#desc-{{ $content->id }}').val());
			fd.append('id', {{ $content->id }});
			fd.append('lang', $('#languages').val());
			fd.append('meta_description', $('textarea#meta_description').val());
			fd.append('meta_keywords', $('input#meta_keywords').val());
			fd.append('meta_title', $('input#meta_title').val());
			fd.append('name', $('input#name').val());
			fd.append('product', $('select#product').val());
			fd.append('title', $('input#title-{{ $content->id }}').val());
			fd.append('publish_at', $('input#publish_at').val());

			$.each(subs, function (idx, val) {
				RecursiveGetData(fd, idx, val, 'subs');
			});
			
			Submit(fd);
		});
	});
</script>
@endpush