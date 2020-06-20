<?php

/**
 * 
 */
class Service_bill_entry_model extends CI_Model
{
	public function __construct()
	{
		$this->branch_id=$this->session->userdata('branch_id');
	}
	public function addUnitBill($data)
	{
		$query = $this->db->insert('tbl_service_transaction', $data);
		return $query;
	}
	public function get_all_floor()
	{
		$this->db->where('active', 'a');
		$query = $this->db->get('tbl_floor');
		return $query->result();
	}
	public function get_all_unit()
	{
		$this->db->where('status', 'a');
		$query = $this->db->get('tbl_unit');
		return $query->result();
	}
	public function get_all_month()
	{
		$this->db->where('status', 0, 'ORDER by id', 'ASC');
		$this->db->where('branch_id',$this->branch_id);
		$query = $this->db->get('tbl_month_entry');
		return $query->result();
	}
	public function get_all_billing_info()
	{
		$query = $this->db->query("
        SELECT
		tbl_service_transaction.*,
		tbl_unit.unit_name,
		tbl_floor.floor_name,
		tbl_resident.resident_name,
        tbl_month_entry.month_name
	FROM tbl_service_transaction
	left JOIN tbl_unit ON tbl_service_transaction.unit_id = tbl_unit.id
    LEFT JOIN tbl_month_entry on tbl_service_transaction.service_month_id = tbl_month_entry.id
	left JOIN tbl_floor ON tbl_unit.floor_id = tbl_floor.id
    left JOIN tbl_resident ON tbl_unit.id = tbl_resident.unit_id
     where tbl_service_transaction.fld_status = 'p'	
       
	");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	public function get_all_rent_info()
	{
		$query = $this->db->query("
		SELECT
    	tbl_rent_transaction.*,
    	tbl_unit.*,
    	tbl_floor.floor_name,
        tbl_month_entry.month_name,
    	tbl_resident.*
    FROM tbl_rent_transaction
    LEFT JOIN tbl_unit ON tbl_rent_transaction.unit_id = tbl_unit.id
    LEFT JOIN tbl_floor ON tbl_unit.floor_id = tbl_floor.id
    left JOIN tbl_resident ON tbl_unit.id = tbl_resident.unit_id
    LEFT JOIN tbl_month_entry on tbl_rent_transaction.service_month_id = tbl_month_entry.id
     WHERE 
     tbl_rent_transaction.fld_status = 'a' and
       tbl_rent_transaction.service_month_id In (SELECT MAX(service_month_id) FROM tbl_rent_transaction)
       	
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
	public function delete($id, $data)
	{
		$query = $this->db->where("id", $id)->update("tbl_month_entry", $data);
		if ($query) {
			return $query;
		} else {
			return false;
		}
	}
}
