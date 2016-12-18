<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ministry_industry_controller extends CI_Controller {

	function __construct(){
		parent::__construct();                  
                if($this->session->userdata("loginuser") < 1 )
                {
                    redirect("login");
                }                
		$this->load->model('tb_chem_list_ministry_industry'); 
	}

	public function ministry_industry(){         
            $result['model'][] = array('method' => 'main');
             //print_r($chem_classify);
            $this->load->view('include/header');
	    $this->load->view('ministry_industry/ministry_industry_view',$result);
	    $this->load->view('include/footer');
	}     
        
        public function ministry_industry_go_edit(){ 
            $chem_seq  = $this->input->get('chem_seq');
            $chem_list_acc_no  = $this->input->get('chem_list_acc_no');
            //echo  'xxxxx' . $chem_seq ." yyyyy ". $chem_list_acc_on ;        
             //print_r($chem_classify);
            $this->search($chem_list_acc_no,$chem_seq);            
	}
        
       
          public function ministry_industry_go_add(){ 
          $result['model'][]=array('method' => 'add',"message_flag"=>'-',"message"=>'-');         
        
        //print_r($result);
          $this->load->view('include/header');
	  $this->load->view('ministry_industry/ministry_industry_view_maintain',$result);
	  $this->load->view('include/footer');
                        
	}
        
        
        public function ministry_industry_event(){         
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
          $chem_list_acc_no = $this->input->post('chem_list_acc_no');
         $chem_seq = $this->input->post('chem_seq');
         $chem_desc = $this->input->post('chem_desc');       
         $total_rec=$this->tb_chem_list_ministry_industry->check_tb_chem_list_ministry_industry_list($chem_list_acc_no,$chem_seq,$chem_desc);
         $rec_perpage=$this->config->item('rec_perpage');
         $paging = $this->paging($chem_list_acc_no,$chem_seq, $chem_desc,0,$total_rec,$rec_perpage);    
         if( $total_rec >0)
         {
           $data['data'] = $this->tb_chem_list_ministry_industry->get_tb_chem_list_ministry_industry_list($chem_list_acc_no,$chem_seq,$chem_desc,0,$rec_perpage);
           $result['model'][]=array('method' => 'haveRow',"message_flag"=>'-',"message"=>'-','data'=>$data,'paging'=>$paging);
         }
         else
         {
             $result['model'][]=array('method' => 'noRow',"message_flag"=>'W',"message"=>'ไม่พบข้อมูล');
         }
        
        //print_r($result);
          $this->load->view('include/header');
	  $this->load->view('ministry_industry/ministry_industry_view',$result);
	  $this->load->view('include/footer');
         }
         
         public function search_list_by_page($chem_list_acc_no,$chem_seq,$chem_desc,$page,$rec_perpage){       
          if($chem_list_acc_no=='null')
             {
                $chem_list_acc_no="";
                     
             }
         if($chem_seq=='null')
             {
                $chem_seq="";
                     
             }
          if($chem_desc=='null')
             {
                $chem_desc="";
                     
             }
         $total_rec=$this->tb_chem_list_ministry_industry->check_tb_chem_list_ministry_industry_list($chem_list_acc_no,$chem_seq,$chem_desc);
         //$rec_perpage=2;
         $paging = $this->paging($chem_list_acc_no,$chem_seq, $chem_desc,$page,$total_rec,$rec_perpage);    
         if( $total_rec >0)
         {
           $data['data'] = $this->tb_chem_list_ministry_industry->get_tb_chem_list_ministry_industry_list($chem_list_acc_no,$chem_seq,$chem_desc,$page,$rec_perpage);
           $result['model'][]=array('method' => 'haveRow',"message_flag"=>'-',"message"=>'-','data'=>$data,'paging'=>$paging);
         }
         else
         {
             $result['model'][]=array('method' => 'noRow',"message_flag"=>'W',"message"=>'ไม่พบข้อมูล');
         }
        
        //print_r($result);
          $this->load->view('include/header');
	  $this->load->view('ministry_industry/ministry_industry_view',$result);
	  $this->load->view('include/footer');
         }
        
        public function search($chem_list_acc_on,$chem_seq){          
                  
         if($this->tb_chem_list_ministry_industry->check_tb_chem_list_ministry_industry($chem_list_acc_on,$chem_seq)>0)
         {
           $data['data'] = $this->tb_chem_list_ministry_industry->get_tb_chem_list_ministry_industry($chem_list_acc_on,$chem_seq);
           $result['model'][]=array('method' => 'edit',"message_flag"=>'-',"message"=>'-','data'=>$data);
         }
         else
         {
             $result['model'][]=array('method' => 'noRow',"message_flag"=>'W',"message"=>'ไม่พบข้อมูล');
         }
        
        //print_r($result);
          $this->load->view('include/header');
	  $this->load->view('ministry_industry/ministry_industry_view_maintain',$result);
	  $this->load->view('include/footer');
         }
         
         
        
     /*public function paging($chem_list_acc_no,$chem_seq,$chem_desc,$page,$taltal_page,$rec_perpage){ 
         $result_re=array();         
         $al_count=0;         
         $al_count=($taltal_page / $rec_perpage);
         if($al_count < 1)
         {
             $al_count = 0 ;
         }
         if($chem_list_acc_no=='')
             {
                $chem_list_acc_no="null";
                     
             }
         if($chem_seq=='')
             {
                $chem_seq="null";
                     
             }
          if($chem_desc=='')
             {
                $chem_desc="null";
                     
             }
         if( $taltal_page %  $rec_perpage > 0)
         {
             $al_count=$al_count + 1;
         }
         //echo $chem_seq."-".$chem_desc;
         $url=base_url()."index.php/ministry_industry/ministry_industry_controller/search_list_by_page/$chem_list_acc_no/$chem_seq/$chem_desc";
         $result_re[0]="<li><a href='$url/0/$rec_perpage'><<</a></li>"; 
         for($i=1;$i <= $al_count;$i++)
         {
            if($i==1)
            {
                $y = 0;
            }
            else{
                $y=$i;
            }
            if($i==$page)
            {
                $result_re[$i]="<li><a>$i</a></li>";  
            }
            else
            {
                $result_re[$i]="<li><a href='$url/$y/$rec_perpage'>$i</a></li>";  
            }
            
         }
         $last_page=$al_count;
         if($al_count==1)$last_page=0;
         $result_re[$al_count+1]="<li><a href='$url/$last_page/$rec_perpage'>>></a></li>";
         return $result_re;        
        } */         
        
       public function paging($chem_list_acc_no,$chem_seq,$chem_desc,$page,$taltal_rec,$rec_perpage){            
          if($chem_list_acc_no=='')
             {
                $chem_list_acc_no="null";
                     
             }
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
         $url=base_url()."index.php/ministry_industry/ministry_industry_controller/search_list_by_page/$chem_list_acc_no/$chem_seq/$chem_desc";
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
        $chem_list_acc_no = $this->input->post('chem_list_acc_no_hid');
        $chem_seq = $this->input->post('chem_seq_hid');
        
        $chem_ind_name= $this->input->post('chem_ind_name'); 
        $chem_ind_type= $this->input->post('chem_ind_type');
        $chem_condition= $this->input->post('chem_condition');
        
        $chem_desc=$this->input->post('chem_desc');
        $chem_cas_number=$this->input->post('chem_cas_number');
        //
        $user_id = $this->session->userdata('user_id');
        $date = date('y-m-d'); 
        
         if($this->tb_chem_list_ministry_industry->check_tb_chem_list_ministry_industry($chem_list_acc_no,$chem_seq)>0)
         {
           $resultUpdate = $this->tb_chem_list_ministry_industry->update_tb_chem_list_ministry_industry($chem_list_acc_no,$chem_seq,$chem_cas_number, $chem_ind_name, $chem_ind_type,$chem_condition, $chem_desc,  $user_id, $date);
           if($resultUpdate > 0)
           {
               $data['data'] = $this->tb_chem_list_ministry_industry->get_tb_chem_list_ministry_industry($chem_list_acc_no,$chem_seq);
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
	$this->load->view('ministry_industry/ministry_industry_view_maintain',$result);
	$this->load->view('include/footer');     
	} 
        
         public function add(){   
        
        $chem_list_acc_no = $this->input->post('chem_list_acc_no');
        $chem_seq = $this->input->post('chem_seq');
        
        $chem_ind_name= $this->input->post('chem_ind_name'); 
        $chem_ind_type= $this->input->post('chem_ind_type');
        $chem_condition= $this->input->post('chem_condition');
        
        $chem_desc=$this->input->post('chem_desc');
        $chem_cas_number=$this->input->post('chem_cas_number');
        //
        $user_id = $this->session->userdata('user_id');
        $date = date('y-m-d'); 
        
         if($this->tb_chem_list_ministry_industry->check_tb_chem_list_ministry_industry($chem_list_acc_no,$chem_seq)<= 0)
         {
           $resultInsert = $this->tb_chem_list_ministry_industry->insert_tb_chem_list_ministry_industry($chem_list_acc_no,$chem_seq,$chem_cas_number, $chem_ind_name, $chem_ind_type,$chem_condition, $chem_desc,  $user_id, $date);
           if($resultInsert > 0)
           {
               $data['data'] = $this->tb_chem_list_ministry_industry->get_tb_chem_list_ministry_industry($chem_list_acc_no,$chem_seq);
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
	$this->load->view('ministry_industry/ministry_industry_view_maintain',$result);
	$this->load->view('include/footer');     
	} 

         public function delete(){ 
        
        $chem_seq = $this->input->get('chem_seq');    
        $chem_list_acc_no = $this->input->get('chem_list_acc_no');
         if($this->tb_chem_list_ministry_industry->check_tb_chem_list_ministry_industry($chem_list_acc_no,$chem_seq)> 0)
         {
           $resultDelete = $this->tb_chem_list_ministry_industry->delete_tb_chem_list_ministry_industry($chem_list_acc_no,$chem_seq);
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
	$this->load->view('ministry_industry/ministry_industry_view',$result);
	$this->load->view('include/footer');     
	} 
        
         
}
?>