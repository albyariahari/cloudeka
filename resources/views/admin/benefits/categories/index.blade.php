@extends('layouts.title')

@section('content')
	@include('layouts.session')
	
	{!! Form::hidden('table-id', $dataTable->getTableAttribute('id'), [ 'id' => 'table-id' ]) !!}
	
    <x-index-filter is_active=1 />
	
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
	<script src="/js/admin/default-ajax-setup.js"></script>
	<script src="/js/admin/index.js"></script>
@endpush