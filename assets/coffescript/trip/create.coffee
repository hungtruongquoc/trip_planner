$ ->
	options =
		locale: date_locale
		format: 'L'
	$('#dtpDateFrom').datetimepicker(options)
	$('#dtpDateTo').datetimepicker(options)
	$('input').first().focus()