<?php

class tb_chem_list_ministry_labor extends CI_Model {

    
   public function get_tb_chem_list_ministry_labor($chem_seq)
   {
        $sql = " select l.chem_seq,l.chem_cas_number,l.chem_name_th,l.chem_name_en,l.chem_desc,DATE_FORMAT(l.create_date,'%d/%m%/%Y') as create_date ,l.create_userid,DATE_FORMAT(l.update_date,'%d/%m%/%Y') as update_date,l.update_userid from tb_chem_list_ministry_labor l ";
        $sql = $sql . " where l.chem_seq = '$chem_seq' ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
   }
   
    public function check_tb_chem_list_ministry_labor($chem_seq) {
        $sql = " select 1 from tb_chem_list_ministry_labor ";
        $sql = $sql . " where chem_seq = '$chem_seq' ";
        //echo $sql;        
        $result = $this->db->query($sql)->num_rows();
        return $result;
    }
    
    public function get_tb_chem_list_ministry_labor_list($chem_seq,$chem_desc,$page,$rec_show)
   {
        $sql = " select *  from tb_chem_list_ministry_labor ";
        $sqlOrder = " order  by chem_seq ";
        $sqlLimit = " Limit $page,$rec_show";
        $sqlWhere = $this->whereCondition($chem_seq, $chem_desc);         
        $sql=$sql .$sqlWhere . $sqlOrder .$sqlLimit;
        //echo $sql;        
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
   }
   
   public function check_tb_chem_list_ministry_labor_list($chem_seq,$chem_desc)
   {
        $sql = " select 1  from tb_chem_list_ministry_labor ";
        //$sqlLimt = " LIMIT 1 ";
        $sqlWhere = $this->whereCondition($chem_seq, $chem_desc);       
        $sql=$sql . $sqlWhere  ;
        //echo $sql;
        $result = $this->db->query($sql)->num_rows();
        return $result;
   }
   /*public function count_row_tb_chem_list_ministry_labor_list($chem_seq,$chem_desc)
   {
        $sql = " select 1  from tb_chem_list_ministry_labor ";
        $sqlLimt = " LIMIT 1 ";
        $sqlWhere = $this->whereCondition($chem_seq, $chem_desc);       
        $sql=$sql . $sqlWhere  ;
        //echo $sql;
        $result = $this->db->query($sql)->num_rows();
        return $result;
   }*/
   public function whereCondition($chem_seq,$chem_desc)
      {
       $sqlWhere=" ";
       if(trim($chem_seq) != "" || trim($chem_desc) != "")
       {
        $sqlWhere = " where   ";
       }
       if(trim($chem_seq) != "")
        {
          $sqlWhere = $sqlWhere . "   chem_seq = '$chem_seq'";
        }
        
       if(trim($chem_seq) != "" && trim($chem_desc) != "")
       {
        $sqlWhere = $sqlWhere . " or   ";
       }
        
         if(trim($chem_desc) != "")
        {
           $sqlWhere = $sqlWhere . "  chem_desc like '%$chem_desc%' ";
        }  
        return $sqlWhere; 
      }
      
       public function update_tb_chem_list_ministry_labor($chem_seq,$chem_cas_number, $chem_name_th, $chem_name_en, $chem_desc,  $user_id, $date) {
       // $this->db->set('chem_no', $chem_no);
         $this->db->set('chem_cas_number', $chem_cas_number);
         $this->db->set('chem_name_th', $chem_name_th);
        $this->db->set('chem_name_en', $chem_name_en);
        $this->db->set('chem_desc', $chem_desc);       
        //$this->db->set('create_date', $date);
       // $this->db->set('create_userid', $user_id);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);
        
        $this->db->where('chem_seq', $chem_seq);
        
        $this->db->update('tb_chem_list_ministry_labor');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
     public function insert_tb_chem_list_ministry_labor($chem_seq,$chem_cas_number, $chem_name_th, $chem_name_en, $chem_desc,  $user_id, $date) {
        $this->db->set('chem_cas_number', $chem_cas_number);
        $this->db->set('chem_name_th', $chem_name_th);
        $this->db->set('chem_name_en', $chem_name_en);
        $this->db->set('chem_desc', $chem_desc);       
        $this->db->set('create_date', $date);
        $this->db->set('create_userid', $user_id);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);        
        $this->db->set('chem_seq', $chem_seq);
        
        
        $this->db->insert('tb_chem_list_ministry_labor');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public function delete_tb_chem_list_ministry_labor($chem_seq) {
       
        
        $this->db->where('chem_seq', $chem_seq);
        
        $this->db->delete('tb_chem_list_ministry_labor');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
      
       

}

?>