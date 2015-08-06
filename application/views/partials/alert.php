<?php
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 7/11/15
 * Time: 3:50 PM
 */

$showAlert = "display:none";
if(validation_errors() !== "" || !is_null($this->session->flashdata('error_message'))){
	$showAlert = "display:block";
}
?>

<div class="alert alert-danger" style="<?php echo $showAlert ?>">
	<?php
		if(!is_null($this->session->flashdata('error_message')))
			echo $this->lang->line($this->session->flashdata('error_message'));
		echo validation_errors();
	?>
</div>
