<?php

class DBhelper extends CI_Model {

    function login($username, $password) {
        $sql = "select * from tb_user where user_id = '" . $username . "' and user_pass = '" . $password . "' and user_status = 'A'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function insert_cemee($chem_no, $chem_cas_number, $chem_seq, $chem_type, $chem_name_th, $chem_name_en, $chem_qty_in, $chem_qty_in_msm, $chem_qty_boh, $chem_qty_boh_msm, $chem_location, $user_id, $date) {
        $this->db->set('chem_no', $chem_no);
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
        $this->db->set('create_date', $date);
        $this->db->set('create_userid', $user_id);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);
        $this->db->insert('tb_chem_info');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function getTb_chem_info(){
        $sql = "select 	chem_name_th  from tb_chem_info ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public  function tb_msm_master(){
        $sql = "select 	*  from tb_msm_master ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

}

?>