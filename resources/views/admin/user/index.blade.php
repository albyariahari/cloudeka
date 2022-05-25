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
        <div id="filter">
            <div class="form-group" style="text-align: left;">
                <label style="line-height: 34px;">Filter: </label>
            </div>
            <div class="form-group">
                <select class="form-control select2" id="filter_by" name="filter_by">
                    <option {{ $role_id == 0 ? 'selected' : ''}} value=''>All filter</option>
                    @forelse ($role as $item)
                    <option {{ $role_id == $item->id ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                    @empty

                    @endforelse
                </select>
            </div>
        </div>
        <a href="{{route('admin.user.create')}}" class="btn btn-sm btn-success pull-right">Create Content</a>
    </div>
    <div class="card-body">
            {!! $dataTable->table() !!}
		</div>
		<!-- /.box-body -->
  	</div>
  	<!-- /.box -->
@stop

@push('css')
      <style>
        div#filter {
            float: right;
            max-width: 50%;
        }

        div#filter select {
            width: 170px;
        }

        div#filter .form-group {
            float: left;
            margin: 0px 5px 0px;
        }
      </style>
@endpush

@push('js')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css"> --}}
{{-- <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script> --}}
{{-- <script src="{{asset('/vendor/datatables-plugins/buttons/css/buttons.bootstrap4.min.css')}}"></script> --}}
{{-- <script src="{{asset('/vendor/datatables-plugins/buttons/js/dataTables.buttons.min.js')}}"></script> --}}
{{-- <script src="/vendor/datatables/buttons.server-side.js"></script> --}}
{{-- <script src="/vendor/datatables/js/jquery.dataTables.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> --}}
{!! str_replace(["http:\/\/www.cloudeka.id:443","http:\/\/www.cloudeka.id"], "https:\/\/www.cloudeka.id", $dataTable->scripts()) !!}
<script type="text/javascript">
    var selectorDeleted;

    $(document).on('click', '.delete-button', function() {

        url = $(this).data('url');
        selectorDeleted = $(this);

        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value===true) {
                ajaxAction(url)
            }
        });
    })

    function ajaxAction(url,method = 'delete') {
        $.ajax({
            type : 'post',
            dataType : 'json',
            url : url,
            data : {
                '_method' : method
            },
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response, textStatus, jqXHR) {

                showResponse(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                response = {"type":"error","message":errorThrown};

                showResponse(response);
            }
        })
    }

    function showResponse(response) {
        Swal.fire({
            title: response.message,
            icon: response.type
        }).then(function () {
            selectorDeleted.parents('table').DataTable().ajax.reload();
        });
    }

    $("#filter_by").change(function(){
        var url = window.location.origin;
        url = url + "/admin/user?role_id=" + $(this).val();  // this number is dynamic actually

        window.location.href = url;
    });

</script>
@endpush
