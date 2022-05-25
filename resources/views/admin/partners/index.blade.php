@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{$page}}</h1>
@stop

@section('content')
<!-- Default box -->
@include('layouts.session')
<div class="card">
    <div class="card-header with-border">
        <a href="{{ route('admin.partners.create') }}" class="btn btn-sm btn-success pull-right">Create Content</a>
    </div>
    <div class="card-body">
            {!! $dataTable->table() !!}
		</div>
		<!-- /.box-body -->
  	</div>
  	<!-- /.box -->
@stop

@push('js')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css"> --}}
{{-- <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script> --}}
{{-- <script src="{{asset('/vendor/datatables-plugins/buttons/css/buttons.bootstrap4.min.css')}}"></script> --}}
{{-- <script src="{{asset('/vendor/datatables-plugins/buttons/js/dataTables.buttons.min.js')}}"></script> --}}
{{-- <script src="/vendor/datatables/buttons.server-side.js"></script> --}}
{{-- <script src="/vendor/datatables/js/jquery.dataTables.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> --}}
{!! str_replace(["http:\/\/www.cloudeka.id:443","http:\/\/www.cloudeka.id"], "https:\/\/www.cloudeka.id", $dataTable->scripts()) !!}
<script>
    function ajaxAction(elem, url, method = 'delete') {
        $.ajax({
            "type": "POST", 
            "dataType": "JSON", 
            "url": url, 
            "data": {
                "_method": method
            }, 
            "headers": {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }, 
            "success": function(response, textStatus, jqXHR) {
                showResponse(elem, response);
            }, 
            "error": function(jqXHR, textStatus, errorThrown) {
                showResponse(elem, {
					"message": errorThrown, 
					"type": "error"
				});
            }
        })
    }

    function showResponse(elem, response) {
        Swal.fire({
            "icon": response.type, 
            "title": response.message
        }).then(function () {
            elem.parents('table').DataTable().ajax.reload();
        });
    }
	
    $(document).on('click', '.delete-button', function () {
        let t = $(this), 
			url = t.data('url');

        Swal.fire({
            "cancelButtonColor": "#d33", 
            "confirmButtonColor": "#3085d6", 
            "confirmButtonText": "Yes, delete it!", 
            "icon": "warning", 
            "showCancelButton": true, 
            "text": "Once deleted, you will not be able to recover this!", 
            "title": "Are you sure?"
        }).then(function (result) {
            if (result.value === true)
                ajaxAction(t, url);
        });
    })
</script>
@endpush