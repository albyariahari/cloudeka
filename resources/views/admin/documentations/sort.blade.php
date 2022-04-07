@extends('adminlte::page')

@section('title', $page)

@push('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
		
	.ui-sortable-placeholder {
		background-color: red;
	}
	ol{
		list-style: none;
		padding-left: 0;
	}
	ol li ol{
		padding-left: 20px;
	}
	.has-child ol{
		display: block;
	}
	.no-child ol{
		display: none;
	}
</style>
@endpush

@section('content_header')
    <h1>Sort documentation</h1>
@stop

@section('content')
	<template id="tmp-sub">
		<div id="" class="card-body" style="padding-bottom: 0%; padding-left: 1%; padding-right: 1%; padding-top: 1%;" data-level="" data-parent="">
			<div class="card card-default collapsed-card">
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
									{{ Form::textarea('description', '', ['class' => 'desc']) }}
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
	
        @include('layouts.session')
      	
		<div class="card card-default">
			<div class="card-header with-border">
				<h3 class="card-title">Sub-Sections</h3>
				<div class="card-tools">
					<button type="button" onclick="getDataSort()" class="btn btn-primary mr-3">
						Save
					</button>
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>

			@if ($content->childsRec->count())
				<div id="nestedDemo" class="list-group col nested-sortable">
					@foreach ($content->childsRec as $child)
						@include('admin.documentations.subsectionsort', ['content' => $child])
					@endforeach
				</div>
			@endif
		
		</div>
@stop

@push('js')
<script src="https://sortablejs.github.io/Sortable/Sortable.js"></script>
<script>


	var nestedSortables = [].slice.call(document.querySelectorAll('.nested-sortable'));

	for (var i = 0; i < nestedSortables.length; i++) {
		new Sortable(nestedSortables[i], {
			group: 'nested',
			animation: 150,
			fallbackOnBody: true,
			swapThreshold: 0.65
		});
	}
	
	function serialize(sortable) {
		
		const nestedQuery = '.nested-sortable';
		const identifier = 'sortableId';
		var serialized = [];
		var children = [].slice.call(sortable.children);
		for (var i in children) {
			var nested = children[i].querySelector(nestedQuery);
			serialized.push({
				id: children[i].dataset[identifier],
				children: nested ? serialize(nested) : []
			});
		}
		return serialized
	}
	function getDataSort(){
		const root = document.getElementById('nestedDemo');
		var data = serialize(root);
		$.ajax({
			"type": "POST", 
			"data": {"order" : data}, 
			"url": "{{ route('admin.documentations.ajax.sort', $content->id) }}", 
			"headers": {
				"X-CSRF-TOKEN": "{{ csrf_token() }}"
			}, 
			"cache": false, 
			"success": function(response, textStatus, jqXHR) {
				Swal.fire({
					"title": "Successfully sort your documentations", 
					"type": "success"
				}).then(function () {
					// window.location.href = '{{ route('admin.documentations.edit', $content->id) }}?lang=' + $('#languages').val();
				});
			}, 
			"error": function (jqXHR, textStatus, errorThrown) {
				Swal.fire({
					"title":  "Failed to sort your documentations", 
					"type": "error"
				}).then(function () {
					console.log(jqXHR.responseJSON);
				});
			}
		});
	}
  </script>
<script>
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
		elem.find('textarea').prop('id', `desc-n-${counter}`);
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
		formData.append(`${prefix}[${index}][description]`, CKEDITOR.instances[`desc-${id}`].getData());
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
			  __CKEprop = {
				  "filebrowserUploadMethod": "form", 
				  "filebrowserUploadUrl": "{{ route('admin.documentations.ajax.upload', ['_token' => csrf_token() ]) }}"
			  }, 
			  __tmpSub = 'tmp-sub';
		
		let _cnt = 1, 
			_arr = [];
		
		$.each($('input.title'), function (idx, val) {
			_arr[val.id] = val.value;
		});
		
		$.each($('textarea.desc'), function (idx, val) {
			let cke = CKEDITOR.replace(val.id, __CKEprop), 
				old = val.value;
			
			if (idx > 0) {
				cke.on('change', function () {
					let id = val.id.split('-')[1], 
						color = this.checkDirty() ? 'blue' : 'black';
					
					ToggleTitleColor(id, color);
				});
			}
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
			
			CKEDITOR.replace(`desc-n-${_cnt++}`, __CKEprop);
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
			fd.append('description', CKEDITOR.instances['desc-{{ $content->id }}'].getData());
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