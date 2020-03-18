<?php

class User_model extends CI_Model {
    
    public function get_users($user_id){
        // $query = $this->db->get('users');
        // return $query->result();
        
        $this->db->where(['id' => $user_id,'username'=>"prit"]);          //in this in controller i have to give id 1 because this where work as a id=$user_id AND username="prit".  in database username prit is inside the row where id=1.
        // $this->db->where('id' , $user_id);
        $query = $this->db->get('users');
        // $query = $this->db->query("SELECT * FROM users WHERE id = $user_id");
        // return $query->num_rows();      //this will give total number of rows.
        // return $query->num_fields();       //this will give tottal number of columns.
        return $query->result();



        // $config['hostname']="localhost";
        // $config['username']="root";
        // $config['password']="";
        // $config['database']="codeigniter_db";
        
        // $config_2['hostname']="localhost";
        // $config_2['username']="root";
        // $config_2['password']="";
        // $config_2['database']="codeigniter_db";
        
        // $connection = $this->load->database($config);
        // $connection_2 = $this->load->database($config_2);
        // $query = $this->db->query("SELECT * FROM users");
        // return $query->result();


    }


    // public function create_user($data){
    //     $this->db->insert('users',$data);
    // }

    // public function update_user($data,$id){
    //     $this->db->where(['id'=>$id]);
    //     $this->db->update('users',$data);
    // }

    // public function delete_user($id){
    //     $this->db->where(['id'=>$id]);
    //     $this->db->delete('users');
    // }




    public function create_user(){


        $encrypted_pass = password_hash($this->input->post('password'),PASSWORD_BCRYPT,array(['cost'=>10]));

        $data = array(
            'firstname'=>$this->input->post('first_name'),
            'lastname'=>$this->input->post('last_name'),
            'email'=>$this->input->post('email'),
            'username'=>$this->input->post('username'),
            'password'=>$encrypted_pass
        );

        $insert_data = $this->db->insert('users',$data);
    
        return $insert_data;
    }





    public function login_user($username,$password){

        $this->db->where(['username' => $username]);
        $query = $this->db->get('users');

        $db_password = $query->row(2)->password;

        if(password_verify($password,$db_password)){
            return $query->row(0)->id;
        }else{
            return false;
        }


        // if($query->num_rows()==1){
        //     return $query->row(0)->id;
        // }else{
        //     return false;
        // }
    }
}


?>