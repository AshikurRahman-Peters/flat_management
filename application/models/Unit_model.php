<?php

/**
 * 
 */
class Unit_model extends CI_Model
{
    public function __construct()
    {
        $this->branch_id = $this->session->userdata('branch_id');
    }
    public function addUnit($data1)
    {
        $query = $this->db->insert('tbl_unit', $data1);
        return $query;
    }
    public function addUnitBill($data2)
    {
        $query = $this->db->insert('tbl_rent_transaction', $data2);
        return $query;
    }
    public function addServiceBill($units)
    {

        $query = $this->db->insert('tbl_service_transaction', $units);
        return $query;
    }
    public function allUnit()
    {
        $this->db->where('status', 'a');
        $this->db->where('branch_id', $this->branch_id);
        $query = $this->db->get('tbl_unit');
        return $query->result();
       
    }
    public function all_Floor_name()
    {
        $this->db->where('active', 'a');
        $this->db->where('branch_id', $this->branch_id);
        $query = $this->db->get('tbl_floor');
        return $query->result();
       
    }

}
