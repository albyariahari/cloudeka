@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('content')
<!-- Default box -->
	<!-- form start -->
	<form action="{{route('admin.news.category.update',$category->id)}}" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">
		@csrf
        @method('PUT')
        <span class="form-button">
			<a href="{{ route('admin.news.category.index') }}" class="btn btn-secondary pull-right">Back</a>
			<button type="submit" class="btn btn-success pull-right create">Update</button>
		</span>
        <select class="form-control" id="languages" style="width: 5%;margin-bottom: 20px;" name="language">
            @foreach ($languages as $item)
            <option value="{{$item}}" {{old('language',$lang) === $item ? 'selected':''}}>{{strtoupper($item)}}</option>
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Title" value="{{ old('title',$category->translate($lang)->title)}}" name='title'>
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">Parent Category</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" name="parent_id">
                            <option value="0">Select Parent</option>
                            @foreach($categories as $parent)
                                <option value="{{$parent->id}}" {{ old('parent_id',$category->parent_id) === $parent->id ? 'selected="selected"' : ''}}>{{$parent->translate($lang)->title}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                    </div>
                </div>

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
        $(document).ready(function () {
            $('#languages').focus(function(){
                prev_val = $(this).val();
            }).on('change', function() {
                url = '{{env('APP_URL')}}'+'/admin/news/category/'+{{$category->id}}+'/edit?lang='+this.value
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
