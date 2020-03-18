<h1>Task display view</h1>
<?php //echo $task->task_name;?>
<?php echo $this->session->flashdata('task_updated'); ?>

<br>

<table border cellpadding='6' class="text-center table-hover" style="min-width:100%; border:1px solid black;">
    <thead>
        <tr>
        <!-- <th>No</th> -->
        <th>Id</th>
        <th>Task Name</th>
        <th>Task Description</th>
        <th>Project Name</th>
        <th>Date Created</th>
        <th>Due Date</th>
        <!-- <th>View</th> -->
        <!-- <th>Delete</th> -->
        </tr>

    </thead>
    <tbody>
        <?php //$no = 1; ?> 
        <?php foreach($task as $task_single): ?>
            <?php echo '<tr>'; ?>
            <!-- <td><?php //echo $no; ?></td> -->
            <td><?php echo $task_single->id; ?></td>
            <td>
                <?php echo $task_single->task_name; ?><br>
                <a href="<?php echo base_url(); ?>tasks/edit/<?php echo $task_single->id; ?>">Edit</a>
                <a href="<?php echo base_url();?>tasks/delete/<?php echo $task_single->project_id;?>/<?php echo $task_single->id; ?>" class='ml-4'>Delete</a></td>
                <td><?php echo $task_single->task_body; ?></td>
                <td><?php echo $project_name; ?></td>
            <td><?php echo $task_single->date_created; ?></td>
            <td><?php echo $task_single->due_date; ?></td>
            <td><a href="<?php echo base_url(); ?>tasks/mark_complete/<?php echo $task_single->id; ?>">Mark Completed</a></td>
            <td><a href="<?php echo base_url(); ?>tasks/mark_incomplete/<?php echo $task_single->id; ?>">Mark Incomplete</a></td>

            <!-- <td><a href="<?php //echo base_url()?>tasks">view</a></td> -->
            <?php echo '</tr>' ?>
            <?php //$no++; ?>  
        <?php endforeach; ?>
    </tbody>
</table>
