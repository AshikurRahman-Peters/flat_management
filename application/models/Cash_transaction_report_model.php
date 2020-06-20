<?php

/**
 * 
 */
class Cash_transaction_report_model extends CI_Model
{
	public function __construct()
	{
		$this->branch_id = $this->session->userdata('branch_id');
    }
    
    public function get_all_transaction($data){
        $query = $this->db->query("
        SELECT 
        ex.*,
        sum(ex.taka) as expense,
        sum(s.fld_total) as service,
        sum(s.due_amount) as due,
        sum(s.paid_amount) as paid
        FROM tbl_building_expense ex
        INNER join tbl_service_transaction s on ex.branch_id = s.Branch_id
        where ( s.collection_date 
        BETWEEN ? and ? ) and (ex.date
        BETWEEN ? and ?) 
        and s.branch_id = ?",
        [$data->dateFrom,$data->dateTo,$data->dateFrom,$data->dateTo,$this->branch_id]);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
}