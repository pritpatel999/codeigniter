<h2 class="text-center text-danger">Edit Project</h2>

<?php $attribures = array('id' => 'create_form', 'class' => 'form_horizontal'); ?>

<?php echo validation_errors("<p class='bg-danger rounded text-light'>"); ?>

<?php echo form_open('projects/edit/' . $project_data->id . '', $attribures); ?>

<div class="form-group">
<?php echo form_label('Project Name: '); ?>

<?php



$data = array(
    'class' => 'form-control',
    'name' => 'project_name',
    'value'=> $project_data->project_name
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
    'name'=>'project_body',
    'value'=>$project_data->project_body
);

?>
<?php echo form_textarea($data); ?>
</div>

<div class="form-group">

<?php
$data = array(
    'class' => 'btn btn-success',
    'value' => 'Update',
    'style' => 'margin-left:40%;',
    'name' => 'submit'
);
?>

<?php echo form_submit($data); ?>

</div>



<?php echo form_close(); ?>

