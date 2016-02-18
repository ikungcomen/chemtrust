<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class main_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
                if($this->session->userdata('loginuser') < 1){
                    redirect('login','refresh');
                }
                
        }
        
        public function index(){
           
            
           if ($this->session->userdata('loginuser') > 0) {
                $this->load->view('include/header');
                $this->load->view('main/main');
                $this->load->view('include/footer');
           }else{
               redirect("login","refresh");
           }
        }


        public function main_cemee(){
		$this->load->view('include/header');
		$this->load->view('main/main');
		$this->load->view('include/footer');
	}
}
?>