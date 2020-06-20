<?php

/**
 * 
 */
class User_access_model extends CI_Model
{
  public function __construct()
	{
		$this->branch_id=$this->session->userdata('branch_id');
	}
  public function addUser($data)
  {
    $query = $this->db->insert('tbl_user', $data);
    return $query;
  }
  public function alluser()
  {
    $query = $this->db->query("
        SELECT * FROM `tbl_user` WHERE status = 'a' and branch_id = $this->branch_id
        ");
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
  public function selectOnerow($id)
  {
    $this->db->where('id', $id);
    $this->db->where('branch_id', $this->branch_id);
    $query = $this->db->get('tbl_user');

    if ($query->num_rows() > 0) {
      return $query->row();
    }
  }
  public function delete($id, $data)
  {
    $query = $this->db->where("id", $id)->update("tbl_user", $data);
    if ($query) {
      return $query;
    } else {
      return false;
    }
  }
  public function update($id, $data)
  {
    $this->db->where('id', $id);
    $query = $this->db->update('tbl_user', $data);
    if ($query) {
      return $query;
    } else {
      return false;
    }
  }
  public function select_report($id)
  {
    $this->db->where('id', $id);
    $this->db->where('branch_id',$this->branch_id);
    $query = $this->db->get('tbl_user');

    if ($query->num_rows() > 0) {
      return $query->row();
    }
  }
}
