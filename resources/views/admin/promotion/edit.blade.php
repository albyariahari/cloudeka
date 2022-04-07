@extends('layouts.title')

@section('content')
	<x-form :action="route('admin.promotion.update', [$data->id])" type="edit" :back="route('admin.promotion.index')">
      	<x-general-info>
			<x-inputs name="product_id" label="Product" type="select" note="Required" :values="$products" :old="$data->product_id" />
			<x-inputs name="start_date" type="date" placeholder="dd/mm/yyyy" note="Required, Today or After" :old="date('d/m/Y', strtotime($data->start_date))" />
			<x-inputs name="end_date" type="date" placeholder="dd/mm/yyyy" note="Optional, After Start Date" :old="date('d/m/Y', strtotime($data->end_date))" />
			<x-inputs name="is_popup" type="checkbox" note="Optional, Selecting this will set all other promotion to 'No'" :values="['&nbsp;' => 1]" :old="$data->is_popup" />
		</x-general-info>
		
      	<x-translatable-fields type="edit" :languages="$languages" :lang="$lang">
			<x-inputs name="title" note="Required, Min. Length: 5 chars, Max. Length: 255 chars" :old="$translate ? $translate->title : ''" />
			<x-inputs name="excerpt" note="Required, Min. Length: 5 chars, Max. Length: 255 chars" :old="$translate ? $translate->excerpt : ''" />
			<x-inputs name="description" type="textarea" note="Required, Min. Length: 10 chars" :old="$translate ? $translate->description : ''" />
			<x-inputs name="url" label="URL" note="Required, Full Path" :old="$translate ? $translate->url : ''" />
			<x-inputs name="image" type="image" note="Required, Allowed Types: .jpeg, .jpg, .png, Recommended File Size: 500kb" :old="$translate ? cloudekaBucketLocalUrl($translate->image) : ''" />
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
	function SetTranslatable(key, value) {
		if (key !== 'image') {
			$(`#${key}`).val(value);
		
			if (key === 'description')
				CKEDITOR.instances[key].setData(value);
		} else {
			$('div#accordion').show();
			$(`label[for=${key}][class=custom-file-label]`).empty().append(value);
			$('a#img-url').prop('href', value);
			$('img#img-display').prop('src', value);
		}
	}
	
	function EmptyTranslatable() {
		let trans = $('div#translatables'), 
			txt = trans.find('input[type=text]'), 
			file = trans.find('input[type=file]'), 
			txa = trans.find('textarea');
		
		if (txt.length)
			txt.val('');
		
		if (file.length) {
			$('div#accordion').hide();
			$('label[class=custom-file-label]').empty().append('Choose File');
		}
		
		if (txa.length) {
			for (let a = 0; a < txa.length; a++) {
				txa.eq(a).val('');
				CKEDITOR.instances[txa[a].id].setData('');
			}
		}
	}
	
	function ShowResponse(type, message) {
		Swal.fire({
			"icon": type, 
			"title": message, 
			"type": type
		});
	}
	
	function GetTranslatable(lang) {
		$.ajax({
			"type": "POST", 
			"dataType": "JSON", 
			"data": {
				"_token": '{{ csrf_token() }}', 
				"lang": lang
			}, 
			"url": "{{ route('admin.promotion.ajax.get-translatable', [$data->id]) }}", 
			"success": function(response, textStatus, jqXHR) {
				if (response.data) {
					for (let key in response.data)
						SetTranslatable(key, response.data[key])
				} else {
					EmptyTranslatable();
				}
				
				$('.overlay').hide();
			}, 
			"error": function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR.responseJSON);
				$('.overlay').hide();
				ShowResponse('error', jqXHR.responseJSON.message);
			}
		});
	}
	
	$(document).ready(function () {
		$('select#product_id').select2();
		
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
		
		$('input#image').on('change',function () {
			let t = $(this);
			
			t.next('.custom-file-label').empty().append(t.val());
		})
		
		$('a.dropdown-item').on('click', function (e) {
			e.preventDefault();
			
			let t = $(this), 
				value = t.data('value'), 
				lang = $('input#lang');
			
			if (value !== lang.val()) {
				Swal.fire({
					"cancelButtonColor": "#D33", 
					"confirmButtonColor": "#3085D6", 
					"confirmButtonText": "Ya, pindahkan!", 
					"icon": "warning", 
					"showCancelButton": true, 
					"text": "Mungkin ada perubahan yang belum di disimpan anda yakin?", 
					"title": "Apa anda yakin?"
				}).then(function (result) {
					if (result.value === true) {
						lang.val(value);
						$('a#lang-selected').empty().append(value.toUpperCase()).append($('<span>', {"class": "caret"}));
						$('.overlay').show();
						GetTranslatable(value);
					}
				});
			}
		});
		
		$('a[data-parent="#accordion"]').on('click', function (e) {
			e.preventDefault();
			
			let t = $(this), 
				txt = t.hasClass('collapsed') ? 'Hide Content' : 'Show Content';
			
			t.empty().append(txt);
		});
	});
</script>
@endpush