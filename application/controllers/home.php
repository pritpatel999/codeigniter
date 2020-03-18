<?php

class Home extends CI_Controller{

    public function index()
    {

        if ($this->session->userdata('logged_in')) {
            
            $user_id = $this->session->userdata('user_id');
            $data['tasks'] = $this->tasks_model->get_all_tasks($user_id);
            $data['projects'] = $this->project_model->get_all_projects($user_id);
            // $this->load->view('home_view',$data);
        }

        // echo "this is home controller";

        $data['main_view'] = "home_view";      
        $this->load->view('layout/main',$data);

        // $this->load->view('home_view');
    }

}


?>