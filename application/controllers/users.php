<?php

class Users extends CI_Controller
{

    public function show()
    {
        // $this->load->model('user_model');             //I autoloaded this model directly from autoload.php file.
        // $result = $this->user_model->get_users();

        // $data['welcome'] ="hello . welcome to my page";

        $data['result'] = $this->user_model->get_users(1);

        $this->load->view('user_view', $data);





        //         
?>
        <!-- // <table border style="padding:10px; border:2px ridge gray;">
// <tr>
// <th>id</th>
// <th>name</th>
// <th>password</th>
// </tr> -->
        <?php
        //     foreach ($result as $object) {
        //         echo '<tr>';    
        //         echo "<th> $object->id </th>";
        //         echo "<th> $object->username </th>";
        //         echo "<th> $object->password </th>";
        //         echo '</tr>';
        //         }
        //         
        ?>
        <!-- // </table> -->
<?php
    }

    // public function insert(){

    //     $username="sasuke";
    //     $password="uchiha";

    //     $this->user_model->create_user([
    //         'username' => $username,
    //         'password' => $password
    //     ]);
    // }


    // public function update(){

    //     $id=3;
    //     $username="itachi";
    //     $password="uchiha";

    //     $this->user_model->update_user([
    //         'username' => $username,
    //         'password' => $password
    //     ],$id);
    // }

    // public function delete(){
    //     $id=3;
    //     $this->user_model->delete_user($id);   
    // }



    public function register()
    {

        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');


        if ($this->form_validation->run() == FALSE) {

            $data['main_view'] = 'users/register_view';
            $this->load->view('layout/main', $data);
        
        }else{

            if($this->user_model->create_user()){
                $this->session->set_flashdata('user_registered','<h1 class="bg-success text-light">User has been registered successfuly</h1>');
                redirect('home/index');
            }else{
                echo "Error";
            }
        }


    }







    public function login()
    {

        // echo "hello";
        // $this->load->view('username');
        // echo $_POST['username']."<br>";
        // echo $_POST['password'];

        // echo $this->input->post('username').'<br>';
        // echo $this->input->post('password');


        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');


        if ($this->form_validation->run() == FALSE) {
            $data = array(

                'errors' => validation_errors(),

            );
            $this->session->set_flashdata($data);               //set_flashdata() function unset session automatically.

            redirect('home');
        } else {

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user_id = $this->user_model->login_user($username, $password);

            if ($user_id) {
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );
                $this->session->set_userdata($user_data);          //set_userdata() function does not unset session automatically.
                $this->session->set_flashdata('login_success', '<h1 class="bg-success text-light">you are now logged in</h1>');
                
                // $data['main_view'] = "home_view";
                // $this->load->view('layout/main', $data);
                redirect('home/index');
            } else {
                $this->session->set_flashdata('login_failed', '<h1 class="bg-danger text-light">you are not logged in</h1>');
                redirect('home/index');
            }
        }
    }


    public function logout()
    {
        session_destroy();
        // $this->session->sess_destroy();
        redirect('home/index');
    }
}

?>