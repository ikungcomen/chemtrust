<?php

class tb_msm_master extends CI_Model {

    public function chem_msmmaster($chem_msm_no) {
        
        /*$sqlWhere = "";
        if (trim($chem_msm_no) != "") {
            $sqlWhere = $sqlWhere . " where chem_msm_name != '" . $chem_msm_no . "'";
        }
        $sql = " select * from tb_msm_master" . $sqlWhere;
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;*/
    }

    public function check_msmmaster($chem_msm_name) {
        $sql = " select * from tb_msm_master where chem_msm_name like '$chem_msm_name'";
        $result = $this->db->query($sql);
        if ($result->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function add_msmmaster($chem_msm_name, $user_id, $date) {
        $this->db->set('chem_msm_name', $chem_msm_name);
        $this->db->set('create_date', $date);
        $this->db->set('create_userid', $user_id);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);
        $this->db->insert('tb_msm_master');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

}
?>

