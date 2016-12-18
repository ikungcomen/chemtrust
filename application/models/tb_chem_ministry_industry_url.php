<?php

class tb_chem_ministry_industry_url extends CI_Model {

    public function check_tb_chem_ministry_industry_url($mi_url_no) {
        $sql = " select 1  from tb_chem_ministry_industry_url ";
        $sql = $sql . " where mi_url_no = '$mi_url_no' ";
        $result = $this->db->query($sql)->num_rows();
        return $result;
    }

    public function get_tb_chem_ministry_industry_url($mi_url_no) {
        $sql = " select ";
        $sql = $sql . "u.mi_url_no, ";
        $sql = $sql . "u.mi_url_name, ";
        $sql = $sql . "u.mi_url, ";
        $sql = $sql . "u.chem_ind_type_1, ";
        $sql = $sql . "u.chem_ind_type_2, ";
        $sql = $sql . "u.chem_ind_type_3, ";
        $sql = $sql . "u.chem_ind_type_4, ";
        $sql = $sql . "u.chem_ind_type_0, ";
        $sql = $sql . "DATE_FORMAT(u.create_date,'%d/%m/%Y') as create_date, ";
        $sql = $sql . "u.create_userid, ";
        $sql = $sql . "DATE_FORMAT(u.update_date,'%d/%m/%Y') as update_date, ";
        $sql = $sql . "u.update_userid ";
        $sql = $sql . "from ";
        $sql = $sql . "tb_chem_ministry_industry_url u   ";
        $sql = $sql . " where mi_url_no = '$mi_url_no' ";
        //echo $sql;        

        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function whereCondition($chem_seq, $chem_desc) {
        $sqlWhere = " ";
        if (trim($chem_seq) != "" || trim($chem_desc) != "") {
            $sqlWhere = " where   ";
        }
        if (trim($chem_seq) != "") {
            $sqlWhere = $sqlWhere . "   chem_seq = '$chem_seq'";
        }

        if (trim($chem_seq) != "" && trim($chem_desc) != "") {
            $sqlWhere = $sqlWhere . " or   ";
        }

        if (trim($chem_desc) != "") {
            $sqlWhere = $sqlWhere . "  chem_desc like '%$chem_desc%' ";
        }
        return $sqlWhere;
    }

    public function update($mi_url_no, $mi_name, $mi_url, $chem_ind_type_1, $chem_ind_type_2, $chem_ind_type_3, $chem_ind_type_4, $chem_ind_type_0, $user_id, $date) {
        $this->db->where('mi_url_no', $mi_url_no);
        $this->db->set('mi_url_name', $mi_name);
        $this->db->set('mi_url', $mi_url);
        $this->db->set('chem_ind_type_1', $chem_ind_type_1);
        $this->db->set('chem_ind_type_2', $chem_ind_type_2);
        $this->db->set('chem_ind_type_3', $chem_ind_type_3);
        $this->db->set('chem_ind_type_4', $chem_ind_type_4);
        $this->db->set('chem_ind_type_0', $chem_ind_type_0);   

        $this->db->set('create_date', $date);
        $this->db->set('create_userid', $user_id);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);       
        $this->db->update('tb_chem_ministry_industry_url');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function insert($mi_url_no, $mi_name, $mi_url, $chem_ind_type_1, $chem_ind_type_2, $chem_ind_type_3, $chem_ind_type_4, $chem_ind_type_0, $user_id, $date) {

        $this->db->set('mi_url_no', $mi_url_no);
        $this->db->set('mi_url_name', $mi_name);
        $this->db->set('mi_url', $mi_url);
        $this->db->set('chem_ind_type_1', $chem_ind_type_1);
        $this->db->set('chem_ind_type_2', $chem_ind_type_2);
        $this->db->set('chem_ind_type_3', $chem_ind_type_3);
        $this->db->set('chem_ind_type_4', $chem_ind_type_4);
        $this->db->set('chem_ind_type_0', $chem_ind_type_0);   

        $this->db->set('create_date', $date);
        $this->db->set('create_userid', $user_id);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);       
        $this->db->insert('tb_chem_ministry_industry_url');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delete($chem_seq) {


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