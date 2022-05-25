@extends('layouts.title')

@section('content')
	<x-form :action="route('admin.promotion.store')" :back="route('admin.promotion.index')">
      	<x-general-info>
			<x-inputs name="product_id" label="Product" type="select" note="Required" :values="['' => ''] + $products" />
			<x-inputs name="start_date" type="date" placeholder="dd/mm/yyyy" note="Required, Today or After" />
			<x-inputs name="end_date" type="date" placeholder="dd/mm/yyyy" note="Optional, After Start Date" />
			<x-inputs name="is_popup" type="checkbox" note="Optional, Selecting this will set all other promotion to 'No'" :values="['&nbsp;' => 1]" />
		</x-general-info>
		
      	<x-translatable-fields>
			<x-inputs name="title" note="Required, Min. Length: 5 chars, Max. Length: 255 chars" />
			<x-inputs name="excerpt" maxlength="150" note="Required, Min. Length: 5 chars, Max. Length: 150 chars" />
			<x-inputs name="description" type="textarea" note="Required, Min. Length: 10 chars" />
			<x-inputs name="url" label="URL" note="Required, Full Path" />
			<x-inputs name="image" type="image" note="Required, Allowed Types: .jpeg, .jpg, .png, Recommended File Size: 500kb" />
		</x-translatable-fields>
	</x-form>
@stop

@push('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	$(document).ready(function () {
		$('select#product_id').select2({
			"placeholder": "-- SELECT PRODUCT --"
		});
		
		$('input#start_date').datepicker({
			"autoclose": true, 
			"format": "dd/mm/yyyy", 
			"startDate": "+0d"
		});
		
		$('input#end_date').datepicker({
			"autoclose": true, 
			"format": "dd/mm/yyyy", 
			"startDate": "+1d"
		});
		
		CKEDITOR.replace('description');
		
		$('input#image').on('change',function(){
			let t = $(this);
			
			t.next('.custom-file-label').empty().append(t.val());
		})
	});
</script>
@endpush