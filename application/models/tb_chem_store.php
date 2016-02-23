<?php
class tb_chem_store extends CI_Model{
    public function chem_type(){
        $sql = " select * from tb_chem_store order by chem_store_type asc ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function check_store($chem_store_type){
        $sql = " select 1 from tb_chem_store where chem_store_type = '".$chem_store_type."'";
        $result = $this->db->query($sql);
        return $result->num_rows();
    }
    public function insert_chem_relation($chem_store_type, $chem_store_name, $user_id, $date) {
        $this->db->set('chem_store_type', $chem_store_type);
        $this->db->set('chem_store_name', $chem_store_name);
        $this->db->set('create_date', $date);
        $this->db->set('create_userid', $user_id);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);
        $this->db->insert('tb_chem_store');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    
    
}
?>

