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
        /*$config = array();
        $config["base_url"] = base_url() . "welcome/example1";
        $config["total_rows"] = $this->Countries->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->Countries->
            fetch_countries($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->load->view("example1", $data);*/
        
         public function search_list(){            
         $chem_seq = $this->input->post('chem_seq');
         $chem_desc = $this->input->post('chem_desc');
         $total_rec=$this->tb_chem_list_ministry_labor->check_tb_chem_list_ministry_labor_list($chem_seq,$chem_desc);
         $rec_perpage=$this->config->item('rec_perpage'); //$config['rec_perpage'];
         $paging = $this->paging($chem_seq, $chem_desc,0,$total_rec,$rec_perpage);         
         if($total_rec>0)
         {           
           $data['data'] = $this->tb_chem_list_ministry_labor->get_tb_chem_list_ministry_labor_list($chem_seq,$chem_desc,0,$rec_perpage);
           $result['model'][]=array('method' => 'haveRow',"message_flag"=>'-',"message"=>'-','data'=>$data,'paging'=>$paging);
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
         public function search_list_by_page($chem_seq,$chem_desc,$page,$rec_show){        
          if($chem_seq=='null')
             {
                $chem_seq="";
                     
             }
          if($chem_desc=='null')
             {
                $chem_desc="";
                     
             }
         $total_rec=$this->tb_chem_list_ministry_labor->check_tb_chem_list_ministry_labor_list($chem_seq,$chem_desc);
         $paging = $this->paging($chem_seq, $chem_desc,$page,$total_rec,$rec_show);         
         if($total_rec>0)
         {  
          
           $data['data'] = $this->tb_chem_list_ministry_labor->get_tb_chem_list_ministry_labor_list($chem_seq,$chem_desc,$page,$rec_show);
           $result['model'][]=array('method' => 'haveRow',"message_flag"=>'-',"message"=>'-','data'=>$data,'paging'=>$paging);
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
         
        public function paging($chem_seq,$chem_desc,$page,$taltal_rec,$rec_perpage){            
         if($chem_seq=='')
             {
                $chem_seq="null";
                     
             }
          if($chem_desc=='')
             {
                $chem_desc="null";
                     
             }  
         $result_re=array();         
         $al_count=0;         
         $al_count=floor($taltal_rec / $rec_perpage);      
         if( $taltal_rec %  $rec_perpage > 0)
         {
             $al_count=$al_count + 1;
         }
         //echo $al_count;
         $first_page = 0;
         $last_page = ($al_count-1) * $rec_perpage;
         $pre_page=($page-$rec_perpage);
         if ($page == 0) $pre_page=0;
         $next_page=($page + $rec_perpage);
         if (($al_count-1) * $rec_perpage == $page ) $next_page=$page;
         $url=base_url()."index.php/ministry_labor/ministry_labor_controller/search_list_by_page/$chem_seq/$chem_desc";
         $result_re[0] =" ";
         $result_re[0]=$result_re[0]. "<li><a href='$url/$first_page/$rec_perpage'><<</a></li>";
         $result_re[0]=$result_re[0] . "<li><a href='$url/$pre_page/$rec_perpage'><</a></li>";
         for($i=1;$i <= $al_count;$i++)
         {            
            $y = ($i -1) * $rec_perpage;
            if($y==$page)
            {
                $result_re[$i]="<li><a>$i</a></li>";  
            }
            else
            {
                $result_re[$i]="<li><a href='$url/$y/$rec_perpage'>$i</a></li>";  
            }
            
         }         
         $result_re[$al_count+1]="<li><a href='$url/$next_page/$rec_perpage'>></a></li>";
         $result_re[$al_count+1]=$result_re[$al_count+1] . "<li><a href='$url/$last_page/$rec_perpage'>>></a></li>";
        // print_r($result_re);
         return $result_re;        
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