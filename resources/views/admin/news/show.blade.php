@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
        <span class="form-button">
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary pull-right">Back</a>
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
		  		<h3 class="card-title">General Info</h3>
			</div>
      		<div class="card-body">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                        <p>
                            {{ $news->Category->translate($lang)->title }}
                        </p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">
                        <p>
                            {{ucfirst($news->type)}}
                        </p>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <p>
                            {{$news->translate($lang)->title}}
                        </p>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Start Date</label>
                    <div class="col-sm-10">
                        <p>
                            {{$news->start_date ?? '-'}}
                        </p>
                    </div>
                </div>

        		<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">End Date</label>
                    <div class="col-sm-10">
                        <p>
                            {{$news->end_date ?? '-'}}
                        </p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Summary</label>
                    <div class="col-sm-10">
                        <p>
                            {!! $news->translate($lang)->summary !!}
                        </p>
                    </div>
                </div>

                <div class="form-group d-none row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Short Description</label>
                    <div class="col-sm-10">
                        <p>
                            {{$news->translate($lang)->short_description}}
                        </p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <p>
                            {!! $news->translate($lang)->description !!}
                        </p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Outer Thumbnail</label>
                    <div class="col-sm-10">
                        @if ($news->translate($lang)->outer_thumbnail != '' || !is_null($news->translate($lang)->outer_thumbnail))
                            <img src="{{ cloudekaBucketLocalUrl($news->translate($lang)->outer_thumbnail) }}" class="img-responsive"  style="width: 350px !important">
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Inner Thumbnail</label>
                    <div class="col-sm-10">
                        @if ($news->translate($lang)->inner_thumbnail != '' || !is_null($news->translate($lang)->inner_thumbnail))
                            <img src="{{ cloudekaBucketLocalUrl($news->translate($lang)->inner_thumbnail) }}" class="img-responsive"  style="width: 350px !important">
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tags</label>
                    @foreach ($news->Tags as $item)
                        <div class="col-sm-2">
                            <p>
                                #{{$item->title}}
                            </p>
                        </div>
                    @endforeach
                </div>
      		</div>
      		<!-- /.card-body -->

        </div>
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">SEO Metadata Info</h3>
            </div>
            <div class="card-body">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <p>
                            {{$news->translate($lang)->meta_title}}
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Keyword</label>
                    <div class="col-sm-10">
                        <p>
                            {{$news->translate($lang)->meta_keyword}}
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <p>
                            {{$news->translate($lang)->meta_description}}
                        </p>
                    </div>
                </div>

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
                url = '{{env('APP_URL')}}'+'/admin/news/'+{{$news->id}}+'?lang='+this.value
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
