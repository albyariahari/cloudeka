@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
	
		<span class="form-button">
			<a href="{{ route('admin.solution.index') }}" class="btn btn-secondary pull-right">Back</a>
		</span>
        <select class="form-control" id="languages" style="width: 5%;margin-bottom: 20px;" name="language">
            @foreach ($languages as $item)
            <option value="{{$item}}" {{$lang === $item ? 'selected':''}}>{{strtoupper($item)}}</option>
            @endforeach
        </select>
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
                            {{$solution->translate($lang)->title}}
                        </p>
                    </div>
                </div>
        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Subtitle</label>
                    <div class="col-sm-10">
                        <p>
                            {{$solution->translate($lang)->subtitle}}
                        </p>
                    </div>
                </div>
        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <p>
                            {!! $solution->translate($lang)->description !!}
                        </p>
                    </div>
                </div>
        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Excerpt</label>
                    <div class="col-sm-10">
                        <p>
                            {!! $solution->translate($lang)->excerpt !!}
                        </p>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="inputEmail3" class="col-sm-2 control-label">Logo Putih</label>
                    <div class="col-sm-10">
                        @if ($solution->translate($lang)->logo_1 != '' || !is_null($solution->translate($lang)->logo_1))
                            <img src="{{ cloudekaBucketLocalUrl($solution->translate($lang)->logo_1) }}" class="img-responsive"  style="width: 350px !important">
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="inputEmail3" class="col-sm-2 control-label">Logo Biru</label>
                    <div class="col-sm-10">
                        @if ($solution->translate($lang)->logo_2 != '' || !is_null($solution->translate($lang)->logo_2))
                            <img src="{{ cloudekaBucketLocalUrl($solution->translate($lang)->logo_2) }}" class="img-responsive"  style="width: 350px !important">
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="inputEmail3" class="col-sm-2 control-label">Images</label>
                    <div class="col-sm-10">
                        @if ($solution->translate($lang)->images != '' || !is_null($solution->translate($lang)->images))
                            <img src="{{ cloudekaBucketLocalUrl($solution->translate($lang)->images) }}" class="img-responsive"  style="width: 650px">
                        @endif
                    </div>
                </div>

      		</div>
      		<!-- /.card-body -->

        </div>

      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">Use Cases ({{strtoupper($lang)}})</h3>
			</div>
      		<div class="card-body" id="case-wrapper">
                @foreach ($solution->UseCases as $key => $item)

                <div class="card card-default border border-dark case">
                    <div class="card-header border-0 p-0 m-0">
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Use Case</label>
                            <div class="col-sm-10">
                                <p>
                                    {!!$item->translate($lang)->description!!}
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

                @endforeach
      		</div>
      		<!-- /.card-body -->

        </div>

      	<div class="card card-default">
      		<div class="card-header with-border">
		  		<h3 class="card-title">Products ({{strtoupper($lang)}})</h3>
			</div>
      		<div class="card-body" id="product-wrapper">

                @foreach ($solution->Products as $item)

                <div class="card card-default border border-dark product">
                    <div class="card-header border-0 p-0 m-0">
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Product</label>
                            <div class="col-sm-10">
                                <p>
                                    {{$item->title}}
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

        <!-- /.card-footer -->
      	<!-- /.box -->
	</form>
    <!-- /.card-body -->
<!-- /.box -->
@stop

@push('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#languages').focus(function(){
                prev_val = $(this).val();
            }).on('change', function() {
                url = '{{ route('admin.solution.show', $solution->id) }}?lang=' + this.value
                selectorDeleted = $(this);
                Swal.fire({
                    title: "Apa anda yakin?",
                    text: "Mungkin ada perubahan yang belum di disimpan anda yakin?",
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
