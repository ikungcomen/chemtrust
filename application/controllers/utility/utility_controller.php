<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class utility_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('DBhelper');
        if ($this->session->userdata('loginuser') < 1) {
            redirect('login', 'refresh');
        }
    }
   
    public function getTb_chem_info() {
        $result = $this->DBhelper->getTb_chem_info();
        echo json_encode($result);
    }

}

?>