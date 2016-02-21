<?php
class chemwarehouse_controller extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('tb_chem_warehouse');
        
        if ($this->session->userdata('loginuser') < 1) {
            redirect('login', 'refresh');
        }
    }
    
    public function chem_warehouse(){
        $this->load->view('include/header');
        $this->load->view('chemwarehouse_view/chem_warehouse');
        $this->load->view('include/footer');
    }
    public function check_chemwarehouse(){
        $chem_warehouse_code = $this->input->post('chem_warehouse_code');
        $result = $this->tb_chem_warehouse->check_chemwarehouse($chem_warehouse_code);
        if ($result > 0){
            echo 1;
        }else{
            echo 0;
        }
        
        
                
    }
    public function add_chemwarehouse(){
        $chem_warehouse_code = $this->input->post('chem_warehouse_code');
        $chem_warehouse_name = $this->input->post('chem_warehouse_name');
        $chem_warehoue_rule = $this->input->post('chem_warehouse_code');
        $chem_warehouse_user_control = $this->input->post('chem_warehouse_code');
        $user_id = $this->session->userdata('user_id');
        $date = date('y-m-d');
        $result = $this->tb_chem_warehouse->add_chemwarehouse($chem_warehouse_code, $chem_warehouse_name, $chem_warehoue_rule, $chem_warehouse_user_control, $user_id, $date);
        if ($result > 0) {
            $this->session->set_userdata('message_save', 'true');
        } else {
            $this->session->set_userdata('message_save', 'false');
        }
        redirect('add_cemee/addCemee_controller/add_cemee');
        
    }
    
    
    
    
    
}


?>

