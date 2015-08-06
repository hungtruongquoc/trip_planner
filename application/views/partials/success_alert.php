<?php
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 7/9/15
 * Time: 2:59 AM
 */
if(!is_null($this->session->flashdata('success_message'))) {
	echo '<div class="row">';
	echo '<div class="alert alert-success" role="alert">';
	echo $this->lang->line($this->session->flashdata('success_message'));
	echo '</div>';
	echo '</div>';
}
