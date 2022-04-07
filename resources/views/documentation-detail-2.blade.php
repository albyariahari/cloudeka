@extends('app')

@section('meta')
<title>Documentation Detail - Lintasarta Cloudeka</title>
@endsection

@push('styles')

@endpush

@section('content')

    {{-- Search Document --}}
    <section class="document-detail__search">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 col-lg-2 d-flex align-items-center">
                    <h1 class="text-white pb-4 pb-sm-0 font-size-26">
                        Document Center
                    </h1>
                </div>
                <div class="col-sm-8 col-lg-4 search-wrapper">
                    <form action="" class="search__wrapper">
                        <i class="icon-search mr-0"></i>
                        <input type="text" placeholder="Search by Keyword" class="custom-search">
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- Breadcrumbs --}}
    <div class="document-detail__breadcrumb">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item">
                              <a href="#" class="font-size-20 txt-bold">Documentation</a>
                            </li>
                          <li class="breadcrumb-item active font-size-20 txt-bold" aria-current="page">
                              Cloud Premium / User Guide
                          </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <section class="document-detail__content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 d-submenu">
                    <div class="d-submenu__header">
                        <h1 class="font-size-35 txt-bold txt-primary">
                            Cloud Premium
                        </h1>
                        <h4 class="font-size-22 txt-medium txt-dark">
                            User Guide
                        </h4>
                    </div>
                    <div class="d-submenu__body">
                        <ul class="list-menu">
                            <li class="menu-1 font-size-18">
                                <a href="#" class="txt-dark txt-medium">
                                    <i class="fas fa-caret-right"></i>
                                    Getting Started
                                </a>
                                <ul class="submenu">
                                    <li id="sub-1"><a href="#" class="txt-dark txt-medium">Child 1</a>
                                    </li>
                                    <li id="sub-2"><a href="#" class="txt-dark txt-medium">Child 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="font-size-18">
                                <a href="#" class="txt-dark txt-medium">
                                    Creating and Managing Domains
                                </a>
                            </li>
                            <li class="menu-2 font-size-18">
                                <a href="#" class="txt-dark txt-medium">
                                    <i class="fas fa-caret-right"></i>
                                    Controlling How Data is Indexed
                                </a>
                                <ul class="submenu">
                                    <li id="sub-3"><a href="#" class="txt-dark txt-medium">Child 1</a>
                                    </li>
                                    <li id="sub-4"><a href="#" class="txt-dark txt-medium">Child 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-3 font-size-18">
                                <a href="#" class="txt-dark txt-medium">
                                    <i class="fas fa-caret-right"></i>
                                    Uploading and Indexing Data
                                </a>
                                <ul class="submenu">
                                    <li id="sub-5"><a href="#" class="txt-dark txt-medium">Child 1</a>
                                    </li>
                                    <li id="sub-6"><a href="#" class="txt-dark txt-medium">Child 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="font-size-18">
                                <a href="#" class="txt-dark txt-medium">
                                    Searching Your Data
                                </a>
                            </li>
                            <li class="font-size-18">
                                <a href="#" class="txt-dark txt-medium">
                                    Querying For More Information
                                </a>
                            </li>
                            <li class="font-size-18">
                                <a href="#" class="txt-dark txt-medium">
                                    Lintasarta glossary
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 sections main-content">
                    <div class="main-content__wrapper">
                        <div class="title">
                            <h1 class="txt-dark font-size-40 txt-bold">
                                What is Cloud Premium?
                            </h1>
                        </div>
                        <div class="download">
                            <a href="#">
                                <i class="icon-pdf">
                                    <span class="path2"></span>
                                </i>
                                <span>PDF Version</span>
                            </a>
                        </div>
                        <div class="description txt-medium">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum est ultricies integer quis. Iaculis urna id volutpat lacus laoreet. Mauris vitae ultricies leo integer malesuada. Ac odio tempor orci dapibus ultrices in. Egestas diam in arcu cursus euismod. Dictum fusce ut placerat orci nulla. Tincidunt ornare massa eget egestas purus viverra accumsan in nisl. Tempor id eu nisl nunc mi ipsum faucibus. Fusce id velit ut tortor pretium. Massa ultricies mi quis hendrerit dolor magna eget.
                            </p>
                            <p>
                                Nullam eget felis eget nunc lobortis. Faucibus ornare suspendisse sed nisi. Sagittis eu volutpat odio facilisis mauris sit amet massa. Erat velit scelerisque in dictum non consectetur a erat. Amet nulla facilisi morbi tempus
                            </p>
                        </div>
                        <div class="alert alert-success alert--custom" role="alert">
                            <h1 class="font-size-20 txt-dark txt-bold">
                                Note
                            </h1>
                            <p class="font-size-18 txt-medium txt-dark">
                                This document Nullam eget felis eget nunc lobortis. Faucibus ornare suspendisse sed nisi. Sagittis eu volutpat odio facilisis mauris sit amet massa. Erat velit scelerisque in dictum non consectetur a erat. Amet nulla facilisi morbi tempus
                            </p>
                        </div>
                        <div class="title">
                            <h1 class="txt-dark font-size-40 txt-bold">
                                Getting Started
                            </h1>
                        </div>
                        <div class="description txt-medium">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum est ultricies integer quis. Iaculis urna id volutpat lacus laoreet. Mauris vitae ultricies leo integer malesuada. Ac odio tempor orci dapibus ultrices in. Egestas diam in arcu cursus euismod. Dictum fusce ut placerat orci nulla. Tincidunt ornare massa eget egestas purus viverra accumsan in nisl. Tempor id eu nisl nunc mi ipsum faucibus. Fusce id velit ut tortor pretium. Massa ultricies mi quis hendrerit dolor magna eget.
                            </p>
                            <p>
                                Nullam eget felis eget nunc lobortis. Faucibus ornare suspendisse sed nisi. Sagittis eu volutpat odio facilisis mauris sit amet massa. Erat velit scelerisque in dictum non consectetur a erat. Amet nulla facilisi morbi tempus
                            </p>
                        </div>
                        <div class="image">
                            <img src="/imgs/documentations/noun_images_3762978.jpg" class="img-fluid document-svg" alt="">
                        </div>
                        <div class="description txt-medium">
                            <p>
                                1. Lorem ipsum dolor sit amet,<br>
                                consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum est ultricies integer quis. Iaculis urna id volutpat lacus laoreet. Mauris vitae ultricies leo integer malesuada. Ac odio tempor orci dapibus ultrices in. Egestas diam in arcu cursus euismod. Dictum fusce ut placerat orci nulla. Tincidunt ornare massa eget egestas purus viverra accumsan in nisl. Tempor id eu nisl nunc mi ipsum faucibus. Fusce id velit ut tortor pretium. Massa ultricies mi quis hendrerit dolor magna eget.
                            </p>
                            <p>
                                2. Lorem ipsum dolor sit amet,<br>
                                Nullam eget felis eget nunc lobortis. Faucibus ornare suspendisse sed nisi. Sagittis eu volutpat odio facilisis mauris sit amet massa. Erat velit scelerisque in dictum non consectetur a erat. Amet nulla facilisi morbi tempus:
                            </p>
                            <p>
                                - Dictum fusce ut placerat orci nulla. <br>
                                - Tincidunt ornare massa eget egestas purus viverra accumsan in nisl. <br>
                                - Tempor id eu nisl nunc mi ipsum faucibus. Fusce id velit ut tortor pretium. <br>
                                - Massa ultricies mi quis hendrerit dolor magna eget.
                            </p>
                            <p>
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum est ultricies integer quis. Iaculis urna id volutpat lacus laoreet. Mauris vitae ultricies leo integer malesuada.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.subscription')

@stop

@push('scripts')
    <script type="text/javascript">

        if ($(window).width() >= 992) {
            var theLoc = 150;
            var links = $('.d-submenu');
            var content = $('.main-content');
                    
            $(window).scroll(function () {
                console.log('scroll');
                if (theLoc >= $(window).scrollTop()) {
                    if (links.hasClass('fixed')) {
                        links.removeClass('fixed');
                        content.removeClass('fixed');

                    }
                } else {
                    if (!links.hasClass('fixed')) {
                        links.addClass('fixed');
                        content.addClass('fixed');
                    }
                }
            });
        }

        $('.list-menu > li').click(function (e) {
            e.preventDefault();

            var child = $(this).children('ul');
            $(this).children().addClass("active");

            $('.list-menu ul').not(child).slideUp('normal');
            child.slideToggle('normal');

        });
    </script>
@endpush
