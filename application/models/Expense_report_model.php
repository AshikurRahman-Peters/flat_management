<?php

/**
 * 
 */
class Expense_report_model extends CI_Model
{
    public function __construct()
    {
        $this->branch_id = $this->session->userdata('branch_id');
    }
    public function selectAll($data)
    {
   
        $query = $this->db->query("
        SELECT 
        sum(r.fld_total) as r_total,       
        sum(s.fld_total) as s_total,
        u.*
        FROM tbl_unit as u
        INNER join tbl_service_transaction as s on u.id = s.unit_id 
        INNER join tbl_rent_transaction as r on u.id = r.unit_id 
        WHERE r.generate_date BETWEEN ? and ? and r.branch_id = ?
        ",[$data->dateFrom,$data->dateTo,$this->branch_id]);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function selectFloorService($data)
    {
   
        $query = $this->db->query("
        SELECT 
      
        s.*,
        u.*,
        f.*
        FROM tbl_unit as u
        INNER join tbl_floor as f on u.floor_id = f.id
        INNER join tbl_service_transaction as s on u.id = s.unit_id 
        WHERE s.collection_date  BETWEEN ? and ? and s.branch_id = ? and f.id = ?
        ",[$data->dateFrom,$data->dateTo,$this->branch_id,$data->floor_id]);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function selectRent($data)
    {
        $query = $this->db->query("
        SELECT 
	 	 r.*,
         u.*
        FROM tbl_rent_transaction as r
      	INNER join tbl_unit as u on u.id = r.unit_id
        WHERE r.branch_id = ?
       and generate_date BETWEEN ? and ? 
        ",[$this->branch_id,$data->dateFrom,$data->dateTo]);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function selectService($data)
    {
   
        $query = $this->db->query("
        SELECT 
	 	 r.*,
         u.*
        FROM tbl_service_transaction as r
      	INNER join tbl_unit as u on u.id = r.unit_id
        WHERE  r.branch_id = ? 
       and generate_date BETWEEN ? and ? 
        ",[$this->branch_id,$data->dateFrom,$data->dateTo]);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function selectExpense($data)
    {
        $query = $this->db->query("
        SELECT e.*, t.expense_name from tbl_building_expense as e
        INNER join tbl_expense_type as t on e.type = t.id
        WHERE e.type = ? and e.STATUS = 'a' and e.date BETWEEN ? and ? and e.branch_id =?
        ",[$data->id,$data->dateFrom,$data->dateTo,$this->branch_id]);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function selectExpenseAll($data)
    {
        $query = $this->db->query("
        SELECT e.*, t.expense_name from tbl_building_expense as e
        INNER join tbl_expense_type as t on e.type = t.id
        WHERE e.STATUS = 'a' and e.date BETWEEN  ? and ? and e.branch_id =?
        ",[$data->dateFrom,$data->dateTo,$this->branch_id]);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
