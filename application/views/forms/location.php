<?php
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 7/11/15
 * Time: 10:37 PM
 */
// Intializes data
$tooltipSave = $this->lang->line('Tooltip_SaveLocation');
$tooltipCancel = $this->lang->line('Tooltip_CancelLocation');
$doesLocationExist = isset($location) && !is_null($location);
$defaultName = $doesLocationExist ? html_escape($location->getName()): '';
$defaultDescription = $doesLocationExist ? html_escape($location->getDescription()) : '';
$dataDescriptionTextArea = array('id'=>'description', 'name'=>'description', 'rows'=>'10');
$dataNameText = array('id'=>'name', 'name'=>'name');
// Starts outputting HTML
$this->load->view('partials/alert');
?>

<?php echo form_open($urlSubmit, array('class'=>'form-horizontal')) ?>
<div class="form-group">
	<?php echo form_label($this->lang->line('Name'), 'name', array('class'=>'col-sm-2 control-label')) ?>
	<div class="col-sm-10">
		<?php echo form_input($dataNameText, set_value('name', $defaultName), 'class="form-control"') ?>
	</div>
</div>
<div class="form-group">
	<?php echo form_label($this->lang->line('Description'), 'description', array('class'=>'col-sm-2 control-label')) ?>
	<div class="col-sm-10">
		<?php echo form_textarea($dataDescriptionTextArea, set_value('description', $defaultDescription), 'class="form-control"') ?>
	</div>
</div>

<div class="form-group">
	<?php
	$this->load->view('partials/button_group_entry', array('urlCancel'=>$urlCancel, 'tooltipSave'=>$tooltipSave,
						'tooltipCancel'=>$tooltipCancel));
	?>
</div>
<?php echo form_close() ?>