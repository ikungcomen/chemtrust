<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class classifyCemee_controller extends CI_Controller {

	function __construct(){
		parent::__construct();                  
                if($this->session->userdata("loginuser") < 1 )
                {
                    redirect("login");
                }                
		$this->load->database();   
	}

	public function classify_cemee(){
		$this->load->view('include/header');
		$this->load->view('classify_cemee/classify_cemee');
		$this->load->view('include/footer');
	}
        public function search_classify(){
		$this->load->view('include/header');
		$this->load->view('classify_cemee/classify_cemee');
		$this->load->view('include/footer');
	}
        
}
?>