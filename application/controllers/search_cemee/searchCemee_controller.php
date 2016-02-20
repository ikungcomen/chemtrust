<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class searchCemee_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('DBhelper');
        if ($this->session->userdata('loginuser') < 1) {
            redirect('login', 'refresh');
        }
    }
    public function show_search_cemee() {
        $this->load->view('include/header');
        $result['chem_info'] =  $this->DBhelper->search_chem('XXX','XXX');
        $this->load->view('search_cemee/search_cemee',$result);
        $this->load->view('include/footer');
    }
    public function search_chem_no_auto(){
        $chem_no = $this->input->post('chem_no');
        $result = $this->DBhelper->search_chem_no_auto($chem_no);
        echo json_encode($result);
    }
    public function search_chem_name_auto(){
        $chem_name = $this->input->post('chem_name');
        $result = $this->DBhelper->search_chem_name_auto($chem_name);
        echo json_encode($result);
    }
    public function search_chem(){
        $chem_no   = $this->input->post('chem_no');
        $chem_name = $this->input->post('chem_name');
        $result['chem_info'] =  $this->DBhelper->search_chem($chem_no,$chem_name);
        $this->load->view('include/header');
        $this->load->view('search_cemee/search_cemee',$result);
        $this->load->view('include/footer');
    }
    public function delete_chem($chem_no){
        $result_delete =  $this->DBhelper->delete_chem($chem_no);
        if ($result_delete > 0){
            $this->session->set_userdata('message_save','true');
        }else{
            $this->session->set_userdata('message_save','false');
        }
        $result['chem_info'] =  $this->DBhelper->search_chem('','');
        $this->load->view('include/header');
        $this->load->view('search_cemee/search_cemee',$result);
        $this->load->view('include/footer');
        
    }
    public function detai_chem($chem_no){
        $result['chem_info'] =  $this->DBhelper->detai_chem($chem_no);
    }

}

?>