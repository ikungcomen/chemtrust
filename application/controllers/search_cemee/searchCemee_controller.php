<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class searchCemee_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('DBhelper');
        $this->load->model('tb_chem_info');
        $this->load->model('tb_chem_store');
        $this->load->model('tb_chem_warehouse');
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
        $this->load->view('include/header');
        $this->load->view('search_cemee/detail_chem',$result);
        $this->load->view('include/footer');
    }
    public function edit_chem($chem_no){
        $result['chem_info']      =  $this->DBhelper->detai_chem($chem_no);
        //$chem_qty_in_msm          = $result['chem_info'][0]['chem_qty_in_msm'];
        //$chem_qty_boh_msm         = $result['chem_info'][0]['chem_qty_boh_msm'];
        $result['msm_master_in']  =  $this->DBhelper->tb_msm_master();
        $result['msm_master_out'] =  $this->DBhelper->tb_msm_master();
        $chem_type = $result['chem_info'][0]['chem_type'];
        $result['chem_type']      =  $this->tb_chem_store->chem_type($chem_type);
        $result['chem_warehouse']      =  $this->tb_chem_warehouse->chem_warehouse('');
        
        $this->load->view('include/header');
        $this->load->view('search_cemee/edit_chem',$result);
        $this->load->view('include/footer');
    }
    public function update_chem(){
        $chem_no = $this->input->post('chem_no');
        $chem_cas_number = $this->input->post('chem_cas_number');
        $chem_seq = $this->input->post('chem_seq');
        $chem_type = $this->input->post('chem_type');
        $chem_name_th = $this->input->post('chem_name_th');
        $chem_name_en = $this->input->post('chem_name_en');
        $chem_qty_in = $this->input->post('chem_qty_in');
        $chem_qty_in_msm = $this->input->post('chem_qty_in_msm');
        $chem_qty_boh = $this->input->post('chem_qty_boh');
        $chem_qty_boh_msm = $this->input->post('chem_qty_boh_msm');
        $chem_location = $this->input->post('chem_location');
        $user_id = $this->session->userdata('user_id');
        $date = date('y-m-d');
        $result_update =  $this->tb_chem_info->update_chem($chem_no, $chem_cas_number, $chem_seq, $chem_type, $chem_name_th, $chem_name_en, $chem_qty_in, $chem_qty_in_msm, $chem_qty_boh, $chem_qty_boh_msm, $chem_location, $user_id, $date);
        if ($result_update) {
            $this->session->set_userdata('message_save', 'true');
        } else {
            $this->session->set_userdata('message_save', 'false');
        }
        redirect('search_cemee/searchCemee_controller/detai_chem/'.$chem_no);
        
    }

}

?>