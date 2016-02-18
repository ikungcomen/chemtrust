<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class searchCemee_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        if ($this->session->userdata('loginuser') < 1) {
            redirect('login', 'refresh');
        }
    }

    public function search_cemee() {
        $this->load->view('include/header');
        $this->load->view('search_cemee/search_cemee');
        $this->load->view('include/footer');
    }

}

?>