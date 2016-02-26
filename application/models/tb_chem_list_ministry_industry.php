<?php

class tb_chem_list_ministry_industry extends CI_Model {

    public function get_tb_chem_list_ministry_industry($chem_list_acc_no, $chem_seq) {
        $sql = " select *  from tb_chem_list_ministry_industry ";
        $sql = $sql . " where chem_seq = '$chem_seq' and chem_list_acc_no = '$chem_list_acc_no'";
        // echo $sql;
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function check_tb_chem_list_ministry_industry($chem_list_acc_no, $chem_seq) {
        $sql = " select 1 from tb_chem_list_ministry_industry ";
        $sql = $sql . " where chem_seq = '$chem_seq' and chem_list_acc_no = '$chem_list_acc_no'";
        // echo $sql;        
        $result = $this->db->query($sql)->num_rows();
        return $result;
    }

    public function get_tb_chem_list_ministry_industry_list($chem_list_acc_no, $chem_seq, $chem_desc) {
        $sql = " select *  from tb_chem_list_ministry_industry ";
        $sqlOrder = " order  by chem_list_acc_no,chem_seq ";
        $sqlWhere = $this->whereCondition($chem_list_acc_no, $chem_seq, $chem_desc);
        $sql = $sql . $sqlWhere . $sqlOrder;
        // echo $sql;        
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function check_tb_chem_list_ministry_industry_list($chem_list_acc_no, $chem_seq, $chem_desc) {
        $sql = " select 1  from tb_chem_list_ministry_industry ";
        $sqlLimt = " LIMIT 1 ";
        $sqlWhere = $this->whereCondition($chem_list_acc_no, $chem_seq, $chem_desc);
        $sql = $sql . $sqlWhere . $sqlLimt;
        //echo $sql;
        $result = $this->db->query($sql)->num_rows();
        return $result;
    }

    public function whereCondition($chem_list_acc_no, $chem_seq, $chem_desc) {
        $sqlWhere = " ";
        if (trim($chem_seq) != "" || trim($chem_desc) != "" || trim($chem_list_acc_no) != "") {
            $sqlWhere = " where   ";
        }
        if (trim($chem_list_acc_no) != "") {
            $sqlWhere = $sqlWhere . "   chem_list_acc_no = '$chem_list_acc_no' ";
        }

        if (trim($chem_list_acc_no) != "" && trim($chem_seq) != "") {
            $sqlWhere = $sqlWhere . "  or ";
        }

        if (trim($chem_seq) != "") {
            $sqlWhere = $sqlWhere . "   chem_seq = '$chem_seq' ";
        }

        if ((trim($chem_list_acc_no) != "" && trim($chem_desc) != "") || (trim($chem_seq) != "" && trim($chem_desc) != "")) {
            $sqlWhere = $sqlWhere . "  or ";
        }

        if (trim($chem_desc) != "") {
            $sqlWhere = $sqlWhere . "  chem_desc like '%$chem_desc%' ";
        }

        return $sqlWhere;
    }

    public function update_tb_chem_list_ministry_industry($chem_list_acc_no, $chem_seq, $chem_cas_number, $chem_ind_name, $chem_ind_type, $chem_condition, $chem_desc, $user_id, $date) {
        //$this->db->set('chem_no', $chem_no);
        //echo 'update' .  $chem_list_acc_no;
        $this->db->set('chem_cas_number', $chem_cas_number);
        $this->db->set('chem_ind_name', $chem_ind_name);
        $this->db->set('chem_ind_type', $chem_ind_type);
        $this->db->set('chem_condition', $chem_condition);
        $this->db->set('chem_desc', $chem_desc);
        //$this->db->set('create_date', $date);
        // $this->db->set('create_userid', $user_id);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);

        $this->db->where('chem_list_acc_no', $chem_list_acc_no);
        $this->db->where('chem_seq', $chem_seq);

        $this->db->update('tb_chem_list_ministry_industry');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function insert_tb_chem_list_ministry_industry($chem_list_acc_no, $chem_seq, $chem_cas_number, $chem_ind_name, $chem_ind_type, $chem_condition, $chem_desc, $user_id, $date) {
        $this->db->set('chem_cas_number', $chem_cas_number);
        $this->db->set('chem_ind_name', $chem_ind_name);
        $this->db->set('chem_ind_type', $chem_ind_type);
        $this->db->set('chem_condition', $chem_condition);
        $this->db->set('chem_desc', $chem_desc);
        //$this->db->set('create_date', $date);
        // $this->db->set('create_userid', $user_id);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);

        $this->db->set('chem_list_acc_no', $chem_list_acc_no);
        $this->db->set('chem_seq', $chem_seq);

        $this->db->insert('tb_chem_list_ministry_industry');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delete_tb_chem_list_ministry_industry($chem_list_acc_no,$chem_seq) {

        $this->db->where('chem_list_acc_no', $chem_list_acc_no);
        $this->db->where('chem_seq', $chem_seq);

        $this->db->delete('tb_chem_list_ministry_industry');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

}

?>