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
            font-size: 60px;
        }

        .buttonAct {
            text-align: center;
        }

        .block {
            display: block;
            width: 80%;
            border: none;
            background-color: #04AA6D;
            padding: 14px 28px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 ">
                <p class="middle">
                    <b>404</b>
                </p>
                <p class="text-danger textRed">
                    <b>The page you're looking for can't be found..</b>
                </p>
                <div class="row">
                    <div class="col-6 buttonAct">
                        <p><a href="{{ route('product.index') }}"><button type="button" class="btn btn-primary block">Try Cloud Products</button></a><br></p>
                        <p><a href="{{ route('news') }}"><button type="button" class="btn btn-primary block" >Read Latest Articles</button></a><br></p>
                        <p><a href="{{ route('calculator') }}"><button type="button" class="btn btn-primary block" >See Pricing</button></a><br></p>
                    </div>
                    <div class="col-6 buttonAct">
                        <p><a href="{{ route('solution.index') }}"><button type="button" class="btn btn-primary block" >Find Cloud Solutions</button></a><br></p>
                        <p><a href="{{ route('contact-us') }}"><button type="button" class="btn btn-primary block" >Ask Anything</button></a><br></p>
                        <p><a href="{{ route('home') }}"><button type="button" class="btn btn-primary block" >Go To HomePage</button></a><br></p>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
@stop
