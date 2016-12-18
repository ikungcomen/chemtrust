<?php

class tb_chem_con_lvl extends CI_Model {

    
   public function get_tb_chem_con_lvl($chem_con_lvl_no)
   {
        $sql = " select *,DATE_FORMAT(create_date,'%d/%m/%Y') as create_date_fmt,DATE_FORMAT(update_date,'%d/%m/%Y') as update_date_fmt  from tb_chem_con_lvl ";
        $sql = $sql . " where chem_con_lvl_no = '$chem_con_lvl_no' ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
   }
   
    public function check_tb_chem_con_lvl($chem_con_lvl_no) {
        $sql = " select 1 from tb_chem_con_lvl ";
        $sql = $sql . " where chem_con_lvl_no = '$chem_con_lvl_no' ";
        //echo $sql;        
        $result = $this->db->query($sql)->num_rows();
        return $result;
    }
    
    public function get_tb_chem_con_lvl_list()
   {
        $sql = " select *  from tb_chem_con_lvl ";
        $sqlOrder = " order  by chem_con_lvl_no ";
        //$sqlWhere = $this->whereCondition($chem_seq, $chem_desc);         
        $sql=$sql . $sqlOrder;
       // echo $sql;        
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
   }
   
   public function check_tb_chem_con_lvl_list()
   {
        $sql = " select 1  from tb_chem_con_lvl ";
        $sqlLimt = " LIMIT 1 ";
        //$sqlWhere = $this->whereCondition($chem_seq, $chem_desc);       
        $sql=$sql  . $sqlLimt ;
        //echo $sql;
        $result = $this->db->query($sql)->num_rows();
        return $result;
   }
   /*public function whereCondition($chem_seq,$chem_desc)
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
      }*/
      
       public function update_tb_chem_con_lvl($chem_con_lvl_no,$chem_con_lvl_name,$chem_con_lvl_desc,$user_id, $date) {
       // $this->db->set('chem_no', $chem_no);
        $this->db->set('chem_con_lvl_name', $chem_con_lvl_name);
       // $this->db->set('chem_con_lvl_desc', $chem_con_lvl_desc);

           
        //$this->db->set('create_date', $date);
       // $this->db->set('create_userid', $user_id);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);
        
        $this->db->where('chem_con_lvl_no', $chem_con_lvl_no);
        
        $this->db->update('tb_chem_con_lvl');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
     public function insert_tb_chem_con_lvl($chem_con_lvl_no,$chem_con_lvl_name,$chem_con_lvl_desc,$user_id, $date) {
        $this->db->set('chem_con_lvl_no', $chem_con_lvl_no); 
        $this->db->set('chem_con_lvl_name', $chem_con_lvl_name);
        //$this->db->set('chem_con_lvl_desc', $chem_con_lvl_desc);        
        $this->db->set('create_date', $date);
        $this->db->set('create_userid', $user_id);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);  
        $this->db->insert('tb_chem_con_lvl');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public function delete_tb_chem_con_lvl($chem_con_lvl_no) {       
        
        $this->db->where('chem_con_lvl_no', $chem_con_lvl_no);
        
        $this->db->delete('tb_chem_con_lvl');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
      
       

}

?>