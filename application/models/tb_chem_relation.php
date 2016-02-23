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
   
}
