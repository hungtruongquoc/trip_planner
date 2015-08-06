<?php
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 7/8/15
 * Time: 8:58 PM
 */
// Array date for create button
$dataCreateButton = array(
	'urlCreate'=>base_url('locations/create'),
	'tooltip'=>$this->lang->line('Tooltip_NewLocation'),
	'caption'=>$this->lang->line('Caption_NewLocation')
);
// Heading array for table
$headings = array('', $this->lang->line('Name'), '');
// No record found message
$message = $this->lang->line('Message_NoLocationFound');
// Start outputing HTML
$this->load->view('partials/success_alert');
?>
<div class="row">
	<?php $this->load->view('partials/create_button', $dataCreateButton) ?>
</div>
<div class="row">
	<?php
	$this->load->view('partials/data_table', array('headings'=>$headings, 'data'=>$locations, 'message'=>$message));
	?>
</div>