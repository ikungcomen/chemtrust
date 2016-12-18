<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class utility_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        if ($this->session->userdata('loginuser') < 1) {
            redirect('login', 'refresh');
        }
        $this->load->library('excel');
        $this->load->model('DBhelper');
    }

    public function getTb_chem_info() {
        $chem_no_input = trim($this->input->post('chem_no_param'));
        $result = $this->DBhelper->search_tb_chem_info($chem_no_input);
        echo json_encode($result);
    }
    
    public function get_tb_chem_list_ministry_industry() {
        $mi_desc_input = trim($this->input->post('mi_desc_param'));
        $result = $this->DBhelper->get_tb_chem_list_ministry_industry($mi_desc_input);
        echo json_encode($result);
    }
    public function get_tb_chem_list_ministry_labor() {
        $ml_desc_input = trim($this->input->post('ml_desc_param'));
        $result = $this->DBhelper->get_tb_chem_list_ministry_labor($ml_desc_input);
        echo json_encode($result);
    }

    public function get_chem_mil_lbl() {
        $chem_no_input = trim($this->input->post('chem_no_param'));
        $result = $this->DBhelper->get_tb_chem_info($chem_no_input); 
        foreach ($result->result() as $row) {
            $chem_cas_number_input  = $row->chem_cas_number;
            $chem_name_th=$row->chem_name_th;
            $chem_store_name=$row->chem_store_name;
        }
        
        $result = $this->DBhelper->get_chem_mil($chem_cas_number_input);
       
        $chem_desc_mi=" ";
        $chem_mi_acc_no=0.0;
        $chem_mi_seq=0;
        
        
        $chem_desc_ml=" ";
        $chem_ml_seq=0;
      
        foreach ($result->result() as $row) {
            $chem_desc_mi  = $row->chem_desc;
            $chem_mi_acc_no=$row->chem_list_acc_no;
            $chem_mi_seq=$row->chem_seq;
        }
        
        $result = $this->DBhelper->get_chem_mlb($chem_cas_number_input);
         foreach ($result->result() as $row) {
            $chem_desc_ml  = $row->chem_desc;
            $chem_ml_seq=$row->chem_seq;
        }
         
        $data =  array('chem_desc_mi'=>$chem_desc_mi,
                       'chem_mi_acc_no'=>$chem_mi_acc_no,
                       'chem_mi_seq'=>$chem_mi_seq,
                       'chem_desc_ml'=>$chem_desc_ml,
                       'chem_ml_seq'=>$chem_ml_seq,
                       'chem_cas_number'=>$chem_cas_number_input,
                       'chem_name_th'=>$chem_name_th,
                       'chem_store_name' =>$chem_store_name
                        );
        echo json_encode($data);
    }
    
      public function open_excel($path,$file) 
      {
        $this->load->library('excel');
        //echo $path ."/".$file;
        //PHPExcel_IOFactory::load("template.xls");
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $file . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::load( base_url() .'/'. $path ."/".$file);
        $objWriter->save('php://output');
      }
    
    

}

?>