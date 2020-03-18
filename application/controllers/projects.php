<?php

class Projects extends CI_Controller{


    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('no_access','<h1 class="text-light bg-danger rounded">Sorry, no access granted,first login.</h1>');
            redirect('home/index');
        }
    }


    public function index()
    {

        // $this->load->model('project_model');
        $data['projects'] = $this->project_model->get_projects();

        $data['main_view'] = "projects/index.php";      
        $this->load->view('layout/main',$data);

    }

    public function display($project_id){
        // $this->load->model('project_model');

        $data['completed_task'] = $this->project_model->get_project_tasks($project_id, false);

        $data['not_completed_task'] = $this->project_model->get_project_tasks($project_id, true);

        $data['project'] = $this->project_model->get_project($project_id);

        $data['main_view'] = "projects/display.php";      
        $this->load->view('layout/main',$data);
    }

    public function create(){

        $this->session->userdata('user_id');
        $this->form_validation->set_rules('project_name','Project Name','trim|required');
        $this->form_validation->set_rules('project_body','Project Body','trim|required');

        if($this->form_validation->run()==FALSE){

            $data['main_view'] = 'projects/create_project';
            $this->load->view('layout/main',$data);


        }else{
            $data = array(
                'project_user_id'=>$this->session->userdata('user_id'),
                'project_name'=>$this->input->post('project_name'),
                'project_body'=>$this->input->post('project_body')
            );
            if($this->project_model->create_project($data)){
                $this->session->set_flashdata('project_created','<h2 class="text-success">Your Project has been created successfuly..</h2>');
                redirect('projects/index');
            }
        }



    }


    public function edit($project_id){
        $this->session->userdata('user_id');
        $this->form_validation->set_rules('project_name','Project Name','trim|required');
        $this->form_validation->set_rules('project_body','Project Body','trim|required');

        if($this->form_validation->run() == FALSE){

            $data['project_data'] = $this->project_model->get_projects_info($project_id);

            $data['main_view'] = 'projects/edit_project';
            $this->load->view('layout/main',$data);
        }else{
            $data = array(
                'project_user_id' => $this->session->userdata('user_id'),
                'project_name'=>$this->input->post('project_name'),
                'project_body'=>$this->input->post('project_body')                
            );
            if($this->project_model->edit_project($project_id,$data)){
                $this->session->set_flashdata('project_updated','<h2 class="text-success">Yoy edited project successfuly</h2>');
                redirect('projects/index');
            }
        }




    }


    public function delete($project_id){

        $this->project_model->delete_project_task($project_id);
        $this->project_model->delete_project($project_id);
        $this->session->set_flashdata('delete_project','<h2 class="text-success">Your Project has been successfuly deleted.</h2>');
        redirect('projects/index');
    }
}
