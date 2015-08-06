<?php
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 6/22/15
 * Time: 9:51 PM
 */

// Initializes required data
$tooltipSave = $this->lang->line('Tooltip_SaveTrip');
$tooltipCancel = $this->lang->line('Tooltip_CancelTrip');
$urlCancel = base_url('trips/index');
// Starts output HTML
$this->load->view('partials/alert');
?>

<?php echo form_open('trips/create', array('class'=>'form-horizontal')) ?>
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label"><?php echo $this->lang->line('Name')?></label>
		<div class="col-sm-10">
			<input type="text" name="name" value="<?php echo set_value('name')?>" class="form-control" id="name">
		</div>
	</div>
	<div class="form-group">
		<label for="description" class="col-sm-2 control-label"><?php echo $this->lang->line('Description')?></label>
		<div class="col-sm-10">
			<input type="text" name="description" value="<?php echo set_value('description')?>" class="form-control" id="description">
		</div>
	</div>
	<div class="form-group">
		<label for="dateStart" class="col-sm-2 control-label"><?php echo $this->lang->line('StartDate')?></label>
		<div class="col-sm-4">
			<div class="input-group date" id="dtpDateFrom">
				<input type="text" name="dateStart" value="<?php echo set_value('dateStart')?>" class="form-control" id="dateStart">
				<span class="input-group-addon">
                    <span class="icon-Calendar-3 tp-icon"></span>
                </span>
			</div>
		</div>
		<label for="dateEnd" class="col-sm-2 control-label"><?php echo $this->lang->line('EndDate')?></label>
		<div class="col-sm-4">
			<div class="input-group date" id="dtpDateTo">
				<input type="text" name="dateEnd" value="<?php echo set_value('dateEnd')?>" class="form-control" id="dateEnd">
					<span class="input-group-addon">
	                    <span class="icon-Calendar-3 tp-icon"></span>
	                </span>
			</div>
		</div>
	</div>
	<div class="form-group">
		<?php
		$this->load->view('partials/button_group_entry', array('urlCancel'=>$urlCancel, 'tooltipSave'=>$tooltipSave,
			'tooltipCancel'=>$tooltipCancel));
		?>
	</div>
</form>
