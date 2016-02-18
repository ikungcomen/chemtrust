<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class deComposition_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
                if($this->session->userdata('loginuser') < 1){
                    redirect('login','refresh');
                }
	}

	public function decomposition_cemee(){
		$this->load->view('include/header');
		$this->load->view('decomposition_cemee/decomposition_cemee');
		$this->load->view('include/footer');
		
		
	}
}
?>