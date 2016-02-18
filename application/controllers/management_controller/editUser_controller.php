<?php

class editUser_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('tb_user');
        if ($this->session->userdata('loginuser') < 1) {
            redirect('login', 'refresh');
        }
    }

    public function index() {
        $result['user'] = $this->tb_user->select_user();
        $this->load->view('include/header');
        $this->load->view("management_view/manage_user", $result);
        $this->load->view('include/footer');
    }

    public function delete_user($user_id) {
        $result_delete = $this->tb_user->delete_user($user_id);
        if ($result_delete > 0) {
            $this->session->set_userdata('message_save', 'true');
        } else {
            $this->session->set_userdata('message_save', 'false');
        }
        redirect('management_controller/editUser_controller');
    }

    public function update_user($user_id) {
        $result_delete = $this->tb_user->update_user($user_id);
    }

    public function update_approve_status($user_id) {
        $result_approve = $this->tb_user->update_approve_status($user_id);
        redirect('management_controller/editUser_controller', 'refresh');
    }

    public function update_unapprove_status($user_id) {
        $result_unapprove = $this->tb_user->update_unapprove_status($user_id);
        redirect('management_controller/editUser_controller', 'refresh');
    }
    

}

?>
