<?php

class Tasks extends CI_Controller{

    public function display($task_id){

        $data['project_id'] = $this->tasks_model->get_task_project_id($task_id);
        $data['project_name'] = $this->tasks_model->get_project_name($data['project_id']);

        $data['task'] = $this->tasks_model->get_task($task_id);

        $data['main_view'] = "tasks/display";
        $this->load->view('layout/main',$data);

    }


    public function create($project_id){

        $this->form_validation->set_rules('task_name','Task Name','trim|required');
        $this->form_validation->set_rules('task_body','Task Body','trim|required');

        if($this->form_validation->run() == FALSE){
            $data['main_view'] = "tasks/create_task";
            $this->load->view('layout/main',$data);
        }else{
            $data = array(
                'project_id'=>$project_id,
                'task_name' => $this->input->post('task_name'),
                'task_body' => $this->input->post('task_body'),
                'due_date'=>$this->input->post('due_date')
            );

            if($this->tasks_model->create_task($data)){
                $this->session->set_flashdata('task_created','<h3 class="bg-success text-light">You have successfuly created task.</h3>');
                redirect('projects/index');
            }

        }

    }



    public function edit($task_id){

        $this->form_validation->set_rules('task_name','Task Name','trim|required');
        $this->form_validation->set_rules('task_body','Task Body','trim|required');

        if($this->form_validation->run() == FALSE){

            // $data['project_id']=$this->tasks_model->get_task_project_id($task_id);
            // $data['project_name'] = $this->tasks_model->get_project_name($data['project_id']);
            $data['the_task'] = $this->tasks_model->get_task_project_data($task_id);


            $data['main_view'] = "tasks/edit_task";
            $this->load->view('layout/main',$data); 
        }else{
            $project_id = $this->tasks_model->get_task_project_id($task_id); 
            $data = array(

                'project_id'=>$project_id,
                'task_name'=>$this->input->post('task_name'),
                'task_body'=>$this->input->post('task_body'),
                'due_date'=>$this->input->post('due_date')
            );
            if($this->tasks_model->edit_task($task_id,$data)){
                $this->session->set_flashdata('task_updated','<h3 class="bg-success text-light">You have successfuly updated your task..</h3>');
                redirect('projects');
            }
        }

    }


    public function delete($project_id,$task_id){
        $this->tasks_model->delete_task($task_id);
        $this->session->set_flashdata('task_deleted','<h3 class="text-light bg-success rounded">You have successfuly deleted task</h3>');
        redirect('projects/display/'.$project_id.'');
    }

    public function mark_complete($task_id){
        if($this->tasks_model->mark_complete($task_id)){
            $project_id = $this->tasks_model->get_task_project_id($task_id);
            $this->session->set_flashdata('mark_completed','<h3 class="text-light bg-success rounded">You have completed your task.</h3>');
            redirect('projects/display/'.$project_id.'');
        }
    }

    public function mark_incomplete($task_id){
        if($this->tasks_model->mark_incomplete($task_id)){
            $project_id = $this->tasks_model->get_task_project_id($task_id);
            $this->session->set_flashdata('mark_incomplete','<h3 class="text-light bg-success rounded">You have incomplete your task.</h3>');
            redirect('projects/display/'.$project_id.'');
        }
    }


}

?>