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
        $this->load->model('tb_chem_relation');
        if ($this->session->userdata('loginuser') < 1) {
            redirect('login', 'refresh');
        }
    }

    public function index() {
        $this->load->view('include/header');
        $result['chem_warehouse'] = $this->tb_chem_warehouse->chem_warehouse();
        
        $data = $this->tb_chem_warehouse->chem_warehouse_temp();
        foreach ($data -> result_array() as $row){
           $result['chem_wh'] = $row['chem_warehouse_code'];
        }
        $result['chem_info'][] = array("x_chem_name_th" => '','chem_relation_name' => '');
        $result['chem_no'][]   = array('chem_name_th' => '');
       
        $this->load->view('chemstore_view/chem_store', $result);
        $this->load->view('include/footer');
    }

    public function search_chem_store() {
        $chem_warehouse_code = $this->input->post('chem_warehouse_code');
        $result['chem_wh'] = $chem_warehouse_code;
        $check_cheminfo = $this->tb_chem_info->get_cheminfo_location($chem_warehouse_code);
        $result['chem_warehouse'] = $this->tb_chem_warehouse->chem_warehouse();
        if ($check_cheminfo > 0) {
            $result['chem_no'] = $this->tb_chem_info->get_cheminfo($chem_warehouse_code);
            $result['chem_info'] = $this->tb_chem_info->search_chem_store($chem_warehouse_code);
            $this->load->view('include/header');
            $this->load->view('chemstore_view/chem_store', $result);
            $this->load->view('include/footer');
        } else {
            $result['chem_info'][] = array("x_chem_name_th" => '','chem_relation_name' => '');
            $result['chem_no'][]   = array('chem_name_th' => '');
            $this->session->set_userdata('message_save', 'error');
            $this->load->view('include/header');
            $this->load->view('chemstore_view/chem_store', $result);
            $this->load->view('include/footer');
        }
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

    public function show_chem_store() {
        $this->load->view('include/header');
        $this->load->view('chemstore_view/addchem_store');
        $this->load->view('include/footer');
    }

    public function check_store() {
        $chem_store_type = $this->input->post('chem_store_type');
        $result_insert = $this->tb_chem_store->check_store($chem_store_type);
        if ($result_insert > 0) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function add_chem_store() {
        $chem_store_type = $this->input->post('chem_store_type');
        $chem_store_name = $this->input->post('chem_store_name');
        $user_id = $this->session->userdata('user_id');
        $date = date('y-m-d');
        $result_insert = $this->tb_chem_store->insert_chem_relation($chem_store_type, $chem_store_name, $user_id, $date);
        if ($result_insert > 0) {
            $this->session->set_userdata('message_save', 'true');
        } else {
            $this->session->set_userdata('message_save', 'false');
        }
        redirect('add_cemee/addCemee_controller/add_cemee');
    }

}
