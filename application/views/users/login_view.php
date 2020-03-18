<?php if($this->session->userdata('logged_in')): ?>

    <h2>Logout</h2>

    <?php echo form_open('users/logout'); ?>

    <?php
    
    $data = array(
        'class'=>'btn btn-primary',
        'name'=>'submit',
        'value'=>'Logout'
    );
    ?>
    <p>
    <?php if($this->session->userdata('username')): ?>
        <?php echo "You are logged in as " . $this->session->userdata('username');  ?>
    <?php endif;?>
    </p>
    <?php echo form_submit($data); ?>


    <?php echo form_close(); ?>

<?php else: ?>

<h2>Login Form</h2>

<?php $attribures = array('id' => 'login_form', 'class' => 'form_horizontal'); ?>

<?php if($this->session->flashdata('errors')): ?>             <!-- in htis type of if statement i have to write : instead of semicilumn. -->
<?php echo $this->session->flashdata('errors'); ?>
<?php endif; ?>

<?php echo form_open('users/login', $attribures); ?>

<div class="form-group">
    <?php echo form_label('Username:'); ?>

    <?php
    $data = array(
        'class' => 'form-control',
        'placeholder' => 'Enter Username',
        'name' => 'username'
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
        'name' => 'password'
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
        'name' => 'confirm_password'
        // 'required'=>'required',
        // 'minlength'=>'3',
    );
    ?>

    <?php echo form_password($data); ?>

</div>



<div class="form-group">

    <?php
    $data = array(
        'class' => 'btn btn-primary',
        'value' => 'Login',
        'name' => 'submit'
    );
    ?>

    <?php echo form_submit($data); ?>

</div>



<?php echo form_close(); ?>

<?php endif; ?>