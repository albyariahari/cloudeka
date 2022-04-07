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
			<div class="card card-default ">
				<div class="card-header with-border">
					<h3 class="card-title"></h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-plus"></i>
						</button>
						<button type="button" class="btn btn-tool delete-sub" data-id="">
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
								<div class="desc"></div>
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
	
	<form id="form" action="{{ route('admin.documentations.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		@csrf
        <span class="form-button">
			<a href="{{ route('admin.documentations.index') }}" class="btn btn-secondary pull-right">Back</a>
			<button id="submit" type="submit" class="btn btn-success pull-right create">Create</button>
		</span>
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
							<option value="{{ $pro->id }}" {{ (int) old('product') === $pro->id ? 'selected' : '' }} >{!! $pro->translate($lang)->title !!}</option>
						@endforeach
						</select>
                        <span class="text-danger">{{ $errors->first('product') }}</span>
                    </div>
                </div>
                <div class="form-group row">
					{{ Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name']) }}
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                </div>
                <div class="form-group row">
					{{ Form::label('title', 'Title', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Title']) }}
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                </div>
                <div class="form-group row">
					{{ Form::label('desc-0', 'Description', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						<div id="desc-0"></div>
                        <span class="text-danger">{{ $errors->first('desc-0') }}</span>
                    </div>
                </div>
                <div class="form-group row">
					{{ Form::label('file', 'File', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::file('file', ['class' => 'form-control']) }}
                        <span class="text-danger">{{ $errors->first('file') }}</span>
                    </div>
                </div>
				<div class="form-group row">
					{{ Form::label('publish_at', 'Publish At', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						<input id="publish_at" type="datetime-local" value="{{ old('publish_at') }}" class="form-control" placeholder="Publish At" min="{{ \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d\TH:m') }}">
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
						{{ Form::text('meta_title', old('meta_title'), ['class' => 'form-control', 'placeholder' => 'Meta Title']) }}
                        <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                    </div>
                </div>
                <div class="form-group row">
					{{ Form::label('meta_keywords', 'Meta Keywords', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::text('meta_keywords', old('meta_keywords'), ['class' => 'form-control', 'placeholder' => 'Meta Keywords']) }}
                        <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                    </div>
                </div>
                <div class="form-group row">
					{{ Form::label('meta_description', 'Meta Description', ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
						{{ Form::textarea('meta_description', old('meta_description'), ['class' => 'form-control', 'placeholder' => 'Meta Description', 'cols' => 50, 'rows' => 5]) }}
                        <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                    </div>
                </div>
      		</div>
      	</div>
		<div class="card card-default">
			<div class="card-header with-border">
				<h3 class="card-title">Sub-Sections</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
			<div class="card-footer">
				<a href="javascript:void(0)" class="btn btn-info add-sub" style="float: right;" data-id="0" data-level="0">Add Sub Section</a>
			</div>
		</div>
	</form>
@stop

@push('js')

<script src="/vendor/editor.md/editormd.min.js"></script>
<script src="/vendor/editor.md/languages/en.js"></script>

<script>
	function CloneBasic(tempID) {
		return $($(`#${tempID}`).clone().html());
	}
	
	function CloneSubsection(tempID, parentID, level, counter) {
		let elem = CloneBasic(tempID), 
			padding = (level + 1) * 2;

			console.log(tempID);
			console.log(elem);
			
		elem.attr({
			"data-level": level + 1, 
			"data-parent": parentID, 
			"id": counter
		});
		elem.css('padding-left', `${padding}%`);
		elem.find('button.delete-sub').attr('data-id', counter);
		elem.find('h3.card-title').eq(0).append($('<span>', {
			"text": `New Sub-Section ${counter}`
		}));
		$(elem).find('.desc').prop('id', `desc-${counter}`);
		elem.find('a.add-sub').attr({
			"data-id": counter, 
			"data-level": level + 1, 
			"data-parent": parentID
		});
		
		return elem;
	}
	
	function RecursiveGetData(formData, index, elem, prefix) {
		elem = $(elem);
		
		let subs = $(`div[data-parent=${elem.prop('id')}]`);
		console.log(subs.length);
		formData.append(`${prefix}[${index}][description]`, elem.find('textarea.editormd-markdown-textarea').first().val());
		formData.append(`${prefix}[${index}][title]`, elem.find('input[type=text]').first().val());
		
		$.each(subs, function (idx, val) {
			console.log(idx);
			RecursiveGetData(formData, idx, val, `${prefix}[${index}][subs]`);
		});
	}
	
	function RecursiveRemoval(id) {
		$.each($(`div[data-parent=${id}]`), function (idx, val) {
			RecursiveRemoval(val.id);
		});
		
		$(`div#${id}`).remove();
	}
	
	function Submit(formData) {
		$.ajax({
			"type": "POST", 
			"dataType": "JSON", 
			"data": formData, 
			"url": "{{ route('admin.documentations.ajax.store-all') }}", 
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
					window.location.href = "{{ route('admin.documentations.index') }}";
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
	
	$(document).ready(function () {
		const __doc = $(this),
			  __tmpSub = 'tmp-sub';
		
		let _cnt = 1;
		
		
		editormd("desc-0", {
			width   : "100%",
			height  : 500,
			name    : "desc-0",   
            path : "/vendor/editor.md/lib/",
			imageUpload    : true,
			imageFormats   : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
			imageUploadURL : "/admin/documentations/upload?_token={{ csrf_token() }}",
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
			
			editormd(`desc-${_cnt++}`, {
				width   : "100%",
				height  : 500,
				delay: 1000,
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
				subs = $('div[data-parent=0]');
			
			//t.empty().prop('disabled', true).append('Creating...');
			
			fd.append('file', $('input#file')[0].files[0]);
			fd.append('description', $('textarea[name="desc-0"]').val());
			fd.append('meta_description', $('textarea#meta_description').val());
			fd.append('meta_keywords', $('input#meta_keywords').val());
			fd.append('meta_title', $('input#meta_title').val());
			fd.append('name', $('input#name').val());
			fd.append('product', $('select#product').val());
			fd.append('title', $('input#title').val());
			fd.append('publish_at', $('input#publish_at').val());
			
			$.each(subs, function (idx, val) {
				RecursiveGetData(fd, idx, val, 'subs');
			});
			
			Submit(fd);
		});
	});
</script>
@endpush