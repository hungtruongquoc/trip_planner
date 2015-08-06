<?php
// Array date for create button
$dataCreateButton = array(
	'urlCreate'=>base_url('trips/create'),
	'tooltip'=>$this->lang->line('Tooltip_NewTrip'),
	'caption'=>$this->lang->line('Caption_NewTrip')
);
// Heading array for table
$headings = array('', $this->lang->line('StartDate'), $this->lang->line('EndDate'), $this->lang->line('Name'), '');
// No record found message
$message = $this->lang->line('Message_NoTripFound');
// Note: variable 'trips' is loaded from
// Starts outputing HTML
$this->load->view('partials/success_alert');
?>
<div class="row">
	<?php $this->load->view('partials/create_button', $dataCreateButton) ?>
</div>
<div class="row">
	<?php
		$this->load->view('partials/data_table', array('headings'=>$headings, 'data'=>$trips, 'message'=>$message));
	?>
</div>
