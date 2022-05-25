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
        <a href="{{route('admin.backup.download')}}" class="btn btn-sm btn-success pull-right">Download</a>
    </div>
</div>
<!-- /.box -->
@stop

@push('js')
@endpush
