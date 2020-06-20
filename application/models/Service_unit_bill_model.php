<?php

/**
 * 
 */
class Service_unit_bill_model extends CI_Model
{
	public function __construct()
	{
		$this->branch_id=$this->session->userdata('branch_id');
	}
    public function addUnitBill($data)
    {
        $query = $this->db->insert('tbl_service_transaction',$data);
        return $query;
    }
    public function get_all_floor(){
        $this->db->where('active','a');
        $this->db->where('branch_id',$this->branch_id);
		$query=$this->db->get('tbl_floor');
			return $query->result();
	}
    public function get_all_unit(){
        $this->db->where('status','a');
        $this->db->where('branch_id',$this->branch_id);
		$query=$this->db->get('tbl_unit');
			return $query->result();
	
    }
    public function get_all_month(){
        $this->db->where('status','a','ORDER by id','ASC');
        $this->db->where('branch_id',$this->branch_id);
		$query=$this->db->get('tbl_month_entry');
			return $query->result();
	
    }
    public function month_entry($data){
        $query = $this->db->insert('tbl_month_entry', $data);
        return $query;
    }

}