<?php

/**
 * 
 */
class Bill_collection_model extends CI_Model
{
	public function get_all_billing_info()
	{
		$query = $this->db->query("
		SELECT
		tbl_service_transaction.*,
		tbl_unit.unit_name,
		tbl_floor.floor_name,
		tbl_resident.*
	FROM tbl_service_transaction
	LEFT JOIN tbl_unit ON tbl_service_transaction.unit_id = tbl_unit.id
	LEFT JOIN tbl_floor ON tbl_unit.floor_id = tbl_floor.id
    left JOIN tbl_resident ON tbl_unit.id = tbl_resident.unit_id
    ");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	public function update_service($id, $data)
	{
		$this->db->where('id', $id);
		$query = $this->db->update('tbl_service_transaction', $data);
		if ($query) {
			return $query;
		} else {
			return false;
		}
	}
}
