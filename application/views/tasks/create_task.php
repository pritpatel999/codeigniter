<h2>Create Task</h2>
<br>


<?php $attribute = array('id'=>'create_form','class'=>'form_horizontal'); ?>
<?php echo form_open('tasks/create/'. $this->uri->segment(3). '',$attribute) ?>
<div class="form-group">
<?php echo form_label('<h4>Task Name:</h4>'); ?>
<?php

$data=array(

    'name'=>'task_name',
    'class'=>'form-control',
    'placeholder'=>'Enter Task Name'
);

?>

<?php echo form_input($data) ?>

</div>

<div class="form-group">
<?php echo form_label('<h4>Task Description:</h4>') ?>
<?php
$data = array(
    
    'name'=>'task_body',
    'class'=>'form-control',
    // 'placeholder'=>'Enter Task Desciption'

);
?>
<?php echo form_textarea($data); ?>

</div>

<div class="form-group">
<?php
$data = array(
    
    'name'=>'due_date',
    'class'=>'form-control',
    'type'=>'date'
    // 'placeholder'=>'Enter Task Desciption'

);
?>
<?php echo form_input($data); ?>

</div>


<div class="form-group">
    <?php
    
    $data=array(
        'name'=>'create',
        'class'=>'btn btn-primary',
        'value'=>'create',
        'style'=>'margin-left:43%;'
    );
    
    ?>
<?php echo form_submit($data); ?>

</div>
<?php echo form_close(); ?>