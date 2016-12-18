<?php

class registerUser_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('tb_user');

        /*if ($this->session->userdata('loginuser') < 1) {
            redirect('login', 'refresh');
        }*/
    }

    public function register_user() {
        $this->load->view('include/header');
        $this->load->view("management_view/register_user");
        $this->load->view('include/footer');
    }

    public function save_user() {
        $user_prefix = $this->input->post('user_prefix');
        $user_name = $this->input->post('user_name');
        $user_last_name = $this->input->post('user_last_name');
        $user_email = $this->input->post('user_email');
        $user_tel = $this->input->post('user_tel');
        $user_address = $this->input->post('user_address');
        $user_fax = $this->input->post('user_fax');
        $user_role = $this->input->post('user_role');
        $user_id = $this->input->post('user_id');
        $user_pass = $this->input->post('user_pass');
        $user = $this->session->userdata('user_id');
        if($user =="")
        {
           $user='admin'; 
        }
        $date = date('y-m-d');
        $filename = "";
        $base_part = './picture/pic_user';
        $config['upload_path'] = $base_part;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '500';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        //------------------------------------------------------------------
        $config['file_name'] = $_SERVER['REQUEST_TIME'] . rand() . '-pic';
        $this->load->library('upload', $config);
        //------------------------------------------------------------------
        $filename = "";
        if (!$this->upload->do_upload('picture')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data();
            $filename = $upload_data['file_name'];
        }
        //if (trim($filename) == "") {
            //$filename = $this->session->userdata('picture_user');
        //}
        $result_insert = $this->tb_user->insert_user($user_prefix, $user_name, $user_last_name, $user_email, $user_tel, $user_address, $user_fax, $user_role, $user_id, $user_pass, $filename, $user, $date);
        if ($result_insert) {
            $this->session->set_userdata('message_save', 'true');
            //$this->session->set_userdata('picture_user', $filename);
        } else {
            $this->session->set_userdata('message_save', 'false');
        }
        redirect('management_controller/registerUser_controller/register_user');
    }

    public function check_user() {
        $user_id = $this->input->post('user_id');
        $count = $this->tb_user->check_user($user_id);
        $message = "มีข้อมูลชื่อผู้ใช้งาน " . $user_id . " นี้อยู่ในระบบแล้ว";
        if ($count > 0) {
            echo json_encode($message);
        }
    }
}

?>