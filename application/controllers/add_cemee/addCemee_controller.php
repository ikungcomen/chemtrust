<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class addCemee_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('DBhelper');
        $this->load->model('tb_chem_store');
        $this->load->model('tb_chem_warehouse');
        if ($this->session->userdata('loginuser') < 1) {
            redirect('login', 'refresh');
        }
    }
    public function add_cemee() {
        $result['msm_master']     = $this->DBhelper->tb_msm_master();
        $result['chem_type']      = $this->tb_chem_store->chem_type('');
        $result['chem_warehouse'] = $this->tb_chem_warehouse->chem_warehouse('');
        $this->load->view('include/header');
        $this->load->view('add_cemee/add_cemee', $result);
        $this->load->view('include/footer');
    }

    public function save_cemee() {

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
        
       // $filename_msds = "";
       // $filename_label = "";
        //echo $this->input->post('msds_f');
        $base_part = './file_web/chem_desc';
        $config['upload_path'] = $base_part;
        $config['allowed_types'] = 'xls|xlsx|pdf';
        $config['max_size'] = '10000';
        $config['max_width'] = '300000';
        $config['max_height'] = '300000';
        //------------------------------------------------------------------
        $config['file_name'] = $_SERVER['REQUEST_TIME'] . rand(). '-'.$chem_no;
        $this->load->library('upload', $config);
        //------------------------------------------------------------------
        $filename_msds = "";
        $filename_label = "";
        if (!$this->upload->do_upload('msds_f')) {           
            $error = array('error' => $this->upload->display_errors());
            // print_r($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data();
            $filename_msds = $upload_data['file_name'];
        } 
        
      
       if (!$this->upload->do_upload('label_f')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data();
            $filename_label = $upload_data['file_name'];
        }
        
        
        $result_insert = $this->DBhelper->insert_cemee($chem_no, $chem_cas_number, $chem_seq, $chem_type, $chem_name_th, $chem_name_en, $chem_qty_in, $chem_qty_in_msm, $chem_qty_boh, $chem_qty_boh_msm, $chem_location,$filename_msds,$filename_label, $user_id, $date);
        if ($result_insert) {
            $this->session->set_userdata('message_save', 'true');
        } else {
            $this->session->set_userdata('message_save', 'false');
        }
        redirect('add_cemee/addCemee_controller/add_cemee');
         
         
    }

    public function getTb_chem_info() {
        $chem_no = $this->input->post('chem_no');
        $result  = $this->DBhelper->getTb_chem_info($chem_no);
        if ($result > 0) {
            echo 1;
        }else{
            echo 0;
        }
    }

}

?>