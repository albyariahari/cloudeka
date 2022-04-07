DataTable.ext.buttons.advancedFilter = {
	className: 'buttons-advanced-filter',

	text: function (dt) {
		return '<i class="fa fa-search"></i> ' + dt.i18n('buttons.advancedFilter', 'Advanced Filter');
	},

	action: function (e, dt, button, config) {
		$('#advanced-filter').collapse('toggle');
	}
};