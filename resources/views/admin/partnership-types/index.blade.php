@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{!! $page !!}</h1>
@stop

@section('content')
	@include('layouts.session')
	<div class="card">
		<div class="card-body">
			{!! $dataTable->table() !!}
		</div>
	</div>
@stop

@push('css')
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
@endpush

@push('js')
	<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
{{-- <script src="{{asset('/vendor/datatables-plugins/buttons/css/buttons.bootstrap4.min.css')}}"></script> --}}
{{-- <script src="{{asset('/vendor/datatables-plugins/buttons/js/dataTables.buttons.min.js')}}"></script> --}}
	<script src="/vendor/datatables/buttons.server-side.js"></script>
{{-- <script src="/vendor/datatables/js/jquery.dataTables.min.js"></script> --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	{!! str_replace(["http:\/\/www.cloudeka.id:443", "http:\/\/www.cloudeka.id"], "https:\/\/www.cloudeka.id", $dataTable->scripts()) !!}
	<script>
		const ajaxAction = (elem, url, method = 'DELETE') => {
			elem.prop('disabled', true);
			
			$.ajax({
				"type": "POST", 
				"dataType": "JSON", 
				"url": url, 
				"data": {
					"_method": method, 
				}, 
				"headers": {
					"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'), 
				}, 
				"success": (data, textStatus, jqXHR) => {
					showResponse(elem, data);
				}, 
				"error": (jqXHR, textStatus, errorThrown) => {
					showResponse(elem, {
						"message": errorThrown, 
						"type": "error", 
					});
				}, "complete": (jqXHR, textStatus) => {
					elem.prop('disabled', false);
				}, 
			})
		}, 
		showResponse = (elem, response) => {
			Swal.fire({
				"text": response.message, 
				"type": response.type, 
				"title": response.type, 
			}).then(result => {
				if (result.value === true)
					elem.parents('table').DataTable().ajax.reload();
			});
		}
	</script>
	<script>
		const __doc = $(document);
		
		__doc.on('click', '.delete-button', function () {
			let t = $(this);

			Swal.fire({
				"cancelButtonColor": "#d33", 
				"confirmButtonColor": "#3085d6", 
				"confirmButtonText": "Yes, delete it!", 
				"dangerMode": true, 
				"showCancelButton": true, 
				"text": "Once deleted, you will not be able to recover this!", 
				"title": "Are you sure?", 
				"type": "warning", 
			}).then(result => {
				if (result.value === true)
					ajaxAction(t, t.data('url'));
			});
		});
		
		__doc.on('click', '.status-button', function () {
			let t = $(this);
			
			swal({
				"buttons": true, 
				"dangerMode": true, 
				"icon": "warning", 
				"text": t.data('message'), 
				"title": "Are you sure?"
			}).then(result => {
				if (result === true)
					ajaxAction(t, t.data('url'), 'PUT');
			});
		});
		
		__doc.on('click', '.order-button', function () {
			let t = $(this);
			
			ajaxAction(t, t.data('url'), 'PUT');
		});
	</script>
@endpush