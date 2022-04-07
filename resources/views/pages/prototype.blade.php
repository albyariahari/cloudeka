@extends('layouts.default')

@section('meta')
<title>Price Calculator - Lintasarta Cloudeka</title>
<style>
    .visible-false{
        display: none;
    }
</style>
@endsection

@section('content')
    <main id="example">
        <prototype-calculator></prototype-calculator>
    </main>
@stop

@push('scripts')

@endpush



