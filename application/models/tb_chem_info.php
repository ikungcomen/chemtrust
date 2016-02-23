<?php

class tb_chem_info extends CI_Model {

    public function check_cheminfo($chem_no,$chem_name_th) {
        
        $sqlWgere = "";
        if (trim($chem_no) != "") {
            $sqlWgere = $sqlWgere." chem_no = '$chem_no'";
        }
        if (trim($chem_name_th) != "") {
            if (trim($sqlWgere) != "") {
                $sqlWgere = $sqlWgere." and ";
            }
            $sqlWgere = $sqlWgere." chem_name_th = '$chem_name_th'";
        }
        if (trim($sqlWgere) != "") {
            $sqlWgere = " where ".$sqlWgere;
        }
        $sql = "select 	1  from tb_chem_info ".$sqlWgere." limit 1 ";
        $result = $this->db->query($sql);
        return $result->num_rows();
    }

    public function update_chem($chem_no, $chem_cas_number, $chem_seq, $chem_type, $chem_name_th, $chem_name_en, $chem_qty_in, $chem_qty_in_msm, $chem_qty_boh, $chem_qty_boh_msm, $chem_location, $user_id, $date) {
        $this->db->set('chem_cas_number', $chem_cas_number);
        $this->db->set('chem_seq', $chem_seq);
        $this->db->set('chem_type', $chem_type);
        $this->db->set('chem_name_th', $chem_name_th);
        $this->db->set('chem_name_en', $chem_name_en);
        $this->db->set('chem_qty_in', $chem_qty_in);
        $this->db->set('chem_qty_in_msm', $chem_qty_in_msm);
        $this->db->set('chem_qty_boh', $chem_qty_boh);
        $this->db->set('chem_qty_boh_msm', $chem_qty_boh_msm);
        $this->db->set('chem_location', $chem_location);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);
        $this->db->where('chem_no', $chem_no);
        $this->db->update('tb_chem_info');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function search_chem_store($chen_no){
        $sql = "      select                   ";
        $sql = $sql."  tci.x_chem_no           ";
        $sql = $sql." ,tci.y_chem_no           ";
        $sql = $sql." ,tci.x_chem_name_th      ";
        $sql = $sql." ,tci.y_chem_name_th      ";
        $sql = $sql." ,tci.x_chem_type         ";
        $sql = $sql." ,tci.y_chem_type         ";
        $sql = $sql." ,tcsr.chem_relation_code ";
        
        $sql = $sql." ,tcr.chem_relation_code ";
        $sql = $sql." ,tcr.chem_relation_name ";
        $sql = $sql." ,tcr.chem_relation_descr ";
        
        $sql = $sql."  from(  ";
        $sql = $sql."           select x.chem_no as x_chem_no   ";
        $sql = $sql."                 ,y.chem_no as y_chem_no ";
        $sql = $sql."                 ,x.chem_name_th as x_chem_name_th";
        $sql = $sql."                 ,y.chem_name_th as y_chem_name_th";
        $sql = $sql."                ,x.chem_type as x_chem_type ";
        $sql = $sql."                ,y.chem_type as y_chem_type";
        
        $sql = $sql."           from tb_chem_info x , tb_chem_info y ";
        $sql = $sql."           where x.chem_location = '".$chen_no."'"." and y.chem_location = '".$chen_no."'";
        $sql = $sql."       ) tci ";
        $sql = $sql."left join tb_chem_store_relation tcsr on   ";
        $sql = $sql."( tcsr.chem_store_type_main     = tci.x_chem_type ";
        $sql = $sql."and tcsr.chem_store_type_relation = tci.y_chem_type ) ";
        $sql = $sql."or ";
        $sql = $sql."( tcsr.chem_store_type_main     = tci.y_chem_type ";
        $sql = $sql."and tcsr.chem_store_type_relation = tci.x_chem_type ) ";
        
        /**************************/
        $sql = $sql." left join tb_chem_relation tcr on tcr.chem_relation_code = tcsr.chem_relation_code " ;
        $sql = $sql."";
        $sql = $sql."";
        
        
        /**************************/
        
        $sql = $sql." order by  tci.x_chem_no,tci.y_chem_no ";
        
        
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function get_cheminfo_location($chem_location){
        $sql = "select 	1  from tb_chem_info where chem_location = '".$chem_location."'";
        $result = $this->db->query($sql);
        return $result->num_rows();
    }
    
    public function get_cheminfo($chem_location){
        $sql = "select 	chem_no,chem_name_th  from tb_chem_info where chem_location = '".$chem_location."' order by chem_no asc ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

}
?>

