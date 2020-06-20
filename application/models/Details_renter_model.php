<?php

/**
 * 
 */
class Details_renter_model extends CI_Model
{
    public function get_all_renter_info($id){
        $query = $this->db->query("
        select 
        re.*,
        m.*,
        u.unit_name
       FROM tbl_resident re
       INNER JOIN tbl_unit u on u.id = re.unit_id
        INNER JOIN tbl_members as m on re.id = m.resident_id
       WHERE re.status = 'a'
        and re.id =$id
        ");
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function get_all_member_info($id){
        $query = $this->db->query("
        SELECT * FROM tbl_members WHERE resident_id = $id
        ");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_building_info()
    {
        $query = $this->db->query("
		SELECT * FROM tbl_building_inf
		");
        return $query->row();
    }

}
