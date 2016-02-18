<?php 
class contact_admin extends CI_Controller{
    
    
     public function contact(){
        $this->load->view('include/header');
        $this->load->view("contact/contact_admin");
        $this->load->view('include/footer');
    
    }
    
}


?>
