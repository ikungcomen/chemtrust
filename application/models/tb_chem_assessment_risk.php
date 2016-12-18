<?php

class tb_chem_assessment_risk extends CI_Model {

    public function get_tb_chem_assessment_risk($chem_no) {
        $sql = "";
        $sql = $sql . "select ar.chem_no,";
        $sql = $sql . " ar.chem_con_lvl_no,";
        $sql = $sql . " ar.chem_seq_lvl_no,";
        $sql = $sql . " ar.chem_haz_eff_hea_no,";
        $sql = $sql . " ar.chem_measure_ole_twa_value_cur,";
        $sql = $sql . " ar.chem_std_ole_twa_value,";
        $sql = $sql . " DATE_FORMAT(ar.create_date,'%d/%m/%Y') create_date,";
        $sql = $sql . " DATE_FORMAT(ar.update_date,'%d/%m/%Y') update_date,";
        $sql = $sql . " ar.update_userid,ar.create_userid,";
        $sql = $sql . " info.chem_name_th,info.chem_cas_number,";
        $sql = $sql . " st.chem_store_name as chem_type,";
        $sql = $sql . " cl.chem_con_lvl_name,";
        $sql = $sql . " sl.chem_seq_lvl_name,";
        $sql = $sql . " sl.chem_seq_lvl_desc,";
        $sql = $sql . " heh.chem_haz_eff_hea_name,";
        $sql = $sql . " heh.chem_haz_eff_hea_desc,";
        $sql = $sql . " tl.chem_touch_lvl_no,";
        $sql = $sql . " tl.chem_touch_lvl_name,";
        $sql = $sql . " tl.chem_touch_lvl_desc,";
        $sql = $sql . " rl.chem_risk_lvl_no,";
        $sql = $sql . " rl.chem_risk_lvl_name,";
        $sql = $sql . " rl.chem_risk_lvl_desc,tl.chem_touch_lvl_no  * ar.chem_haz_eff_hea_no as risk_lvl";
        $sql = $sql . " from ";
        $sql = $sql . " tb_chem_assessment_risk";
        $sql = $sql . " ar";
        $sql = $sql . " left join tb_chem_info info";
        $sql = $sql . " on info.chem_no = ar.chem_no";
        $sql = $sql . " left join tb_chem_store st";
        $sql = $sql . " on";
        $sql = $sql . " st.chem_store_type = info.chem_type";
        $sql = $sql . " left join tb_chem_con_lvl cl";
        $sql = $sql . " on";
        $sql = $sql . " ar.chem_con_lvl_no = cl.chem_con_lvl_no";
        $sql = $sql . " left join tb_chem_seq_lvl sl";
        $sql = $sql . " on";
        $sql = $sql . " ar.chem_seq_lvl_no = sl.chem_seq_lvl_no";
        $sql = $sql . " left join tb_chem_haz_eff_hea heh";
        $sql = $sql . " on";
        $sql = $sql . " ar.chem_haz_eff_hea_no = heh.chem_haz_eff_hea_no";
        $sql = $sql . " left join tb_chem_touch_lvl tl";
        $sql = $sql . " on";
        $sql = $sql . " ar.chem_seq_lvl_no * ar.chem_seq_lvl_no between tl.chem_touch_lvl_bno and tl.chem_touch_lvl_eno";
        $sql = $sql . " left join tb_chem_risk_lvl rl ";
        $sql = $sql . " on ";
        $sql = $sql . " tl.chem_touch_lvl_no  * ar.chem_haz_eff_hea_no between rl.chem_risk_lvl_bno and rl.chem_risk_lvl_eno";
        $sql = $sql . " where  ar.chem_no ='$chem_no'";

        //echo $sql;        
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function get_tb_chem_assessment_risk_all() {
        $sql = "";
        $sql = $sql . "select ar.chem_no,";
        $sql = $sql . " ar.chem_con_lvl_no,";
        $sql = $sql . " ar.chem_seq_lvl_no,";
        $sql = $sql . " ar.chem_haz_eff_hea_no,";
        $sql = $sql . " ar.chem_measure_ole_twa_value_cur,";
        $sql = $sql . " ar.chem_std_ole_twa_value,";
        $sql = $sql . " DATE_FORMAT(ar.create_date,'%d/%m/%Y') create_date,";
        $sql = $sql . " DATE_FORMAT(ar.update_date,'%d/%m/%Y') update_date,";
        $sql = $sql . " ar.update_userid,ar.create_userid,";
        $sql = $sql . " info.chem_name_th,info.chem_cas_number,";
        $sql = $sql . " st.chem_store_name as chem_type,";
        $sql = $sql . " cl.chem_con_lvl_name,";
        $sql = $sql . " sl.chem_seq_lvl_name,";
        $sql = $sql . " sl.chem_seq_lvl_desc,";
        $sql = $sql . " heh.chem_haz_eff_hea_name,";
        $sql = $sql . " heh.chem_haz_eff_hea_desc,";
        $sql = $sql . " tl.chem_touch_lvl_no,";
        $sql = $sql . " tl.chem_touch_lvl_name,";
        $sql = $sql . " tl.chem_touch_lvl_desc,";
        $sql = $sql . " rl.chem_risk_lvl_no,";
        $sql = $sql . " rl.chem_risk_lvl_name,";
        $sql = $sql . " rl.chem_risk_lvl_desc,tl.chem_touch_lvl_no  * ar.chem_haz_eff_hea_no as risk_lvl";
        $sql = $sql . " from ";
        $sql = $sql . " tb_chem_assessment_risk";
        $sql = $sql . " ar";
        $sql = $sql . " left join tb_chem_info info";
        $sql = $sql . " on info.chem_no = ar.chem_no";
        $sql = $sql . " left join tb_chem_store st";
        $sql = $sql . " on";
        $sql = $sql . " st.chem_store_type = info.chem_type";
        $sql = $sql . " left join tb_chem_con_lvl cl";
        $sql = $sql . " on";
        $sql = $sql . " ar.chem_con_lvl_no = cl.chem_con_lvl_no";
        $sql = $sql . " left join tb_chem_seq_lvl sl";
        $sql = $sql . " on";
        $sql = $sql . " ar.chem_seq_lvl_no = sl.chem_seq_lvl_no";
        $sql = $sql . " left join tb_chem_haz_eff_hea heh";
        $sql = $sql . " on";
        $sql = $sql . " ar.chem_haz_eff_hea_no = heh.chem_haz_eff_hea_no";
        $sql = $sql . " left join tb_chem_touch_lvl tl";
        $sql = $sql . " on";
        $sql = $sql . " ar.chem_seq_lvl_no * ar.chem_seq_lvl_no between tl.chem_touch_lvl_bno and tl.chem_touch_lvl_eno";
        $sql = $sql . " left join tb_chem_risk_lvl rl ";
        $sql = $sql . " on ";
        $sql = $sql . " tl.chem_touch_lvl_no  * ar.chem_haz_eff_hea_no between rl.chem_risk_lvl_bno and rl.chem_risk_lvl_eno";
        //$sql = $sql . " where  ar.chem_no ='$chem_no'";

        //echo $sql;        
        $result = $this->db->query($sql);
        //$result = $result->result_array();
        return $result;
    }


    public function check_tb_chem_assessment_risk($chem_no) {
        $sql = "";
        $sql = $sql . "select 1 ";
        $sql = $sql . " from ";
        $sql = $sql . " tb_chem_assessment_risk ar ";     
        $sql = $sql . " where ar.chem_no =  '$chem_no'  ";
        //echo $sql;        
        $result = $this->db->query($sql)->num_rows();
        return $result;
    }

    public function insert_tb_chem_assessment_risk($chem_no, $chem_con_lvl_no, $chem_seq_lvl_no, $chem_haz_eff_hea_no, $chem_measure_ole_twa_value_cur, $chem_std_ole_twa_value, $user_id, $date) {
        /*      CREATE TABLE `tb_chem_assessment_risk` (
          `chem_no` VARCHAR(10) NOT NULL,
          `chem_con_lvl_no` INT(11) NULL DEFAULT NULL,
          `chem_seq_lvl_no` INT(11) NULL DEFAULT NULL,
          `chem_haz_eff_hea_no` INT(11) NULL DEFAULT NULL,
          `chem_measure_ole_twa_value_cur` VARCHAR(50) NULL DEFAULT NULL,
          `chem_std_ole_twa_value` VARCHAR(50) NULL DEFAULT NULL,
          `create_date` DATE NOT NULL,
          `create_userid` VARCHAR(10) NOT NULL,
          `update_date` DATE NOT NULL,
          `update_userid` VARCHAR(10) NOT NULL,
          PRIMARY KEY (`chem_no`),
          UNIQUE INDEX `chem_no` (`chem_no`)
          )
          COLLATE='tis620_thai_ci'
          ENGINE=InnoDB
          ; */

        $this->db->set('chem_no', $chem_no);
        $this->db->set('chem_con_lvl_no', $chem_con_lvl_no);
        $this->db->set('chem_seq_lvl_no', $chem_seq_lvl_no);
        $this->db->set('chem_haz_eff_hea_no', $chem_haz_eff_hea_no);
        $this->db->set('chem_measure_ole_twa_value_cur', $chem_measure_ole_twa_value_cur);
        $this->db->set('chem_std_ole_twa_value', $chem_std_ole_twa_value);


        //-----
        $this->db->set('create_date', $date);
        $this->db->set('create_userid', $user_id);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);
        $this->db->insert('tb_chem_assessment_risk');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function update_tb_chem_assessment_risk($chem_no, $chem_con_lvl_no, $chem_seq_lvl_no, $chem_haz_eff_hea_no, $chem_measure_ole_twa_value_cur, $chem_std_ole_twa_value, $user_id, $date) {
        // $this->db->set('chem_no', $chem_no);
        $this->db->set('chem_con_lvl_no', $chem_con_lvl_no);
        $this->db->set('chem_seq_lvl_no', $chem_seq_lvl_no);
        $this->db->set('chem_haz_eff_hea_no', $chem_haz_eff_hea_no);
        $this->db->set('chem_measure_ole_twa_value_cur', $chem_measure_ole_twa_value_cur);
        $this->db->set('chem_std_ole_twa_value', $chem_std_ole_twa_value);
        //$this->db->set('create_date', $date);
        // $this->db->set('create_userid', $user_id);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);

        $this->db->where('chem_no', $chem_no);

        $this->db->update('tb_chem_assessment_risk');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

}

?>