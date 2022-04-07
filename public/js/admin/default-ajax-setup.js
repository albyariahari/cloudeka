$.ajaxSetup({
	"type": "POST", 
	"dataType": "JSON", 
	"headers": { 
		"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content') 
	}, 
});