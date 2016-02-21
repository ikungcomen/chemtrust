<?php

class msmMaster_controller  extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('tb_msm_master');
        
        if ($this->session->userdata('loginuser') < 1) {
            redirect('login', 'refresh');
        }
    }
    public function chem_warehouse(){
        $this->load->view('include/header');
        $this->load->view('msmmaster_view/msm_master');
        $this->load->view('include/footer');
    }
    public function check_msmmaster(){
        $chem_msm_name = $this->input->post('chem_msm_name');
        $result = $this->tb_msm_master->check_msmmaster($chem_msm_name);
        if ($result > 0){
            echo 1;
        }else{
            echo 0;
        }
        
        
                
    }
    public function add_msmmaster(){
        $chem_msm_name = $this->input->post('chem_msm_name');
        $user_id = $this->session->userdata('user_id');
        $date    = date('y-m-d');
        $result  = $this->tb_msm_master->add_msmmaster($chem_msm_name, $user_id, $date);
        if ($result > 0) {
            $this->session->set_userdata('message_save', 'true');
        } else {
            $this->session->set_userdata('message_save', 'false');
        }
        redirect('add_cemee/addCemee_controller/add_cemee');
        
    }
}

?>

