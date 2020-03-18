<h2 class="text-center text-danger">Create Project</h2>

<?php $attribures = array('id' => 'create_form', 'class' => 'form_horizontal'); ?>

<?php echo validation_errors("<p class='bg-danger rounded text-light'>"); ?>

<?php echo form_open('projects/create', $attribures); ?>

<div class="form-group">
<?php echo form_label('Project Name: '); ?>

<?php
$data = array(
    'class' => 'form-control',
    'placeholder' => 'Enter Projectname',
    'name' => 'project_name'
    // 'required'=>'required'
);
?>

<?php echo form_input($data); ?>

</div>


<div class="form-group">
<?php echo form_label('Project Description: '); ?>
<?php

$data = array(
    'class'=>'form-control',
    'name'=>'project_body'
);

?>
<?php echo form_textarea($data); ?>
</div>

<div class="form-group">

<?php
$data = array(
    'class' => 'btn btn-success',
    'value' => 'Create',
    'style' => 'margin-left:40%;',
    'name' => 'submit'
);
?>

<?php echo form_submit($data); ?>

</div>



<?php echo form_close(); ?>

