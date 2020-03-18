<h1>Projects</h1>
<?php if($this->session->flashdata('project_created')): ?>
<?php echo $this->session->flashdata('project_created'); ?>
<?php endif; ?>

<?php if($this->session->flashdata('project_updated')): ?>
<?php echo $this->session->flashdata('project_updated'); ?>
<?php endif; ?>

<?php if($this->session->flashdata('delete_project')): ?>
<?php echo $this->session->flashdata('delete_project'); ?>
<?php endif; ?>

<?php if($this->session->flashdata('task_created')): ?>
<?php echo $this->session->flashdata('task_created'); ?>
<?php endif; ?>

<?php if($this->session->flashdata('task_updated')): ?>
<?php echo $this->session->flashdata('task_updated'); ?>
<?php endif; ?>

<?php if($this->session->flashdata('task_deleted')): ?>
<?php echo $this->session->flashdata('task_deleted'); ?>
<?php endif; ?>

<a href="<?php echo base_url();?>projects/create" class="btn btn-primary mb-3 float-right ">Create Project</a>

<table border cellpadding='6' class="text-center table-hover" style="min-width:100%; border:1px solid black;">
    <thead>
        <tr>
        <th>No</th>
        <th>Id</th>
        <th>Project Name</th>
        <th>Project Body</th>
        <th>Delete</th>
        </tr>

    </thead>
    <tbody>
        <?php $no = 1; ?> 
        <?php foreach($projects as $project): ?>
            <?php echo '<tr>'; ?>
            <td><?php echo $no; ?></td>
            <td><?php echo $project->id; ?></td>
            <td><a href="<?php echo base_url(); ?>projects/display/<?php echo $project->id; ?>"><?php echo $project->project_name; ?></a></td>
            <td><?php echo $project->project_body; ?></td>
            <td><a href="<?php echo base_url(); ?>projects/delete/<?php echo $project->id; ?>" class="btn btn-danger"><span><i class="fa fa-remove"></i></span></a></td>
            <?php echo '</tr>' ?>
            <?php $no++; ?>  
        <?php endforeach; ?>
    </tbody>
</table>