<?php
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 7/11/15
 * Time: 4:36 PM
 */

$buttonSubmit = form_submit('', $this->lang->line('Save'), 'data-toggle="tooltip" data-placement="left" class="btn btn-info" type=submit title="' . $tooltipSave . '"');
$buttonCancel = anchor($urlCancel, $this->lang->line('Cancel'), array('title'=>$tooltipCancel, 'class'=>'btn btn-info', 'data-toggle'=>'tooltip', 'data-placement'=>'right'));

$groupContent = <<<HTML
<div class="col-sm-offset-2 col-sm-10">
{$buttonSubmit}
{$buttonCancel}
</div>
HTML;

echo $groupContent;
