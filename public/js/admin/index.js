const AJAXAction = (elem, url, method = 'DELETE', showResponse = 1) => {
		elem.prop('disabled', true);
		
		$.ajax({
			"url": url, 
			"data": { 
				"_method": method 
			}, 
			"success": (data, textStatus, jqXHR) => {
				ShowResponse(data, showResponse);
			}, 
			"error": (jqXHR, textStatus, errorThrown) => {
				ShowResponse({ 
					"message": errorThrown, 
					"type": "error" 
				});
			}, 
			"complete": (jqXHR, textStatus) => {
				elem.prop('disabled', false);
			}, 
		})
	}, 
	ShowResponse = (response, showResponse = 1) => {
		if (showResponse === 1) {
			swal({
				"icon": response.type, 
				"text": response.message, 
				"title": response.type === 'success' ? 'Success!' : 'Error!', 
			}).then(result => {
				if (result)
					$('.dataTable').DataTable().draw();
			});
		} else {
			$('.dataTable').DataTable().draw();
		}
	};

var dataTableId = $('#table-id').val(), 
	dataTable = $(`#${dataTableId}`), 
	datepickers = $('.datepicker'), 
	is_active = $('#is_active'), 
	doc = $(document);

dataTable.on('init.dt', function () {
	$(this).before($('#advanced-filter'));
});

datepickers.datepicker().on('change', function () {
	dataTable.DataTable().draw();
});

is_active.on('change', function () {
	dataTable.DataTable().draw();
});

doc.on('click', '.delete-button', function () {
	let t = $(this);
	
	swal({
		"buttons": {
			"cancel": {
				"className": "btn btn-info", 
				"text": "Cancel", 
				"visible": true, 
			}, 
			"confirm": {
				"className": "btn btn-danger", 
				"text": "Delete", 
			}, 
		}, 
		"dangerMode": true, 
		"icon": "warning", 
		"text": t.data('message'), 
		"title": "Are you sure?", 
	}).then(result => {
		if (result)
			AJAXAction(t, t.data('url'));
	});
}).on('click', '.order-button', function () {
	let t = $(this);
	
	AJAXAction(t, t.data('url'), 'PUT', 0);
}).on('click', '.status-button', function () {
	let t = $(this), 
		isSuccess = t.hasClass('btn-success');

	swal({
		"buttons": {
			"cancel": {
				"className": "btn btn-info", 
				"text": "Cancel", 
				"visible": true, 
			}, 
			"confirm": {
				"className": "btn btn-" + (isSuccess ? "success" : "warning"), 
				"text": (isSuccess ? "Activate" : "Deactivate"), 
			}, 
		}, 
		"dangerMode": !isSuccess, 
		"icon": "warning", 
		"text": t.data('message'), 
		"title": "Are you sure?", 
	}).then(result => {
		if (result)
			AJAXAction(t, t.data('url'), 'PUT');
	});
});