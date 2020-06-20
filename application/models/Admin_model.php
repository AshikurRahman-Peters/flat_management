<?php

/**
 * 
 */
class Admin_model extends CI_Model
{
    public function user_login($email, $pass)
    {
        $sql = "SELECT 
        *
        FROM tbl_user as u
        
        INNER JOIN tbl_branch as b on u.Branch_id = b.branch_id WHERE email = ? AND password = ? and u.STATUS = 'a' and b.STATUS = 'a'";

        $query = $this->db->query($sql, array($email, $pass));
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function set_branch($branch_id)
    {
        $query = $this->db->query("SELECT *FROM tbl_branch WHERE branch_id = ? and status='a'",$branch_id);

      
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
  
}
