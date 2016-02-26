<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ministry_labor_controller extends CI_Controller {

	function __construct(){
		parent::__construct();                  
                if($this->session->userdata("loginuser") < 1 )
                {
                    redirect("login");
                }                
		$this->load->model('tb_chem_list_ministry_labor'); 
	}

	public function ministry_labor(){         
            $result['model'][] = array('method' => 'main');
             //print_r($chem_classify);
            $this->load->view('include/header');
	    $this->load->view('ministry_labor/ministry_labor_view',$result);
	    $this->load->view('include/footer');
	}
        
        public function ministry_labor_go_edit(){ 
            $chem_seq  = $this->input->get('chem_seq');
            //echo  'xxxxx' . $chem_seq;        
             //print_r($chem_classify);
            $this->search($chem_seq);            
	}
        
       
          public function ministry_labor_go_add(){ 
             $result['model'][]=array('method' => 'add',"message_flag"=>'-',"message"=>'-');         
        
        //print_r($result);
          $this->load->view('include/header');
	  $this->load->view('ministry_labor/ministry_labor_view_maintain',$result);
	  $this->load->view('include/footer');
                        
	}
        
        
        public function ministry_labor_event(){         
         $cmd = $this->input->post('cmd'); 
         
         if($cmd == "edit")
         {
             $this->edit();
         }
         else{
             $this->add();
         }
        
	}       
        
        
         public function search_list(){            
         $chem_seq = $this->input->post('chem_seq');
         $chem_desc = $this->input->post('chem_desc');
         if($this->tb_chem_list_ministry_labor->check_tb_chem_list_ministry_labor_list($chem_seq,$chem_desc)>0)
         {
           $data['data'] = $this->tb_chem_list_ministry_labor->get_tb_chem_list_ministry_labor_list($chem_seq,$chem_desc);
           $result['model'][]=array('method' => 'haveRow',"message_flag"=>'-',"message"=>'-','data'=>$data);
         }
         else
         {
             $result['model'][]=array('method' => 'noRow',"message_flag"=>'W',"message"=>'ไม่พบข้อมูล');
         }
        
        //print_r($result);
          $this->load->view('include/header');
	  $this->load->view('ministry_labor/ministry_labor_view',$result);
	  $this->load->view('include/footer');
         }
        
        public function search($chem_seq){          
                  
         if($this->tb_chem_list_ministry_labor->check_tb_chem_list_ministry_labor($chem_seq)>0)
         {
           $data['data'] = $this->tb_chem_list_ministry_labor->get_tb_chem_list_ministry_labor($chem_seq);
           $result['model'][]=array('method' => 'edit',"message_flag"=>'-',"message"=>'-','data'=>$data);
         }
         else
         {
             $result['model'][]=array('method' => 'noRow',"message_flag"=>'W',"message"=>'ไม่พบข้อมูล');
         }
        
        //print_r($result);
          $this->load->view('include/header');
	  $this->load->view('ministry_labor/ministry_labor_view_maintain',$result);
	  $this->load->view('include/footer');
         }
        
         
      
         
         
        public function edit(){   
        
        $chem_seq = $this->input->post('chem_seq_hid');
        $chem_name_th= $this->input->post('chem_name_th'); 
        $chem_name_en= $this->input->post('chem_name_en');
        $chem_desc=$this->input->post('chem_desc');
        $chem_cas_number=$this->input->post('chem_cas_number');
        //
        $user_id = $this->session->userdata('user_id');
        $date = date('y-m-d'); 
        
         if($this->tb_chem_list_ministry_labor->check_tb_chem_list_ministry_labor($chem_seq)>0)
         {
           $resultUpdate = $this->tb_chem_list_ministry_labor->update_tb_chem_list_ministry_labor($chem_seq,$chem_cas_number, $chem_name_th, $chem_name_en, $chem_desc,  $user_id, $date);
           if($resultUpdate > 0)
           {
               $data['data'] = $this->tb_chem_list_ministry_labor->get_tb_chem_list_ministry_labor($chem_seq);
               $result['model'][]=array('method' => 'edit',"message_flag"=>'I',"message"=>'ปรับปรุงข้อมูลเรียบร้อย','data'=>$data);
           }
           else
           {
               $result['model'][]=array('method' => 'noRow',"message_flag"=>'E',"message"=>'ไม่สามารถปรับปรุงข้อมูลได้');
           }
          
         }
         else
         {
              $result['model'][]=array('method' => 'noRow',"message_flag"=>'E',"message"=>'ไม่พบข้อมูลในการแก้ไข กรุณากลับเพื่อค้นหาข้อมูลอีกครั้ง');            
         }
                
        $this->load->view('include/header');
	$this->load->view('ministry_labor/ministry_labor_view_maintain',$result);
	$this->load->view('include/footer');     
	} 
        
         public function add(){   
        
        $chem_seq = $this->input->post('chem_seq');
        $chem_name_th= $this->input->post('chem_name_th'); 
        $chem_name_en= $this->input->post('chem_name_en');
        $chem_desc=$this->input->post('chem_desc');
        $chem_cas_number=$this->input->post('chem_cas_number');
        //
        $user_id = $this->session->userdata('user_id');
        $date = date('y-m-d'); 
        
         if($this->tb_chem_list_ministry_labor->check_tb_chem_list_ministry_labor($chem_seq)<= 0)
         {
           $resultInsert = $this->tb_chem_list_ministry_labor->insert_tb_chem_list_ministry_labor($chem_seq,$chem_cas_number, $chem_name_th, $chem_name_en, $chem_desc,  $user_id, $date);
           if($resultInsert > 0)
           {
               $data['data'] = $this->tb_chem_list_ministry_labor->get_tb_chem_list_ministry_labor($chem_seq);
               $result['model'][]=array('method' => 'added',"message_flag"=>'I',"message"=>'เพิ่มข้อมูลเรียบร้อย','data'=>$data);
           }
           else
           {
               $result['model'][]=array('method' => 'add',"message_flag"=>'E',"message"=>'ไม่สามารถเพิ่มข้อมูลได้');
           }
          
         }
         else
         {
              $result['model'][]=array('method' => 'add',"message_flag"=>'E',"message"=>'มีข้อมูลอยู่แล้ว');            
         }
                
        $this->load->view('include/header');
	$this->load->view('ministry_labor/ministry_labor_view_maintain',$result);
	$this->load->view('include/footer');     
	} 

         public function delete(){ 
        
        $chem_seq = $this->input->get('chem_seq');    
        
         if($this->tb_chem_list_ministry_labor->check_tb_chem_list_ministry_labor($chem_seq)> 0)
         {
           $resultDelete = $this->tb_chem_list_ministry_labor->delete_tb_chem_list_ministry_labor($chem_seq);
           if($resultDelete > 0)
           {
               
               $result['model'][]=array('method' => 'delete',"message_flag"=>'I',"message"=>'ลบข้อมูลเรียบร้อย');
           }
           else
           {
               $result['model'][]=array('method' => 'delete',"message_flag"=>'E',"message"=>'ไม่สามารถลบข้อมูลได้');
           }
          
         }
         else
         {
              $result['model'][]=array('method' => 'delete',"message_flag"=>'E',"message"=>'ไม่มีข้อมูล');            
         }
                
        $this->load->view('include/header');
	$this->load->view('ministry_labor/ministry_labor_view',$result);
	$this->load->view('include/footer');     
	} 
        
         
}
?>