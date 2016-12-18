<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of chem_url_controller
 *
 * @author anurartkae
 */
class chem_url_controller extends CI_Controller{
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata("loginuser") < 1) {
            redirect("login");
        }
        $this->load->model('DBhelper');
    }
    
    
    public function index(){
        $this->load->view('include/header');
        $this->load->view('chem_url_view/chem_url');
        $this->load->view('include/footer');
    }
    
    public function save_chem_url(){
        $report_name = $this->input->post('report_name');
        $url_name    = $this->input->post('url_name');
        $user_id     = $this->session->userdata('user_id');
        $date        = date('y-m-d');
        $result_update =  $this->DBhelper->save_chem_url($report_name, $url_name, $user_id, $date);
       if ($result_update > 0) {
            $this->session->set_userdata('message_save', 'true');
        } else {
            $this->session->set_userdata('message_save', 'false');
        }
        $this->load->view('include/header');
        $this->load->view('chem_url_view/chem_url');
        $this->load->view('include/footer');
    }
    
}
