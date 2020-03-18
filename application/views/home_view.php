<p class="bg-success">

<?php if($this->session->flashdata('login_success')): ?>
 <?php  echo $this->session->flashdata('login_success'); ?>  
<?php endif; ?>

</p>

<p class="bg-success">
    <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo $this->session->flashdata('user_registered'); ?>
    <?php endif; ?>
</p>

<p class="bg-danger">

<?php if($this->session->flashdata('login_failed')): ?>
<?php    echo $this->session->flashdata('login_failed');  ?> 
<?php endif; ?>

</p>

<p class="bg-danger">

<?php if($this->session->flashdata('no_access')): ?>
<?php    echo $this->session->flashdata('no_access');  ?> 
<?php endif; ?>

</p>


<?php if($this->session->userdata('logged_in')): ?>
    <h3><u> Projects</u></h3>
<table border cellpadding='6' class="text-center table-hover" style="min-width:100%; border: 4px dashed #34a742;">
    <thead>
        <tr>
        <th>No</th>
        <th>Id</th>
        <th>Project Name</th>
        <th>Project Description</th>
        <th>View</th>
        <!-- <th>Delete</th> -->
        </tr>

    </thead>
    <tbody>
        <?php $no = 1; ?> 
        <?php foreach($projects as $project): ?>
            <?php echo '<tr>'; ?>
            <td><?php echo $no; ?></td>
            <td><?php echo $project->id; ?></td>
            <td><?php echo $project->project_name; ?></td>
            <td><?php echo $project->project_body; ?></td>
            <td><a href="<?php echo base_url()?>projects/display/<?php echo $project->id; ?>">view</a></td>
            <?php echo '</tr>' ?>
            <?php $no++; ?>  
        <?php endforeach; ?>
    </tbody>
</table>



<h3><u> Tasks</u></h3>
<table border cellpadding='6' class="text-center table-hover" style="min-width:100%; border:1px solid black;">
    <thead>
        <tr>
        <th>No</th>
        <th>Id</th>
        <th>task Name</th>
        <th>task Description</th>
        <th>project name</th>
        <th>View</th>
        <!-- <th>Delete</th> -->
        </tr>

    </thead>
    <tbody>
        <?php $no = 1; ?> 
        <?php foreach($tasks as $task): ?>
            <?php echo '<tr>'; ?>
            <td><?php echo $no; ?></td>
            <td><?php echo $task->id; ?></td>
            <td><?php echo $task->task_name; ?></td>
            <td><?php echo $task->task_body; ?></td>
            <td><?php echo $task->project_name; ?></td>
            <td><a href="<?php echo base_url()?>tasks/display/<?php echo $task->id; ?>">view</a></td>
            <?php echo '</tr>' ?>
            <?php $no++; ?>  
        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>

<div class="jumbotron text-center">
    <h2>Wlcome to the CI APP <p> <small style="font-weight:100; font-size:22px;">Login to see your project</small></p></h2>
</div>
<?php endif; ?>