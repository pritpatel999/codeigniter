<?php if($this->session->flashdata('mark_completed')): ?>
<?php echo $this->session->flashdata('mark_completed'); ?>
<?php endif; ?>

<?php if($this->session->flashdata('mark_incomplete')): ?>
<?php echo $this->session->flashdata('mark_incomplete'); ?>
<?php endif; ?>

<div class="row mt-5">
<div class="col-sm-9">
    <!-- <h1>project Name</h1> -->

    <h1>Project Name: <?php echo $project->project_name; ?></h1>
    <p><span class="h5"> Created On:</span> <?php echo $project->date_created; ?></p>

    <h3>Description:</h3>
    <p><?php echo $project->project_body; ?></p>


</div>


<div class="col-sm-3 float-right text-center">
<ul class="list-group">
    <h5>Project Action</h5>
    <li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/create/<?php echo $project->id; ?>">Create Task</a></li>
    <li class="list-group-item"><a href="<?php echo base_url(); ?>projects/edit/<?php echo $project->id; ?>">Edit Project</a></li>
    <li class="list-group-item"><a href="<?php echo base_url(); ?>projects/delete/<?php echo $project->id; ?>">Delete Project</a></li>
</ul>

</div>


</div>
<br>


<h4>Active Tasks</h4>
<?php if($not_completed_task): ?>
<table border cellpadding='5' class="text-center" style="min-width:100%;">
<thead>
<tr>
<th>Task Id</th>
<th>Project Id</th>
<th>Task Name</th>
<th>Task Body</th>
<th>Project Name</th>
</tr>
</thead>

<tbody>
<?php foreach ($not_completed_task as $task):?>
<?php echo '<tr>'; ?>
<td><?php echo $task->task_id ?></td>
<td><?php echo $task->project_id ?></td>
<td><a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->task_id ?>"><?php echo $task->task_name ?></a></td>
<td><?php echo $task->task_body ?></td>
<td><?php echo $task->project_name ?></td>
<?php echo '</tr>'; ?>
<?php endforeach; ?>

<?php else: ?>
<?php echo "<h2 class='text-light bg-primary rounded'>You have no task pending.</h2>" ?>
<?php endif; ?>

</tbody>

</table>



<h4>Completed Tasks</h4>
<?php if($completed_task): ?>
<table border cellpadding='5' class="text-center" style="min-width:100%;">
<thead>
<tr>
<th>Task Id</th>
<th>Project Id</th>
<th>Task Name</th>
<th>Task Body</th>
<th>Project Name</th>
</tr>
</thead>

<tbody>
<?php foreach ($completed_task as $task):?>
<?php echo '<tr>'; ?>
<td><?php echo $task->task_id ?></td>
<td><?php echo $task->project_id ?></td>
<td><a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->task_id ?>"><?php echo $task->task_name ?></a></td>
<td><?php echo $task->task_body ?></td>
<td><?php echo $task->project_name ?></td>
<?php echo '</tr>'; ?>
<?php endforeach; ?>

<?php else: ?>
<?php echo "<h2 class='text-light bg-primary rounded'>You have not completed any task.</h2>" ?>
<?php endif; ?>



</tbody>



</table>