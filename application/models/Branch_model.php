<?php

/**
 * 
 */
class Branch_model extends CI_Model
{
	public function __construct()
	{
		$this->branch_id=$this->session->userdata('branch_id');
	}
    public function allBranch(){
        $query = $this->db->query("
        SELECT * FROM tbl_branch WHERE status = 'a' 
        ");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function branchInsert($data)
    {
        $query = $this->db->insert('tbl_branch', $data);
        return $query;
    }
    public function selectOnerow($id)
    {
      $this->db->where('Branch_id', $id);
      $query = $this->db->get('tbl_branch');
      if ($query->num_rows() > 0) {
        return $query->row();
      }
    }
    public function delete($id, $data)
    {
      $query = $this->db->where("branch_id", $id)->update("tbl_branch", $data);
      if ($query) {
        return $query;
      } else {
        return false;
      }
    }
    public function update($id, $data)
    {
      $this->db->where('branch_id', $id);
      $query = $this->db->update('tbl_branch', $data);
      if ($query) {
        return $query;
      } else {
        return false;
      }
    }
    
  
}
