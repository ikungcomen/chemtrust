<?php
class tb_chem_store extends CI_Model{
    public function chem_type($chem_type){
        //$sqlWhere = "";
        //if (trim($chem_type) != "") {
            //$sqlWhere = $sqlWhere." where chem_store_type != '".$chem_type."'";
        //}
        $sql = " select * from tb_chem_store order by chem_store_type asc ";//.$sqlWhere
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
}
?>

