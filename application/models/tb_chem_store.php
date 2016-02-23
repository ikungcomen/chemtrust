<?php
class tb_chem_store extends CI_Model{
    public function chem_type(){
        $sql = " select * from tb_chem_store order by chem_store_type asc ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function chem_relation() {
        $sql = " select * from tb_chem_relation ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function add_chem_store_relation() {
        
    }
    
}
?>

