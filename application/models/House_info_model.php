<?php

/**
 * 
 */
class House_info_model extends CI_Model
{
	public function __construct()
	{
		$this->branch_id=$this->session->userdata('branch_id');
	}
	public function selectOneRow(){
		$this->db->where('branch_id',$this->branch_id);
		$query = $this->db->get('tbl_building_inf');		
		if ($query->num_rows()>0) {
			return $query->row();
		}
		else{
			return false;
		}
    }
    public function update($id,$data){
		$this->db->where('id',$id);
		$this->db->where('branch_id',$this->branch_id);
		$query = $this->db->update('tbl_building_inf', $data);
		if ($query) {
			return $query;
		}else{
			return false;
		}
	}
    public function inset_info($data){
		$query = $this->db->insert('tbl_building_inf', $data);
        return $query;
	}
}
