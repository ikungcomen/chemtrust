<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('DBHelper');
        $this->load->database();
       
    }

    public function index() {
       $this->load->view('login/login');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');


        $usr_result = $this->DBHelper->login($username, $password);
        $user_prefix    = "";
        $user_name      = "";
        $user_last_name = "";
        $user_id        = "";
        $user_role      = "";
        $user_factory   = "";
        $user_pass = "";

        foreach ($usr_result->result() as $row) {
            $user_prefix    = $row->user_prefix;
            $user_name      = $row->user_name;
            $user_last_name = $row->user_last_name;
            $user_role      = $row->user_role;
            $user_id        = $row->user_id;
            $user_pass        = $row->user_pass;
            $user_factory   = $row->user_factory;
            
        }
        if ($usr_result->num_rows() > 0) {
            $sessiondata = array(
                'name'         => $user_prefix." ".$user_name . " " .$user_last_name,
                'user_role'    => $user_role,
                'user_id'      => $user_id,
                'user_pass'      => $user_pass,
                'user_factory' => $user_factory,
                'loginuser'    => TRUE
            );
            $this->session->set_userdata($sessiondata);
            $this->session->set_userdata('picture_user', $user_factory);
            redirect('main_cemee/main_controller');
        } else {
            $this->session->set_userdata('message_register', 'N');
            $this->session->unset_userdata('picture_user');
            $this->session->sess_destroy();
            $this->load->view('login/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->session->unset_userdata('picture_user');
        redirect("login", "refresh");
        exit();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */