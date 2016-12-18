<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class touch_lvl_controller extends CI_Controller {

	function __construct(){
		parent::__construct();                  
                if($this->session->userdata("loginuser") < 1 )
                {
                    redirect("login");
                }                
		$this->load->model('tb_chem_touch_lvl'); 
	}

	public function touch_lvl(){    
            /*//echo 'xxx';
            $result['model'][] = array('method' => 'main');
             //print_r($chem_classify);
            $this->load->view('include/header');
	    $this->load->view('touch_lvl/touch_lvl_view',$result);
	    $this->load->view('include/footer');
             * 
             */
            $this->search_list();
	}     
        
       
        
       
          public function touch_lvl_go_add(){ 
          $result['model'][]=array('method' => 'add',"message_flag"=>'-',"message"=>'-');         
        
        //print_r($result);
          $this->load->view('include/header');
	  $this->load->view('touch_lvl/touch_lvl_maintain',$result);
	  $this->load->view('include/footer');
                        
	}
        
        
        public function touch_lvl_event(){         
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
         //$chem_seq = $this->input->post('chem_seq');
         //$chem_desc = $this->input->post('chem_desc');
         if($this->tb_chem_touch_lvl->check_tb_chem_touch_lvl_list()>0)
         {
           $data['data'] = $this->tb_chem_touch_lvl->get_tb_chem_touch_lvl_list();
           $result['model'][]=array('method' => 'haveRow',"message_flag"=>'-',"message"=>'-','data'=>$data);
         }
         else
         {
             $result['model'][]=array('method' => 'noRow',"message_flag"=>'W',"message"=>'ไม่พบข้อมูล');
         }
        
        //print_r($result);
          $this->load->view('include/header');
	  $this->load->view('touch_lvl/touch_lvl_view',$result);
	  $this->load->view('include/footer');
         }
        
         public function touch_lvl_go_edit($chem_touch_lvl_no){ 
           // $chem_seq  = $this->input->get('chem_seq');
            //echo  'xxxxx' . $chem_seq;        
             //print_r($chem_classify);
            $this->search($chem_touch_lvl_no);            
	}
         public function search($chem_touch_lvl_no){          
                  
         if($this->tb_chem_touch_lvl->check_tb_chem_touch_lvl($chem_touch_lvl_no)>0)
         {
           $data['data'] = $this->tb_chem_touch_lvl->get_tb_chem_touch_lvl($chem_touch_lvl_no);
           $result['model'][]=array('method' => 'edit',"message_flag"=>'-',"message"=>'-','data'=>$data);
         }
         else
         {
             $result['model'][]=array('method' => 'noRow',"message_flag"=>'W',"message"=>'ไม่พบข้อมูล');
         }
        
        //print_r($result);
          $this->load->view('include/header');
	  $this->load->view('touch_lvl/touch_lvl_maintain',$result);
	  $this->load->view('include/footer');
         }
        
         
      
         
         
        public function edit(){   
        $chem_touch_lvl_bno = $this->input->post('chem_touch_lvl_bno');
        $chem_touch_lvl_eno = $this->input->post('chem_touch_lvl_eno');
        $chem_touch_lvl_no = $this->input->post('chem_touch_lvl_no_hid');
        $chem_touch_lvl_name= $this->input->post('chem_touch_lvl_name'); 
        $chem_touch_lvl_desc= $this->input->post('chem_touch_lvl_desc');        
        //
        $user_id = $this->session->userdata('user_id');
        $date = date('y-m-d'); 
        
         if($this->tb_chem_touch_lvl->check_tb_chem_touch_lvl($chem_touch_lvl_no)>0)
         {
           $resultUpdate = $this->tb_chem_touch_lvl->update_tb_chem_touch_lvl($chem_touch_lvl_no,$chem_touch_lvl_bno,$chem_touch_lvl_eno,$chem_touch_lvl_name,$chem_touch_lvl_desc,$user_id, $date);
           if($resultUpdate > 0)
           {
               $data['data'] = $this->tb_chem_touch_lvl->get_tb_chem_touch_lvl($chem_touch_lvl_no);
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
	$this->load->view('touch_lvl/touch_lvl_maintain',$result);
	$this->load->view('include/footer');     
	} 
        
         public function add(){   
         //echo "xxxx" . $this->input->post('chem_touch_lvl_no'); 
        $chem_touch_lvl_no = $this->input->post('chem_touch_lvl_no');
        $chem_touch_lvl_bno = $this->input->post('chem_touch_lvl_bno');
        $chem_touch_lvl_eno = $this->input->post('chem_touch_lvl_eno');
        $chem_touch_lvl_name= $this->input->post('chem_touch_lvl_name'); 
        $chem_touch_lvl_desc= $this->input->post('chem_touch_lvl_desc');        
        //
        $user_id = $this->session->userdata('user_id');
        $date = date('y-m-d'); 
        
         if($this->tb_chem_touch_lvl->check_tb_chem_touch_lvl($chem_touch_lvl_no)<= 0)
         {
           $resultInsert = $this->tb_chem_touch_lvl->insert_tb_chem_touch_lvl($chem_touch_lvl_no,$chem_touch_lvl_bno,$chem_touch_lvl_eno,$chem_touch_lvl_name,$chem_touch_lvl_desc,$user_id, $date);
           if($resultInsert > 0)
           {
               //$data['data'] = $this->tb_chem_touch_lvl->get_tb_tb_chem_touch_lvl($chem_seq);
               $result['model'][]=array('method' => 'add',"message_flag"=>'I',"message"=>'เพิ่มข้อมูลเรียบร้อย');
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
	$this->load->view('touch_lvl/touch_lvl_maintain',$result);
	$this->load->view('include/footer');     
	} 

         public function delete($chem_touch_lvl_no){ 
        
        //$chem_seq = $this->input->get('chem_seq');    
        
         if($this->tb_chem_touch_lvl->check_tb_chem_touch_lvl($chem_touch_lvl_no)> 0)
         {
           $resultDelete = $this->tb_chem_touch_lvl->delete_tb_chem_touch_lvl($chem_touch_lvl_no);
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
	$this->load->view('touch_lvl/touch_lvl_view',$result);
	$this->load->view('include/footer');     
	} 
        
         
}
?>