<?php
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 7/11/15
 * Time: 3:20 PM
 */

if(is_null($data) || empty($data))
{
	echo '<div class="alert alert-info" role="alert">' . $message . '</div>';
}else{
	// Template array for table
	$template = array(
		'table_open'            => '<table class="striped bordered hoverable item-action">',
		'table_close'           => '</table>'
	);
	$this->table->set_heading($headings);
	$this->table->set_template($template);
	echo $this->table->generate($data);
}