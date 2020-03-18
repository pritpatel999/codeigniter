<h2>Edit Task</h2>
<br>


<?php $attribute = array('id'=>'edit_form','class'=>'form_horizontal'); ?>
<?php echo form_open('tasks/edit/'. $this->uri->segment(3). '',$attribute) ?>
<div class="form-group">
<?php echo form_label('<h4>Task Name:</h4>'); ?>
<?php

$data=array(

    'name'=>'task_name',
    'class'=>'form-control',
    'value'=>$the_task->task_name
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
    'value'=>$the_task->task_body
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
    'type'=>'date',
    'value'=>$the_task->due_date
    // 'placeholder'=>'Enter Task Desciption'

);
?>
<?php echo form_input($data); ?>

</div>


<div class="form-group">
    <?php
    
    $data=array(
        'name'=>'edit',
        'class'=>'btn btn-primary',
        'value'=>'Update',
        'style'=>'margin-left:43%;'
    );
    
    ?>
<?php echo form_submit($data); ?>

</div>
<?php echo form_close(); ?>