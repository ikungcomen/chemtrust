<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of chremstore_relation
 *
 * @author anurartkae
 */
class chremstore_relation extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('tb_chem_warehouse');
        $this->load->model('tb_chem_info');
        $this->load->model('tb_chem_store');
        $this->load->model('tb_chem_relation');
        
        if ($this->session->userdata('loginuser') < 1) {
            redirect('login', 'refresh');
        }
    }
    public function show_chem_store_relation() {
        $this->load->view('include/header');
        $result['chem_relation'] = $this->tb_chem_relation->chem_relation();
        $result['chem_type']     = $this->tb_chem_store->chem_type();
        $result['chemstore_relation'] = $this->tb_chem_relation->chemstore_relation();
        $this->load->view('chemstore_relation/addchemstore_relation', $result);
        $this->load->view('include/footer');
    }
    

    public function add_chem_store_relation() {
        $chem_type_1   = $this->input->post('chem_type_1');
        $chem_type_2   = $this->input->post('chem_type_2');
        $chem_relation = $this->input->post('chem_relation');
        $result_check = $this->tb_chem_relation->check_chemstore_relation($chem_type_1,$chem_type_2,$chem_relation);
        if ($result_check > 0) {
            //$result_update = $this->tb_chem_relation->update_chemstore_relation();
            //if ($result_update > 0) {
              //  $this->session->set_userdata('message_save', 'true');
            //}
        }else{
            //$result_insert = $this->tb_chem_relation->insert_chemstore_relation();
            //if ($result_insert > 0) {
              //  $this->session->set_userdata('message_save', 'true');
            //}
        }
        
        redirect('chremstorerelation_controller/chremstore_relation/show_chem_store_relation','refresh');
    }
    public function delete_chem_store_relation($chem_store_type_1,$chem_store_type_2) {
        $result_delete = $this->tb_chem_relation->delete_chem_store_relation($chem_store_type_1,$chem_store_type_2);
        if ($result_delete > 0) {
             $this->session->set_userdata('message_save', 'false');
        }
        redirect('chremstorerelation_controller/chremstore_relation/show_chem_store_relation','refresh');
    }

}
