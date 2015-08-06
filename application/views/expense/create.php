<h2><?php echo $Title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('expense/create', array('class'=>'form-horizontal')) ?>

    <label for="Name">Title</label>
    <input type="input" name="Name" /><br />

    <label for="Description">Description</label>
    <textarea name="Description"></textarea><br />

    <input type="submit" name="submit" value="Create expense" />

</form>
