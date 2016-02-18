<?php

class tb_user extends CI_Model {

    public function insert_user($user_prefix, $user_name, $user_last_name, $user_email, $user_tel, $user_address, $user_fax, $user_role, $user_id, $user_pass,$filename, $user, $date) {
        $this->db->set('user_prefix', $user_prefix);
        $this->db->set('user_name', $user_name);
        $this->db->set('user_last_name', $user_last_name);
        $this->db->set('user_email', $user_email);
        $this->db->set('user_tel', $user_tel);
        $this->db->set('user_address', $user_address);
        $this->db->set('user_fax', $user_fax);
        $this->db->set('user_role', $user_role);
        $this->db->set('user_status', 'N');
        $this->db->set('user_id', $user_id);
        $this->db->set('user_pass', $user_pass);
        $this->db->set('user_factory', $filename);
        $this->db->set('create_date', $date);
        $this->db->set('create_userid', $user);
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user);
        
        $this->db->insert('tb_user');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function update_user($user_prefix, $user_name, $user_last_name, $user_email, $user_tel, $user_address, $user_fax, $user_role, $filename, $user_id, $date) {
        $this->db->set('user_prefix', $user_prefix);
        $this->db->set('user_name', $user_name);
        $this->db->set('user_last_name', $user_last_name);
        $this->db->set('user_email', $user_email);
        $this->db->set('user_tel', $user_tel);
        $this->db->set('user_address', $user_address);
        $this->db->set('user_fax', $user_fax);
        $this->db->set('user_role', $user_role);
        
        if (trim($filename) != "") {
            $this->db->set('user_factory', $filename);
        }
        $this->db->set('update_date', $date);
        $this->db->set('update_userid', $user_id);
        $this->db->where('user_id', $user_id);
        $this->db->update('tb_user');
        
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delete_user($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->delete('tb_user');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function select_user() {
        $sql = "select 	*  from tb_user order by user_role asc";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function select_user_byid($user_id) {
        $sql = "select 	*  from tb_user where user_id = '" . $user_id . "'";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function check_user($user_id) {
        $sql = "select 	*  from tb_user where  user_id = '". $user_id."'";
        $result = $this->db->query($sql);
        $result = $result->num_rows();
        return $result;
    }

    public function update_approve_status($user_id) {
        $this->db->set('user_status', 'A');
        $this->db->where('user_id', $user_id);
        $this->db->update('tb_user');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function update_unapprove_status($user_id) {
        $this->db->set('user_status', 'N');
        $this->db->where('user_id', $user_id);
        $this->db->update('tb_user');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function check_passsword($user_id, $default_user_pass) {
        $sql = "select 	*  from tb_user where  user_id = '" . $user_id ."' and user_pass = '" .$default_user_pass."'";
        $result = $this->db->query($sql);
        $result = $result->num_rows();
        return $result;
    }

    public function update_passsword($user_id, $default_user_pass, $new_user_pass) {
        $this->db->set('user_pass', $new_user_pass);
        $this->db->where('user_id', $user_id);
        $this->db->where('user_pass', $default_user_pass);
        $this->db->update('tb_user');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

}
?>

