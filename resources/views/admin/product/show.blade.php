@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
        <span class="form-button">
			<a href="{{ route('admin.product.index') }}" class="btn btn-secondary pull-right">Back</a>
		</span>
        <select class="form-control" id="languages" style="width: 5%;margin-bottom: 20px;" name="language">
            @foreach ($languages as $item)
            <option value="{{$item}}" {{$lang === $item ? 'selected':''}}>{{strtoupper($item)}}</option>
            @endforeach
        </select>
        @include('layouts.session')
        <!-- Default box -->
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">General Info ({{strtoupper($lang)}})</h3>
            </div>
            <div class="card-body">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <p>
                            {{ $product->translate($lang)->title}}
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Subtitle</label>
                    <div class="col-sm-10">
                        <p>
                            {{ $product->translate($lang)->subtitle}}
                        </p>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="inputEmail3" class="col-sm-2 control-label">Logo Putih</label>
                    <div class="col-sm-10">
                        @if ($product->translate($lang)->logo_1 != '' || !is_null($product->translate($lang)->logo_1))
                            <img src="{{ cloudekaBucketLocalUrl($product->translate($lang)->logo_1) }}" class="img-responsive"  style="width: 350px !important">
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="inputEmail3" class="col-sm-2 control-label">Logo Biru</label>
                    <div class="col-sm-10">
                        @if ($product->translate($lang)->logo_2 != '' || !is_null($product->translate($lang)->logo_2))
                            <img src="{{ cloudekaBucketLocalUrl($product->translate($lang)->logo_2) }}" class="img-responsive"  style="width: 350px !important">
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="inputEmail3" class="col-sm-2 control-label">Image Banner</label>
                    <div class="col-sm-10">
                        @if ($product->translate($lang)->images != '' || !is_null($product->translate($lang)->images))
                            <img src="{{ cloudekaBucketLocalUrl($product->translate($lang)->images) }}" class="img-responsive"  style="width: 650px">
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        {!!$product->translate($lang)->description!!}
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

        </div>

        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Meta Info ({{strtoupper($lang)}})</h3>
            </div>
            <div class="card-body">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Meta Title</label>
                    <div class="col-sm-10">
                        <p>
                            {{ $product->translate($lang)->meta_title}}
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Meta Keyword</label>
                    <div class="col-sm-10">
                        <p>
                            {{$product->translate($lang)->meta_keyword}}
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Meta Description</label>
                    <div class="col-sm-10">
                        <p>
                            {{ $product->translate($lang)->meta_description }}
                        </p>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

        </div>

        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Technology Partner ({{strtoupper($lang)}})</h3>
            </div>
            <div class="card-body">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        {!! $product->translate($lang)->partner_description !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Partners</label>
                    <div class="col-sm-10">
                        <div class="card card-default">
                            <div class="card-header with-border">
                            </div>
                            <div class="card-body" id="partner_wrapper">
                                @foreach ($product->Partners as $item)
                                <div class="form-group row partner">
                                    <div class="col-sm-11">
                                        <p>
                                            {{$item->name}}
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

        </div>

        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Use Cases ({{strtoupper($lang)}})</h3>
            </div>
            <div class="card-body" id="case_wrapper">
                @foreach ($product->UseCases as $key => $item)

                <div class="card card-default border border-dark case">
                    <div class="card-header border-0">
                        {{-- <h3 class="card-title font-weight-bold">Add New Use Case</h3> --}}
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                {!! $item->translate($lang)->description !!}
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="inputEmail3" class="col-sm-2 control-label">Client</label>
                            <div class="col-sm-10">
                                <p>
                                    {{$item->Client->name}}
                                </p>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                </div>

                @endforeach
            </div>
            <!-- /.card-body -->

        </div>

        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Benefits ({{strtoupper($lang)}})</h3>
                {{-- <a href="javascript:void(0)" class="btn btn-info" id="add_benefit" style="float: right;">Add Benefit</a> --}}
            </div>
            <div class="card-body" id="benefit_wrapper">
                @foreach ($product->Benefits as $key => $item)

                <div class="card card-default border border-dark benefit">
                    <div class="card-header border-0 p-0 m-0">
                        {{-- <button type="button" class="delete-benefit btn btn-danger float-right" data-index="0">X</button> --}}
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <p>
                                    {!!$item->translate($lang)->description!!}
                                </p>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="inputEmail3" class="col-sm-2 control-label">Icon</label>
                            <div class="col-sm-10">
                                @if ($item->translate($lang)->icon != '' || !is_null($item->translate($lang)->icon))
                                    <img src="{{ cloudekaBucketLocalUrl($item->translate($lang)->icon) }}" class="img-responsive" style="width: 630px">
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                </div>

                @endforeach
            </div>
            <!-- /.card-body -->

        </div>

        <!-- /.card-footer -->
      	<!-- /.box -->
    <!-- /.card-body -->
<!-- /.box -->
@stop

@push('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#languages').focus(function(){
                prev_val = $(this).val();
            }).on('change', function() {
                url = '{{env('APP_URL')}}'+'/admin/product/'+{{$product->id}}+'?lang='+this.value
                selectorDeleted = $(this);
                Swal.fire({
                    title: "Apa anda yakin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Pindahkan!'
                }).then((result)=> {
                    if (result.value===true) {
                        window.location.href = url
                    }else{
                        $(this).val(prev_val)
                    }
                });
            });
		});
    </script>
@endpush
