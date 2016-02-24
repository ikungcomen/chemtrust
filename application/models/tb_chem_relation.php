<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tb_chem_relation
 *
 * @author anurartkae
 */
class tb_chem_relation extends CI_Model{
    public function chem_relation() {
        $sql = " select * from tb_chem_relation  ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function check_chemstore_relation($chem_type_1,$chem_type_2,$chem_relation) {
        $sql = " select 1 from  tb_chem_store_relation where (chem_store_type_main = '$chem_type_1' and chem_store_type_relation = '$chem_type_2' )  ";
        $sql = $sql." or (chem_store_type_main = '$chem_type_2' and chem_store_type_relation = '$chem_type_1') limit 1 ";
        $result = $this->db->query($sql);
        return $result->num_rows();
    }
    
     public function chemstore_relation() {
        $sql = " select ";
        $sql = $sql."  (select chem_store_name from tb_chem_store where chem_store_type = tcsr.chem_store_type_main )as chem_store_type_main ";
        $sql = $sql." ,(select chem_store_name from tb_chem_store where chem_store_type = tcsr.chem_store_type_relation )as chem_store_type_relation ";
        $sql = $sql." ,tcsr.chem_store_type_main     as chem_store_type_1 ";
        $sql = $sql." ,tcsr.chem_store_type_relation as chem_store_type_2 ";
        $sql = $sql." ,tcr.chem_relation_code        as chem_relation_code     ";
        $sql = $sql." ,tcr.chem_relation_descr       as chem_relation_descr    ";
        $sql = $sql."  from tb_chem_store_relation tcsr  ";
        $sql = $sql." left join tb_chem_relation tcr on tcr.chem_relation_code =tcsr.chem_relation_code ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function delete_chem_store_relation($chem_store_type_1,$chem_store_type_2) {
        $this->db->where('chem_store_type_main', $chem_store_type_1);
        $this->db->where('chem_store_type_relation', $chem_store_type_2);
        $this->db->delete('tb_chem_store_relation');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public function update_chemstore_relation($chem_store_type_1,$chem_store_type_2) {
        /*$this->db->where('chem_store_type_main', $chem_store_type_1);
        $this->db->where('chem_store_type_relation', $chem_store_type_2);
        $this->db->delete('tb_chem_store_relation');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }*/
    }
    public function insert_chemstore_relation($chem_store_type_1,$chem_store_type_2) {
        /*$this->db->where('chem_store_type_main', $chem_store_type_1);
        $this->db->where('chem_store_type_relation', $chem_store_type_2);
        $this->db->delete('tb_chem_store_relation');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }*/
    }
   
}
