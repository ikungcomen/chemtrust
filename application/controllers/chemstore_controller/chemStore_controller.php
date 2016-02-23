<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of chemStore_controller
 *
 * @author anurartkae
 */
class chemStore_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('tb_chem_warehouse');
        $this->load->model('tb_chem_info');
        $this->load->model('tb_chem_store');
        if ($this->session->userdata('loginuser') < 1) {
            redirect('login', 'refresh');
        }
    }

    public function index() {
        $this->load->view('include/header');
        $result['chem_warehouse'] = $this->tb_chem_warehouse->chem_warehouse();
        $this->load->view('chemstore_view/chem_store', $result);
        $this->load->view('include/footer');
    }

    public function search_chem_store() {
        $chem_warehouse_code = $this->input->post('chem_warehouse_code');
        $check_cheminfo = $this->tb_chem_info->get_cheminfo_location($chem_warehouse_code);
        if ($check_cheminfo > 0) {
            $result['chem_no']   = $this->tb_chem_info->get_cheminfo($chem_warehouse_code);
            $result['chem_info'] = $this->tb_chem_info->search_chem_store($chem_warehouse_code);
        }else{
           $this->session->set_userdata('message_save', 'error');
        }
        
        $this->load->view('include/header');
        $result['chem_warehouse'] = $this->tb_chem_warehouse->chem_warehouse();
        $this->load->view('chemstore_view/chem_store', $result);
        $this->load->view('include/footer');
        
    }
    public function show_chem_store_relation() {
        $this->load->view('include/header');
        $result['chem_relation'] = $this->tb_chem_store->chem_relation();
        $result['chem_type'] = $this->tb_chem_store->chem_type();
        $this->load->view('chemstore_view/addchemstore_relation', $result);
        $this->load->view('include/footer');
    }
    public function add_chem_store_relation() {
        //$this->load->view('include/header');
        
        //$this->load->view('chemstore_view/addchemstore_relation', $result);
        //$this->load->view('include/footer');
    }

}
