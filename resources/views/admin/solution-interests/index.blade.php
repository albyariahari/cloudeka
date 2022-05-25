@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{!! $page !!}</h1>
@stop

@section('content')
	@include('layouts.session')
	
    <x-index-filter is_active=1></x-index-filter>
	
	<div class="card">
		<div class="card-body">
			{!! $dataTable->table() !!}
		</div>
	</div>
@stop

@push('css')
	<style>
		.swal-footer {
			text-align: center;
		}
	</style>
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
@endpush

@push('js')
	<script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
	{{-- <script src="{{asset('/vendor/datatables-plugins/buttons/css/buttons.bootstrap4.min.css')}}"></script> --}}
	{{-- <script src="{{asset('/vendor/datatables-plugins/buttons/js/dataTables.buttons.min.js')}}"></script> --}}
	<script src="/vendor/datatables/buttons.server-side.js"></script>
	<script src="/js/custom-buttons.js"></script>
	{{-- <script src="/vendor/datatables/js/jquery.dataTables.min.js"></script> --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	{!! $dataTable->scripts() !!}
	<script>
		const AJAXAction = (elem, url, method = 'DELETE') => {
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
					"success": (data, textStatus, jqXHR) => ShowResponse(data), 
					"error": (jqXHR, textStatus, errorThrown) => ShowResponse({
						"message": errorThrown, 
						"type": "error"
					}), 
					"complete": (jqXHR, textStatus) => elem.prop('disabled', false), 
				})
			}, 
			ShowResponse = response => {
				swal({
					icon: response.type, 
					text: response.message, 
					title: response.type === 'success' ? 'Success!' : 'Error!', 
				}).then(result => {
					if (result)
						$('.dataTable').DataTable().draw();
				});
			};
	</script>
	<script>
		var datepickers = $('.datepicker'), 
			is_active = $('#is_active'), 
			doc = $(document);
		
		$('#{!! $dataTable->getTableAttribute('id') !!}').on('init.dt', function () {
			$(this).before($('#advanced-filter'));
		});
		
		datepickers.datepicker().on('change', function () {
			$('.dataTable').DataTable().draw();
		});
		
		is_active.on('change', function () {
			$('.dataTable').DataTable().draw();
		});
		
		doc.on('click', '.delete-button', function () {
			let t = $(this);
			
			swal({
				buttons: {
					cancel: {
						className: "btn btn-info", 
						text: "Cancel", 
						visible: true, 
					}, 
					confirm: {
						className: "btn btn-danger", 
						text: "Delete", 
					}, 
				}, 
				dangerMode: true, 
				icon: "error", 
				text: t.data('message'), 
				title: "Are you sure?", 
			}).then(result => {
				if (result)
					AJAXAction(t, t.data('url'));
			});
		});
		
		doc.on('click', '.order-button', function () {
			let t = $(this);
			
			AJAXAction(t, t.data('url'), 'PUT');
		});
		
		doc.on('click', '.status-button', function () {
			let t = $(this), 
				isSuccess = t.hasClass('btn-success');

			swal({
				buttons: {
					cancel: {
						className: "btn btn-info", 
						text: "Cancel", 
						visible: true, 
					}, 
					confirm: {
						className: "btn btn-" + (isSuccess ? "success" : "warning"), 
						text: (isSuccess ? "Activate" : "Deactivate"), 
					}, 
				}, 
				dangerMode: !isSuccess, 
				icon: "warning", 
				text: t.data('message'), 
				title: "Are you sure?", 
			}).then(result => {
				if (result)
					AJAXAction(t, t.data('url'), 'PUT');
			});
		});
	</script>
@endpush