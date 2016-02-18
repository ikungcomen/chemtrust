<?php
class editPassword_controller extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('tb_user');
        if ($this->session->userdata('loginuser') < 1) {
            redirect('login', 'refresh');
        }
    }
    public function index(){
        $user_id = $this->session->userdata('user_id');
        $result['user'] = $this->tb_user->select_user_byid($user_id);
        $this->load->view('include/header');
        $this->load->view('management_view/edit_password',$result);
        $this->load->view('include/footer');
    }
    public function check_passsword(){
        $default_user_pass = $this->input->post('default_user_pass');
        $user_id = $this->session->userdata('user_id');
        $result_check_password = $this->tb_user->check_passsword($user_id, $default_user_pass);
        if ($result_check_password == 0) {
            echo json_encode("รหัสผ่านเดิมของท่าน ไม่ตรงกับข้อมูลที่มีในระบบ");
        }
    }
    public function update_passsword(){
        $user_id = $this->session->userdata('user_id');
        $default_user_pass     = $this->input->post('default_user_pass');
        $new_user_pass     = $this->input->post('new_user_pass');
        $result_update_passsword = $this->tb_user->update_passsword($user_id, $default_user_pass, $new_user_pass);
        if ($result_update_passsword > 0) {
            $this->session->set_userdata('message_save', 'true');
        } else {
            $this->session->set_userdata('message_save', 'false');
        }
        redirect('management_controller/editPassword_controller');
    }
    public function select_user($user_id){
        $result['user'] = $this->tb_user->select_user_byid($user_id);
        $this->load->view('include/header');
        $this->load->view('management_view/edit_data_user',$result);
        $this->load->view('include/footer');
    }
    public function update_user($user_id){
        $user_prefix    = $this->input->post('user_prefix');
        $user_name      = $this->input->post('user_name');
        $user_last_name = $this->input->post('user_last_name');
        $user_email     = $this->input->post('user_email');
        $user_tel       = $this->input->post('user_tel');
        $user_address   = $this->input->post('user_address');
        $user_fax       = $this->input->post('user_fax');
        $user_role      = $this->input->post('user_role');
        $date           = date('y-m-d');
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
        if (!$this->upload->do_upload('picture')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data();
            $filename = $upload_data['file_name'];
        }
        
        if (trim($filename) == "") {
            $filename = $this->session->userdata('picture_user');
        }
        $result_update_user = $this->tb_user->update_user($user_prefix, $user_name, $user_last_name, $user_email, $user_tel, $user_address, $user_fax, $user_role,$filename, $user_id, $date);
        if ($result_update_user > 0) {
            $this->session->set_userdata('message_save', 'true');
            $this->session->set_userdata('picture_user', $filename);
        } else {
            $this->session->set_userdata('message_save', 'false');
        }
        redirect('management_controller/editPassword_controller/select_user/'.$user_id);
    }
    
    
    
    
}
?>