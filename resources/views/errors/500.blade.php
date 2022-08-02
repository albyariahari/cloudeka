@extends('app')

@section('meta')
    <title>Page Errors</title>
@endsection
@push('styles')
    <style>
        .middle {
            text-align: center;
            font-family: "Fira Sans", sans-black;
            font-size: 150px;
        }

        .textRed {
            text-align: center;
            font-family: "Fira Sans", sans-bold;
            font-size: 80px;
            margin-bottom: 0%;
        }

        .buttonAct {
            text-align: center;
        }

        .block {
            width: 240px;
            height: 50px;
            border-radius: 50px;
            background-color: #2595D3;
            border: none;
            color: white;
            padding: 2px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .block-bottom {
            width: 240px;
            height: 50px;
            border-radius: 50px;
            background-color: #2595D3;
            border: none;
            color: white;
            padding: 2px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .box {
            background-color: white;
            box-shadow: 2px 2px 5px 5px #D1E5F0;
            border-radius: 20px;
        }

        .img404 {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 70%;
        }

        body {
            background-image: url("/imgs/BG-Cloud.png");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endpush

@section('content')
    <div class="container box">
        <div class="Shadow-risen p-3 mb-5 mt-5 bg-red rounded w-25" style="height: 45em;">
            <img class="img404" src="{{ '/imgs/500.png' }}">
            <p class="text-danger textRed">
                <b>We'll be right back...</b>
            </p>
            <p style="text-align: center">Relax, you can try our search box above or try one of the links below.</p>

            <div class="row buttonAct">
                <div class="col">
                    <a href="{{ route('product.index') }}"><button type="button"
                            class="block">{{ __('error.product') }}</button></a><br>
                </div>
                <div class="col">
                    <p><a href="{{ route('solution.index') }}"><button type="button"
                                class="block">{{ __('error.solution') }}</button></a><br></p>
                </div>
                <div class="col">
                    <p><a href="{{ route('news') }}"><button type="button"
                                class="block">{{ __('error.articles') }}</button></a><br></p>
                </div>
                <div class="col">
                    <p><a href="{{ route('calculator') }}"><button type="button"
                                class="block">{{ __('error.pricing') }}</button></a><br></p>
                </div>
            </div>
            <div class="row buttonAct">
                <div class="col">
                    <p><a href="{{ route('contact-us') }}"><button type="button"
                                class="block-bottom float-right">{{ __('error.ask') }}</button></a><br></p>
                </div>
                <div class="col d-flex">
                    <p><a href="{{ route('home') }}"><button type="button"
                                class="block-bottom float-left">{{ __('error.home') }}</button></a><br></p>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-3"></div>
            <div class="col-6 ">
                <p class="middle">
                    <b>404</b>
                </p>
                <p class="text-danger textRed">
                    <b>{{ __('error.body') }}</b>
                </p>
                <div class="row">
                    <div class="col-6 buttonAct">
                        <p><a href="{{ route('product.index') }}"><button type="button" class="btn btn-primary block">{{ __('error.product') }}</button></a><br></p>
                        <p><a href="{{ route('news') }}"><button type="button" class="btn btn-primary block" >{{ __('error.articles') }}</button></a><br></p>
                        <p><a href="{{ route('calculator') }}"><button type="button" class="btn btn-primary block" >{{ __('error.pricing') }}</button></a><br></p>
                    </div>
                    <div class="col-6 buttonAct">
                        <p><a href="{{ route('solution.index') }}"><button type="button" class="btn btn-primary block" >{{ __('error.solution') }}</button></a><br></p>
                        <p><a href="{{ route('contact-us') }}"><button type="button" class="btn btn-primary block" >{{ __('error.ask') }}</button></a><br></p>
                        <p><a href="{{ route('home') }}"><button type="button" class="btn btn-primary block" >{{ __('error.home') }}</button></a><br></p>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-3"></div>
        </div> --}}
    </div>
@stop
