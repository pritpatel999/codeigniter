<h2 class="text-center text-danger">Registration Form</h2>

<?php $attribures = array('id' => 'register_form', 'class' => 'form_horizontal'); ?>

<?php echo validation_errors("<p class='bg-danger rounded text-light'>"); ?>

<?php echo form_open('users/register', $attribures); ?>

<div class="form-group">
<?php echo form_label('Firstname:'); ?>

<?php
$data = array(
    'class' => 'form-control',
    'placeholder' => 'Enter Firstname',
    'name' => 'first_name',
    'value'=>set_value('first_name')
    // 'required'=>'required'
);
?>

<?php echo form_input($data); ?>

</div>


<div class="form-group">
<?php echo form_label('Lastname:'); ?>

<?php
$data = array(
    'class' => 'form-control',
    'placeholder' => 'Enter Lastname',
    'name' => 'last_name',
    'value' => set_value('last_name')
    // 'required'=>'required'
);
?>

<?php echo form_input($data); ?>

</div>


<div class="form-group">
<?php echo form_label('Email:'); ?>

<?php
$data = array(
    'class' => 'form-control',
    'placeholder' => 'abc@gmail.com',
    'name' => 'email',
    'value' => set_value('email')
    // 'required'=>'required'
);
?>

<?php echo form_input($data); ?>

</div>






<div class="form-group">
<?php echo form_label('Username:'); ?>

<?php
$data = array(
    'class' => 'form-control',
    'placeholder' => 'Enter Username',
    'name' => 'username',
    'value' => set_value('username')
    // 'required'=>'required'
);
?>

<?php echo form_input($data); ?>

</div>


<div class="form-group">
<?php echo form_label('Password:'); ?>

<?php
$data = array(
    'class' => 'form-control',
    'placeholder' => 'Enter Password',
    'name' => 'password',
    // 'value' => set_value('password')
    // 'required'=>'required',
    // 'minlength'=>'3',
);
?>

<?php echo form_password($data); ?>

</div>


<div class="form-group">
<?php echo form_label('confirm Password:'); ?>

<?php
$data = array(
    'class' => 'form-control',
    'placeholder' => 'Confirm Password',
    'name' => 'confirm_password',
    // 'value' => set_value('confirm_password')
    // 'required'=>'required',
    // 'minlength'=>'3',
);
?>

<?php echo form_password($data); ?>

</div>



<div class="form-group">

<?php
$data = array(
    'class' => 'btn btn-success',
    'value' => 'Register',
    'style' => 'margin-left:40%;',
    'name' => 'submit'
);
?>

<?php echo form_submit($data); ?>

</div>



<?php echo form_close(); ?>

