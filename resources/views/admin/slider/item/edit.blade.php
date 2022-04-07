@extends('layouts.title')

@section('content')
	<x-form :action="route('admin.slider.item.update', [$sliderID, $data->id])" type="edit" :back="route('admin.slider.item.index', [$sliderID])">
      	<x-general-info>
		@if ($sliderID == 4)
			<x-inputs name="image" type="image" note="Required, Allowed Types: .jpeg, .jpg, .png, Recommended File Size: 500kb, Recommended Dimension: 1290 x 560" :old="$data->image ? cloudekaBucketLocalUrl($data->image) : ''" />
		@else
			<x-inputs name="image" type="image" note="Required, Allowed Types: .jpeg, .jpg, .png, Recommended File Size: 500kb" :old="$data->image ? cloudekaBucketLocalUrl($data->image) : ''" />
		@endif
			<x-inputs name="video" type="video" note="Required, Allowed Types: .3gp, .avi, .flv, .mkv, .mov, .mp4, .mpeg, .ogg, .webm, .wmv, .ts, Recommended File Size: 100Mb" :old="$data->video ? cloudekaBucketLocalUrl($data->video) : ''" />
		</x-general-info>
		
      	<x-translatable-fields type="edit" :languages="$languages" :lang="$lang">
			@if ($settings['field_title'] === 1)
			<x-inputs name="title" note="Required, Min. Length: 5 chars, Max. Length: 255 chars" :old="$translate ? $translate->title : ''" />
			@endif
			
			@if ($settings['field_subtitle'] === 1)
			<x-inputs name="subtitle" note="Required, Min. Length: 5 chars, Max. Length: 255 chars" :old="$translate ? $translate->subtitle : ''" />
			@endif
			
			@if ($settings['field_description'] === 1)
			<x-inputs name="description" type="textarea" :old="$translate ? $translate->description : ''" />
			@endif
			
			@if ($settings['field_cta'] === 1)
			<x-inputs name="cta_label" label="Button Name" note="Required, Min. Length: 5 chars, Max. Length: 255 chars" :old="$translate ? $translate->cta_label : ''" />
			<x-inputs name="cta" label="Button Action Target" note="Required, Full Path" :old="$translate ? $translate->cta : ''" />
			@endif
		</x-translatable-fields>
	</x-form>
@stop

@push('js')
<script>
	const SetTranslatable =(key, value) => {
			if (key !== 'image') {
				$(`#${key}`).val(value);
			
				if (key === 'description' && $('#description').length)
					CKEDITOR.instances[key].setData(value);
			} else {
				$('div#accordion').show();
				$(`label[for=${key}][class=custom-file-label]`).empty().append(value);
				$('a#img-url').prop('href', value);
				$('img#img-display').prop('src', value);
			}
		}, 
		EmptyTranslatable = () => {
			let trans = $('div#translatables'), 
				txt = trans.find('input[type=text]'), 
				file = trans.find('input[type=file]'), 
				txa = trans.find('textarea');
			
			if (txt.length)
				txt.val('');
			
			if (file.length) {
				$.each(file, function (idx, val) {
					let div = val.parent().eq(1);
					
					div.find('div#accordion').hide();
					div.find('label[class=custom-file-label]').empty().append('Choose File');
				});
			}
			
			if (txa.length) {
				for (let a = 0; a < txa.length; a++) {
					txa.eq(a).val('');
					CKEDITOR.instances[txa[a].id].setData('');
				}
			}
		}, 
		ShowResponse = (data) => {
			swal({
				"icon": data.type, 
				"text": data.message, 
				"title": data.type === 'success' ? 'Success!' : 'Error!', 
			});
		}, 
		GetTranslatable = lang => {
			$.ajax({
				"type": "POST", 
				"dataType": "JSON", 
				"data": {
					"_token": '{{ csrf_token() }}', 
					"lang": lang
				}, 
				"url": "{{ route('admin.slider.item.ajax.get-translatable', [$sliderID, $data->id]) }}", 
				"success": (response, textStatus, jqXHR) => {
					if (response.data) {
						Object.keys(response.data).forEach(key => {
							SetTranslatable(key, response.data[key])
						});
					} else {
						EmptyTranslatable();
					}
					
					$('.overlay').hide();
				}, 
				"error": (jqXHR, textStatus, errorThrown) => {
					$('.overlay').hide();
					ShowResponse(jqXHR.responseJSON);
				}
			});
		};
</script>
<script>	
	if ($('#description').length)
		CKEDITOR.replace('description');
		
	$('input[type=file]').on('change',function () {
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
</script>
@endpush