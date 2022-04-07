<div id="{{ $content->id }}" class="card-body" style="padding: 1% 1% 0% {{ $content->level * 2 }}%;" data-level="{{ $content->level }}" data-parent={{ $content->parent_id }}>
	<div class="card card-default ">
		<div class="card-header with-border">
			<h3 class="card-title">
				<span style="font-weight: bold;">{!! $content->translate($lang)->title !!}</span>
			</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-plus"></i>
				</button>
				<button type="button" class="btn btn-tool delete-sub" data-id="{{ $content->id }}" data-url="{{ route('admin.documentations.destroy', $content->id) }}">
					<i class="fas fa-times"></i>
				</button>
			</div>
		</div>
		<div class="card-body">
			<div class="card card-default">
				<div class="card-header with-border">
					<h3 class="card-title">General Info</h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="form-group row">
						{{ Form::label("title-{$content->id}", 'Title', ['class' => 'col-sm-2 control-label']) }}
						<div class="col-sm-10">
							{{ Form::text("title-{$content->id}", old("title-{$content->id}", $content->translate($lang)->title), ['class' => 'form-control title', 'placeholder' => 'Title']) }}
							<span class="text-danger">{{ $errors->first("title-{$content->id}") }}</span>
						</div>
					</div>
					<div class="form-group row">
						{{ Form::label("desc-{$content->id}", 'Description', ['class' => 'col-sm-2 control-label']) }}
						<div class="col-sm-10">
							<div class="editor" data-id="{{$content->id}}" id="editor-{{$content->id}}">
								{{ Form::textarea("desc-{$content->id}", old("desc-{$content->id}", $content->translate($lang)->description), ['class' => 'desc']) }}
							</div>
							<span class="text-danger">{{ $errors->first("desc-{$content->id}") }}</span>
						</div>
					</div>
				</div>
				
				<div class="card-footer">
					<a href="javascript:void(0)" class="btn btn-info add-sub" style="float: right;" data-id="{{ $content->id }}" data-level="{{ $content->level }}" data-parent="{{ $content->parent_id }}">Add Sub Section</a>
				</div>
			</div>
		</div>
	</div>
</div>

@if ($content->childsRec->count())
	@foreach ($content->childsRec as $child)
		@include('admin.documentations.subsection', ['content' => $child])
	@endforeach
@endif