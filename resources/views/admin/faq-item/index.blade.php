@extends('layouts.title')

@section('content')
	@include('layouts.session')
	<div class="card">
		<div class="card-header with-border">
			<a href="{{ route('admin.faq.item.create', [$slug, $faqID]) }}" class="btn btn-sm btn-success pull-right">Create Content</a>
		</div>
		<div class="card-body">
			{!! $dataTable->table() !!}
		</div>
	</div>
@stop

@push('js')
{!! str_replace(["http:\/\/www.cloudeka.id:443","http:\/\/www.cloudeka.id"], "https:\/\/www.cloudeka.id", $dataTable->scripts()) !!}
<script>
	function ShowResponse(type, message, elem) {
		Swal.fire({
			"icon": type, 
			"title": message, 
			"type": type
		}).then(function () {
			elem.parents('table').DataTable().ajax.reload();
		});
	}
	
	function ShowWarning(warning, elem, method = 'DELETE') {
		Swal.fire({
			"cancelButtonColor": "#D33", 
			"confirmButtonColor": "#3085D6", 
			"confirmButtonText": "Yes", 
			"icon": "warning", 
			"showCancelButton": true, 
			"text": warning, 
			"title": "Are you sure?"
		}).then(function (result) {
			if (result.value === true)
				AJAXAction(elem, method)
		});
	}
	
	function AJAXAction(elem, method = 'DELETE') {
		$.ajax({
			"type": "POST", 
			"dataType": "JSON", 
			"url": elem.data('url'), 
			"data": {
				"_method": method, 
				"_token": '{{ csrf_token() }}'
			}, 
			"success": function(response, textStatus, jqXHR) {
				ShowResponse(response.type, response.message, elem);
			}, 
			"error": function(jqXHR, textStatus, errorThrown) {
				ShowResponse('error', errorThrown, elem);
			}
		})
	}
	
	$(document).ready(function () {
		const __doc = $(this);
		
		__doc.on('click', '.delete-button', function () {
			ShowWarning("Once deleted, you will not be able to recover this!", $(this));
		});
		
		__doc.on('click', '.sort-button', function () {
			AJAXAction($(this), 'PUT');
		});
	});
</script>
@endpush