@extends('layouts.title')

@section('content')
	<x-form :action="route('admin.faq.item.update', [$slug, $faqID, $data->id])" type="edit" :back="route('admin.faq.item.index', [$slug, $faqID])">
      	<x-translatable-fields type="edit" :languages="$languages" :lang="$lang">
			<x-inputs name="title" note="Required, Min. Length: 5 chars, Max. Length: 255 chars" :old="$translate ? $translate->title : ''" />
			<x-inputs name="slug" note="Unique, Min. Length: 5 chars, Max. Length: 255 chars, Format: [alphanumeric(s)]-[alphanumeric(s)]" :old="$translate ? $translate->slug : ''" />
			<x-inputs name="description" type="textarea" note="Required, Min. Length: 10 chars" :old="$translate ? $translate->description : ''" />
		</x-translatable-fields>
	</x-form>
@stop

@push('js')
<script>
	function SetTranslatable(key, value) {
		$(`#${key}`).val(value);
	
		if (key === 'description')
			CKEDITOR.instances[key].setData(value);
	}
	
	function EmptyTranslatable() {
		let trans = $('div#translatables'), 
			txt = trans.find('input[type=text]'), 
			txa = trans.find('textarea');
		
		if (txt.length)
			txt.val('');
		
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
			"url": "{{ route('admin.faq.item.ajax.get-translatable', [$slug, $faqID, $data->id]) }}", 
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
		CKEDITOR.replace('description');
		
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
	});
</script>
@endpush