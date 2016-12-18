<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class classifyCemee_controller extends CI_Controller {

	function __construct(){
		parent::__construct();                  
                if($this->session->userdata("loginuser") < 1 )
                {
                    redirect("login");
                }                
		$this->load->model('DBhelper'); 
	}

	public function classify_cemee(){         
            $result['model'][] = array('method' => 'main');
             //print_r($chem_classify);
            $this->load->view('include/header');
	    $this->load->view('classify_cemee/classify_cemee',$result);
	    $this->load->view('include/footer');
	}
        public function classify(){            
         $chem_no = $this->input->post('chem_no'); 
       //  if($cmd == "search")
        // {
            $this->search_classify($chem_no);
        // }
        // else if($cmd == "save")
        // {
          //   $this->save_classify();
        /// }
	}
        
         public function edit_forword($chem_no){            
          // $chem_no = $this->input->post('chem_no');               
         if($this->DBhelper->check_chem_classify($chem_no)>0)
         {
           $data['chem_classify'] = $this->DBhelper->get_chem_classify($chem_no);
           $result['model'][]=array('method' => 'haveRow',"message_flag"=>'-',"message"=>'-','data'=>$data);
         }
         else
         {
             $result['model'][]=array('method' => 'noRow',"message_flag"=>'W',"message"=>'ไม่พบข้อมูล');
         }
        
        //print_r($result);
         $this->load->view('include/header');
         $this->load->view('classify_cemee/classify_cemee_edit', $result);
         $this->load->view('include/footer');
	}
         public function add_forword(){           
       
         $result['model'][] = array('method' => 'main');
         $this->load->view('include/header');
         $this->load->view('classify_cemee/classify_cemee_add', $result);
         $this->load->view('include/footer');
	}
        
        
        public function search_classify($chem_no){            
         //$chem_no = $this->input->post('chem_no'); 
         if($this->DBhelper->check_chem_classify($chem_no)>0)
         {
           $data['chem_classify'] = $this->DBhelper->get_chem_classify($chem_no);
           $result['model'][]=array('method' => 'haveRow',"message_flag"=>'-',"message"=>'-','data'=>$data);
         }
         else
         {
             $result['model'][]=array('method' => 'noRow',"message_flag"=>'W',"message"=>'ไม่พบข้อมูล');
         }
        
        //print_r($result);
         $this->load->view('include/header');
         $this->load->view('classify_cemee/classify_cemee', $result);
         $this->load->view('include/footer');
}
        

        public function add_classify(){        
        
        $chem_no = $this->input->post('chem_no');
        $haz = array(
         $this->input->post('haz_1'),
         $this->input->post('haz_2'),
         $this->input->post('haz_3'),
         $this->input->post('haz_4'),
         $this->input->post('haz_5'),
         $this->input->post('haz_6'),
         $this->input->post('haz_7'),
         $this->input->post('haz_8'),
         $this->input->post('haz_9'));
        
      
       $chem_ghs_label="";
        $firstStep=0;
        foreach ($haz as $value) {
            if($value != "")
            {
                if($firstStep==0)
                {
                    $firstStep=1;
                    $chem_ghs_label =  $chem_ghs_label . $value;
                }
                else
                {
                  $chem_ghs_label =  $chem_ghs_label . "," . $value;
                }
                
            }
        }
      
        $chem_ghs_haz_level= $this->input->post('chem_ghs_haz_level'); 
        $chem_ghs_des= $this->input->post('chem_ghs_desc');
        $chem_list_acc_no_mil=$this->input->post('mi_acc_no');
        $chem_seq_mil=$this->input->post('mi_seq');
        $chem_seq_lbl=$this->input->post('ml_seq');
        
        $user_id = $this->session->userdata('user_id');
        $date = date('y-m-d'); 
        
         if($this->DBhelper->check_chem_classify($chem_no) < 1)
         {
           $resultInsert = $this->DBhelper->insert_chem_ghs_list($chem_no, $chem_ghs_label, $chem_ghs_haz_level, $chem_ghs_des, $chem_list_acc_no_mil, $chem_seq_mil, $chem_seq_lbl, $user_id, $date);
           if($resultInsert > 0)
           {
               //$data['chem_classify'] = $this->DBhelper->get_chem_classify($chem_no);
               $result['model'][]=array('method' => 'noRow',"message_flag"=>'I',"message"=>'เพิ่มข้อมูล '  .$chem_no.  ' เรียบร้อย');
           }
           else
           {
               $result['model'][]=array('method' => 'noRow',"message_flag"=>'E',"message"=>'ไม่สามารถเพิ่มข้อมูลได้');
           }
          
         }
         else
         { 
              $result['model'][]=array('method' => 'noRow',"message_flag"=>'E',"message"=>'ไม่สามารถเพิ่มข้อมูล '  .$chem_no.  ' เนื่องจากมีข้อมูลแล้ว');
            
         }
         
         $this->load->view('include/header');
         $this->load->view('classify_cemee/classify_cemee_add', $result);
         $this->load->view('include/footer');
       
	}
        
        public function update_classify(){        
        
        $chem_no = $this->input->post('chem_no');
        $haz = array(
         $this->input->post('haz_1'),
         $this->input->post('haz_2'),
         $this->input->post('haz_3'),
         $this->input->post('haz_4'),
         $this->input->post('haz_5'),
         $this->input->post('haz_6'),
         $this->input->post('haz_7'),
         $this->input->post('haz_8'),
         $this->input->post('haz_9'));        
      
       $chem_ghs_label="";
        $firstStep=0;
        foreach ($haz as $value) {
            if($value != "")
            {
                if($firstStep==0)
                {
                    $firstStep=1;
                    $chem_ghs_label =  $chem_ghs_label . $value;
                }
                else
                {
                  $chem_ghs_label =  $chem_ghs_label . "," . $value;
                }
                
            }
        }      
        $chem_ghs_haz_level= $this->input->post('chem_ghs_haz_level'); 
        $chem_ghs_des= $this->input->post('chem_ghs_desc');
        $chem_list_acc_no_mil=$this->input->post('mi_acc_no');
        $chem_seq_mil=$this->input->post('mi_seq');
        $chem_seq_lbl=$this->input->post('ml_seq');        
        $user_id = $this->session->userdata('user_id');
        $date = date('y-m-d'); 
        
         if($this->DBhelper->check_chem_classify($chem_no) > 0)
         {
           $resultUpdate = $this->DBhelper->update_chem_ghs_list($chem_no, $chem_ghs_label, $chem_ghs_haz_level, $chem_ghs_des, $chem_list_acc_no_mil, $chem_seq_mil, $chem_seq_lbl, $user_id, $date);
           if($resultUpdate > 0)
           {
               $data['chem_classify'] = $this->DBhelper->get_chem_classify($chem_no);
               $result['model'][]=array('method' => 'haveRow',"message_flag"=>'I',"message"=>'แก้ไขข้อมูลเรียบร้อย','data'=>$data);
           }
           else
           {
               $data['chem_classify'] = $this->DBhelper->get_chem_classify($chem_no);
               $result['model'][]=array('method' => 'haveRow',"message_flag"=>'E',"message"=>'ไม่สามารถแก้ไขข้อมูลได้','data'=>$data);
           }
          
         }
         else
         {                      
           
             $result['model'][]=array('method' => 'noRow',"message_flag"=>'E',"message"=>'ไม่พบข้อมูลได้สำหรับแก้ไข');              
         }
         
         $this->load->view('include/header');
         $this->load->view('classify_cemee/classify_cemee_edit', $result);
         $this->load->view('include/footer');
       
	}
         
}
?>