<?php
class tb_chem_warehouse extends CI_Model{
    public function chem_warehouse(){
        $sql = " select * from tb_chem_warehouse order by chem_warehouse_code asc";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    
    public function check_chemwarehouse($chem_warehouse_code){
        $sql = " select * from tb_chem_warehouse where chem_warehouse_code like '$chem_warehouse_code'";
        $result = $this->db->query($sql);
        if ($result->num_rows() > 0) {
            return 1;
        }else{
            return 0;
        }
    }
    public function add_chemwarehouse($chem_warehouse_code, $chem_warehouse_name, $chem_warehoue_rule, $chem_warehouse_user_control, $user_id, $date){
        $this->db->set('chem_warehouse_code', $chem_warehouse_code);
        $this->db->set('chem_warehouse_name', $chem_warehouse_name);
        $this->db->set('chem_warehoue_rule', $chem_warehoue_rule);
        $this->db->set('chem_warehouse_user_control', $chem_warehouse_user_control);
        $this->db->set('create_date', $date);
        $this->db->set('create_userid', $user_id);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);
        $this->db->insert('tb_chem_warehouse');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    
}
?>

