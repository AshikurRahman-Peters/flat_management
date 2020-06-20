<?php

/**
 * 
 */
class Floor_model extends CI_Model
{
	public function __construct()
	{
		$this->branch_id=$this->session->userdata('branch_id');
	}
	public function addFloor($data){
		$query=$this->db->insert('tbl_floor', $data);
			return $query;

	}
	public function allfloor(){
        $this->db->where('active','a');
        $this->db->where('branch_id',$this->branch_id);
		$query=$this->db->get('tbl_floor');
			return $query->result();

	}
	public function selectOneRow($id){
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_floor');
				
		if ($query->num_rows()>0) {
			return $query->row();
		}
		else{
			return false;
		}
	}
	public function update($id,$data){
		$this->db->where('id',$id);
		$query = $this->db->update('tbl_floor', $data);
		if ($query) {
			return $query;
		}else{
			return false;
		}
	}
	public function delete($id,$data){
		$query=$this->db->where("id",$id)->update("tbl_floor",$data);
		if ($query) {
			return $query;
		}else{
			return false;
		}
	}
}
