@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{!! $page !!}</h1>
@stop

@section('content')
	<select class="form-control" id="languages" style="width: 5%;margin-bottom: 20px;" name="language">
		@foreach ($languages as $item)
		<option value="{{$item}}" {{$lang === $item ? 'selected':''}}>{{strtoupper($item)}}</option>
		@endforeach
	</select>

	@include('layouts.session')
	
	<div class="card">
		<div class="card-header">
			<button id="add-column" class="btn btn-info">
				<i class="fa fa-plus-circle"></i> Add Column
			</button>
			<button id="delete-column" class="btn btn-danger">
				<i class="fa fa-minus-circle"></i> Delete Column
			</button>
			<button id="add-row" class="btn btn-info">
				<i class="fa fa-plus-square"></i> Add Row
			</button>
			<button id="delete-row" class="btn btn-danger">
				<i class="fa fa-minus-square"></i> Delete Row
			</button>
		</div>
		
		<div class="card-body">
			<div id="example-table-2"></div>
		</div>
	</div>
@stop

@push('css')
	<link href="https://unpkg.com/tabulator-tables/dist/css/tabulator.min.css" rel="stylesheet">
@endpush

@push('js')
	<script src="https://unpkg.com/tabulator-tables/dist/js/tabulator.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
	<script>
		const GetCurrentDate = (format = 'YYYYMMDDHHmmssSSS') => moment().format(format), 
			ShowResponse = data => swal({
				"icon": data.type, 
				"text": data.message, 
				"title": data.type === 'success' ? 'Success!' : 'Error!', 
			});
		
		const __token = $('meta[name="csrf-token"]').attr('content');
	</script>
	<script>
		var table = new Tabulator("#example-table-2", {
				"columns": @json($columns), 
				"data": @json($tableData), 
				"height": 500, 
				"layout": "fitColumns", 
				"movableRows": true, 
			});
				
		$.ajaxSetup({
			"method": "POST", 
			"dataType": "JSON", 
			"headers": {
				"X-CSRF-TOKEN": __token
			}, 
		});
		
		table.on('columnTitleChanged', column => {
			let columnData = column.getDefinition();
			
			if (!columnData.title.trim()) {				
				ShowResponse({
					"message": "Column title must be filled.", 
					"type": "error"
				});
				column.updateDefinition({
					"title": "New Title", 
				});
			} else {
				$.ajax({
					"url": "{!! route('admin.tabulator.update.column', [ $code ]) !!}", 
					"data": {
						"name": columnData.field, 
						"title": columnData.title, 
					}, 
					"error": (jqXHR, textStatus, errorThrown) => {
						ShowResponse(jqXHR.responseJSON);
						column.updateDefinition({
							"title": "New Title", 
						});
					}, 
				});
			}
		});
		
		table.on('cellEdited', cell => {
			let rowData = cell.getData();
			
			$.ajax({
				"url": "{!! route('admin.tabulator.update.row', [ $code ]) !!}", 
				"data": {
					"columns": rowData, 
					"col_name": cell.getColumn().getDefinition().field, 
					"id": rowData.id, 
				}, 
				"success": (data, textStatus, jqXHR) => {
					cell.getRow().update({
						"id": data.data.id, 
					});
				}, 
				"error": (jqXHR, textStatus, errorThrown) => {
					ShowResponse(jqXHR.responseJSON);
					cell.restoreInitialValue();
				}, 
			});
		});
		
		let selectedColumn = null;
		
		table.on('cellClick', (e, cell) => {
			selectedColumn = cell.getColumn();
		});
		
		table.on('headerClick', (e, column) => {
			column
		});
		
		$('#add-column').on('click', function (e) {
			table.addColumn({
				"editableTitle": true, 
				"editor": true, 
				"field": `col${GetCurrentDate()}`, 
				"headerHozAlign": "center", 
				"title": "New Title", 
			}, false);
		});
		
		$('#add-row').on('click', function (e) {
			table.addRow({}, false);
		});
		
		$('#delete-row').on('click', function (e) {
			let selectedRows = table.getSelectedRows();
			
			if (selectedRows.length) {
				selectedRows.forEach(val => {
					let rowData = val.getData();
					
					$.ajax({
						"url": "{!! route('admin.tabulator.destroy.row', [ $code ]) !!}", 
						"data": {
							"_method": "DELETE", 
							"id": rowData.id, 
						}, 
						"success": (data, textStatus, jqXHR) => {
							ShowResponse(data);
							table.deleteRow(rowData.id);
						}, 
						"error": (jqXHR, textStatus, errorThrown) => {
							ShowResponse(jqXHR.responseJSON);
						}, 
					});
				});
			} else {
				ShowResponse({
					"message": "You haven't select any row.", 
					"type": "error", 
				});
			}
		});
		
		$('#delete-column').on('click', function (e) {
			if (selectedColumn) {
				let colData = selectedColumn.getDefinition();
				
				$.ajax({
					"url": "{!! route('admin.tabulator.destroy.column', [ $code ]) !!}", 
					"data": {
						"_method": "DELETE", 
						"name": colData.field, 
					}, 
					"success": (data, textStatus, jqXHR) => {
						ShowResponse(data);
						selectedColumn.delete();
					}, 
					"error": (jqXHR, textStatus, errorThrown) => {
						ShowResponse(jqXHR.responseJSON);
					}, 
				});
			} else {
				ShowResponse({
					"message": "You haven't select any column.", 
					"type": "error", 
				});
			}
		});
	</script>
@endpush