<?php

class DBhelper extends CI_Model {

    function login($username, $password) {
        $sql = "select * from tb_user where user_id = '" . $username . "' and user_pass = '" . $password . "' and user_status = 'A'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function insert_cemee($chem_no, $chem_cas_number, $chem_seq, $chem_type, $chem_name_th, $chem_name_en, $chem_qty_in, $chem_qty_in_msm, $chem_qty_boh, $chem_qty_boh_msm, $chem_location,$chem_msds_file,$chem_label_file, $user_id, $date) {
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
        $this->db->set('chem_msds_file', $chem_msds_file);
        $this->db->set('chem_label_file', $chem_label_file);
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

    public function getTb_chem_info($chem_no) {
        $sql = "select 	chem_no,chem_name_th  from tb_chem_info  where chem_no = '" . $chem_no . "'";
        $result = $this->db->query($sql);
        return $result->num_rows();
    }

    public function tb_msm_master() {
        $sql = "select 	*  from tb_msm_master order by chem_msm_no asc ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function search_chem_no_auto($chem_no) {
        $sql = "select 	*  from tb_chem_info where chem_no like '%" . $chem_no . "%'";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function search_chem_name_auto($chem_name) {
        $sql = "select 	*  from tb_chem_info where chem_name_th like '%$chem_name%'";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function search_chem($chem_no, $chem_name) {
        $sqlWhere = "";
        if (trim($chem_no) != "") {
            $sqlWhere = $sqlWhere . " tci.chem_no = '$chem_no'";
        }
        if (trim($chem_name) != "") {
            if ($sqlWhere != "") {
                $sqlWhere = $sqlWhere . " and ";
            }
            $sqlWhere = $sqlWhere . " tci.chem_name_th = '$chem_name'";
        }
        if ($sqlWhere != "") {
            $sqlWhere = "where " . $sqlWhere;
        }
        $sql = " select chem_no as chem_no	";
        $sql = $sql . "   ,tci.chem_cas_number as chem_cas_number";
        $sql = $sql . "   ,tci.chem_seq as chem_seq ";
        $sql = $sql . "   ,tci.chem_name_th as chem_name_th ";
        $sql = $sql . "   ,tci.chem_name_en as chem_name_en ";
        $sql = $sql . "   ,tcs.chem_store_name as chem_type";
        $sql = $sql . "   ,tci.chem_location as chem_location ";
        $sql = $sql . "   ,tci.chem_qty_in as chem_qty_in ";
        $sql = $sql . "   ,tci.chem_qty_in_msm as chem_qty_in_msm ";
        $sql = $sql . "   ,tci.chem_qty_boh as chem_qty_boh ";
        $sql = $sql . "   ,tci.chem_qty_boh_msm as chem_qty_boh_msm ";
        $sql = $sql . "   ,tci.update_userid as update_userid ";
        $sql = $sql . "   ,DATE_FORMAT(tci.update_date,'%d/%m/%Y') as update_date";
        $sql = $sql . " from tb_chem_info tci ";
        $sql = $sql . " left join tb_chem_store tcs on tci.chem_type  = tcs.chem_store_type " . $sqlWhere;
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function delete_chem($chem_no) {
        $this->db->where('chem_no', $chem_no);
        $this->db->delete('tb_chem_info');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function detai_chem($chem_no) {
        $sql = "";
        $sql = " select chem_no as chem_no	";
        $sql = $sql . "   ,tci.chem_cas_number                     as chem_cas_number";
        $sql = $sql . "   ,tci.chem_seq                            as chem_seq ";
        $sql = $sql . "   ,tci.chem_name_th                        as chem_name_th ";
        $sql = $sql . "   ,tci.chem_name_en                        as chem_name_en ";
        $sql = $sql . "   ,tci.chem_type                           as chem_type ";
        $sql = $sql . "   ,tcs.chem_store_name                     as chem_store_name ";
        $sql = $sql . "   ,tci.chem_location                       as chem_location ";
        $sql = $sql . "   ,tci.chem_qty_in                         as chem_qty_in ";
        $sql = $sql . "   ,tci.chem_qty_in_msm                     as chem_qty_in_msm ";
        $sql = $sql . "   ,tci.chem_qty_boh                        as chem_qty_boh ";
        $sql = $sql . "   ,tci.chem_qty_boh_msm                    as chem_qty_boh_msm ";
        $sql = $sql . "   ,tci.chem_msds_file                    as chem_msds_file ";
        $sql = $sql . "   ,tci.chem_label_file                    as chem_label_file ";
        $sql = $sql . "   ,tci.create_userid                           as create_userid";
        $sql = $sql . "   ,DATE_FORMAT(tci.create_date,'%d/%m/%Y')     as create_date";

        $sql = $sql . "   ,tci.update_userid                       as update_userid ";
        $sql = $sql . "   ,tcw.chem_warehouse_name                 as chem_warehouse_name ";
        $sql = $sql . "   ,DATE_FORMAT(tci.update_date,'%d/%m/%Y') as update_date";
        $sql = $sql . "   ,(select chem_msm_name from tb_msm_master where chem_msm_no = tci.chem_qty_in_msm)  as chem_msm_name_in ";
        $sql = $sql . "   ,(select chem_msm_name from tb_msm_master where chem_msm_no = tci.chem_qty_boh_msm) as chem_msm_name_out";
        $sql = $sql . " from tb_chem_info tci ";
        $sql = $sql . " left join tb_chem_store tcs on tci.chem_type  = tcs.chem_store_type ";
        $sql = $sql . " left join tb_chem_warehouse tcw on tcw.chem_warehouse_code  = tci.chem_location ";
        $sql = $sql . "where chem_no = '" . $chem_no . "'";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    /* public function get_chem_classify($chem_no){
      //xxxx
      } */

    public function get_chem_classify($chem_no) {
        $sql = "";
        $sql = $sql . "select ghs.chem_no,";
        $sql = $sql . "ghs.chem_ghs_label,";
        $sql = $sql . "ghs.chem_ghs_haz_level,";
        $sql = $sql . "ghs.chem_ghs_des,";
        $sql = $sql . "ghs.chem_list_acc_no_mil,";
        $sql = $sql . "ghs.chem_seq_mil,";
        $sql = $sql . "ghs.chem_seq_lbl,";
        $sql = $sql . "clmi.chem_ind_type,";
        $sql = $sql . "DATE_FORMAT(ghs.create_date,'%d/%m/%Y') as create_date,";
        $sql = $sql . "ghs.create_userid,";
        $sql = $sql . "DATE_FORMAT(ghs.update_date,'%d/%m/%Y')  as update_date,";
        $sql = $sql . "ghs.update_userid,";
        $sql = $sql . "info.chem_type as chem_type_no,st.chem_store_name  chem_type,info.chem_name_th,info.chem_cas_number, clmi.chem_desc as mi_desc ,clml.chem_desc as ml_desc, ";
        
        $sql = $sql . " info.chem_so_file ";//add by kung 23/03/59
        
        $sql = $sql . " from ";
        $sql = $sql . " tb_chem_ghs_list ghs ";
        $sql = $sql . " left join ";
        $sql = $sql . " tb_chem_info info ";
        $sql = $sql . " on ghs.chem_no = info.chem_no ";
        $sql = $sql . " left join tb_chem_list_ministry_industry  clmi ";
        $sql = $sql . " on ghs.chem_list_acc_no_mil = clmi.chem_list_acc_no ";
        $sql = $sql . " and ghs.chem_seq_mil = clmi.chem_seq ";
        $sql = $sql . " left join tb_chem_list_ministry_labor clml ";
        $sql = $sql . " on ";
        $sql = $sql . " ghs.chem_seq_lbl = clml.chem_seq ";
        $sql = $sql . " left join tb_chem_store st ";
        $sql = $sql . " on ";
        $sql = $sql . " info.chem_type = st.chem_store_type ";
        $sql = $sql . " where ghs.chem_no =  '$chem_no' ";
        //echo $sql;        
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    //add by kung 230359
    public function update_so_file($chem_no, $filename, $user_id, $date){
        $this->db->set('chem_so_file', $filename);
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
    //add by kung 240359
    public function get_chem_url(){
        $sql = "select 	*  from tb_chem_url order by chem_url_no asc ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function save_chem_url($report_name, $url_name, $user_id, $date){
        $this->db->set('chem_url', $url_name);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);
        $this->db->where('chem_url_no', $report_name);
        $this->db->update('tb_chem_url');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function check_chem_classify($chem_no) {
        $sql = "";
        $sql = $sql . "select 1 ";
        $sql = $sql . " from ";
        $sql = $sql . " tb_chem_ghs_list ghs ";
        $sql = $sql . " left join ";
        $sql = $sql . " tb_chem_info info ";
        $sql = $sql . " on ghs.chem_no = info.chem_no ";
        $sql = $sql . " left join tb_chem_list_ministry_industry  clmi ";
        $sql = $sql . " on ghs.chem_list_acc_no_mil = clmi.chem_list_acc_no ";
        $sql = $sql . " and ghs.chem_seq_mil = clmi.chem_seq ";
        $sql = $sql . " left join tb_chem_list_ministry_labor clml ";
        $sql = $sql . " on ";
        $sql = $sql . " ghs.chem_seq_lbl = clml.chem_seq ";
        $sql = $sql . " where ghs.chem_no =  '$chem_no'  ";
        //echo $sql;        
        $result = $this->db->query($sql)->num_rows();
        return $result;
    }

    public function search_tb_chem_info($chem_no) {
        $sql = " select chem_no,chem_name_th  from tb_chem_info ";
        $sql = $sql . " where chem_no like '%$chem_no%' or   chem_name_th like '%$chem_no%' or   chem_name_en like '%$chem_no%' or   chem_cas_number like '%$chem_no%'";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function get_tb_chem_list_ministry_industry($mi_desc) {
        $sql = " select chem_list_acc_no,chem_seq,chem_desc  from tb_chem_list_ministry_industry ";
        $sql = $sql . " where chem_desc like '%$mi_desc%' ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function get_tb_chem_list_ministry_labor($ml_desc) {
        $sql = " select chem_seq,chem_desc  from tb_chem_list_ministry_labor ";
        $sql = $sql . " where chem_desc like '%$ml_desc%' ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function get_chem_mil($chem_cas_number) {
        $sql = " select  mi.chem_list_acc_no,mi.chem_seq,mi.chem_desc from tb_chem_list_ministry_industry mi ";
        $sql = $sql . "  where mi.chem_cas_number ='$chem_cas_number' ";
        $result = $this->db->query($sql);
        return $result;
    }

    public function get_chem_mlb($chem_cas_number) {
        $sql = " select  ml.chem_seq,ml.chem_desc from tb_chem_list_ministry_labor ml ";
        $sql = $sql . "  where ml.chem_cas_number ='$chem_cas_number' ";
        $result = $this->db->query($sql);
        return $result;
    }

    public function get_tb_chem_info($chem_no) {
        $sql = "select info.chem_cas_number,info.chem_name_th,styp.chem_store_name from ";
        $sql = $sql . "tb_chem_info info ";
        $sql = $sql . "left join  ";
        $sql = $sql . "tb_chem_store styp ";
        $sql = $sql . "on info.chem_type = styp.chem_store_type ";
        $sql = $sql . " where info.chem_no = '$chem_no' ";
        $result = $this->db->query($sql);
        return $result;
    }

    public function insert_chem_ghs_list($chem_no, $chem_ghs_label, $chem_ghs_haz_level, $chem_ghs_des, $chem_list_acc_no_mil, $chem_seq_mil, $chem_seq_lbl, $user_id, $date) {
        $this->db->set('chem_no', $chem_no);
        $this->db->set('chem_ghs_label', $chem_ghs_label);
        $this->db->set('chem_ghs_haz_level', $chem_ghs_haz_level);
        $this->db->set('chem_ghs_des', $chem_ghs_des);
        $this->db->set('chem_list_acc_no_mil', $chem_list_acc_no_mil);
        $this->db->set('chem_seq_mil', $chem_seq_mil);
        $this->db->set('chem_seq_lbl', $chem_seq_lbl);
        $this->db->set('create_date', $date);
        $this->db->set('create_userid', $user_id);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);
        $this->db->insert('tb_chem_ghs_list');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function update_chem_ghs_list($chem_no, $chem_ghs_label, $chem_ghs_haz_level, $chem_ghs_des, $chem_list_acc_no_mil, $chem_seq_mil, $chem_seq_lbl, $user_id, $date) {
        // $this->db->set('chem_no', $chem_no);
        $this->db->set('chem_ghs_label', $chem_ghs_label);
        $this->db->set('chem_ghs_haz_level', $chem_ghs_haz_level);
        $this->db->set('chem_ghs_des', $chem_ghs_des);
        $this->db->set('chem_list_acc_no_mil', $chem_list_acc_no_mil);
        $this->db->set('chem_seq_mil', $chem_seq_mil);
        $this->db->set('chem_seq_lbl', $chem_seq_lbl);
        //$this->db->set('create_date', $date);
        // $this->db->set('create_userid', $user_id);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);

        $this->db->where('chem_no', $chem_no);

        $this->db->update('tb_chem_ghs_list');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

}

?>