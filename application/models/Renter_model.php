<?php

/**
 * 
 */
class Renter_model extends CI_Model
{
    public function __construct()
	{
		$this->branch_id=$this->session->userdata('branch_id');
	}
    public function addUnitBill($data1)
    {
        $query = $this->db->insert('tbl_resident', $data1);
        return $query;
    }
    public function addRentBill($units)
    {
        $query = $this->db->insert('tbl_rent_transaction', $units);
        return $query;
    }
    public function addMember($data2)
    {
        $query = $this->db->insert('tbl_members', $data2);
        return $query;
    }
    public function select_all_resident()
    {
        $query = $this->db->query("SELECT r.*, u.unit_name, u.branch_id FROM tbl_resident as r 
        INNER JOIN tbl_unit as u on r.unit_id = u.id 
        where r.status ='a' and u.branch_id = $this->branch_id");
        return $query->result();
    }
    public function delete($id,$data){

		$query=$this->db->where("id",$id)->update("tbl_resident",$data);
		if ($query) {
			return $query;
		}else{
			return false;
		}
	}
}
