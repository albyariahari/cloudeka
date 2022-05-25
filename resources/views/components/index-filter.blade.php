
<div id="advanced-filter" class="card bg-light card-default collapse" style="clear: both;">
	<div class="card-body">
		<div class="form-group row">
			{{ Form::label('date_from', 'Date From', ['class' => 'col-sm-2 control-label']) }}
			<div class="col-sm-3">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="far fa-calendar-alt"></i>
						</span>
					</div>
					{{ Form::text('date_from', '', ['class' => 'form-control datepicker']) }}
				</div>
			</div>
			<div class="col-sm-2">&nbsp;</div>
			{{ Form::label('date_to', 'Date To', ['class' => 'col-sm-2 control-label']) }}
			<div class="col-sm-3">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="far fa-calendar-alt"></i>
						</span>
					</div>
					{{ Form::text('date_to', '', ['class' => 'form-control datepicker']) }}
				</div>
			</div>
		</div>
		
		@if (isset($isActive))
		<div class="form-group row">
			{{ Form::label('is_active', 'Only Active', ['class' => 'col-sm-2 control-label']) }}
			<div class="col-sm-4">
				<div class="form-check">
					{{ Form::checkbox('is_active', 1, false, ['class' => 'form-check-input']) }}
				</div>
			</div>
		</div>
		@endif
		
		@if (isset($emails))
		<div class="form-group row">
			{{ Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) }}
			<div class="col-sm-3">
				{{ Form::select('email', ['' => '--SELECT EMAIL--'] + $emails, '', ['class' => 'form-control']) }}
			</div>
		</div>
		@endif
		
		@if (isset($types))
		<div class="form-group row">
			{{ Form::label('type', 'Type', ['class' => 'col-sm-2 control-label']) }}
			<div class="col-sm-3">
				{{ Form::select('type', ['' => '--SELECT TYPE--'] + $types, '', ['class' => 'form-control']) }}
			</div>
		</div>
		@endif
		
		@if (isset($statuses))
		<div class="form-group row">
			{{ Form::label('status', 'Status', ['class' => 'col-sm-2 control-label']) }}
			<div class="col-sm-3">
				{{ Form::select('status', ['' => '--SELECT STATUS--'] + $statuses, '', ['class' => 'form-control']) }}
			</div>
		</div>
		@endif
		
		{{ $slot }}
	</div>
</div>