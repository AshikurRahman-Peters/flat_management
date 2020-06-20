<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bill_collection extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->branch_id = $this->session->userdata('branch_id');
        $access = $this->session->userdata('id');
        if ($access == '') {
            redirect("Login");
        }
        $this->load->model('Bill_collection_model', 'collection_m');
    }
    public function Service_collection()
    {
        $data['get_all_billing_info'] = $this->collection_m->get_all_billing_info();
        // $data['get_all_month'] = $this->collection_m->get_all_month();
        $data['content'] = 'collection/service_bill_collection';
        $this->load->view('layout', $data);
    }



    public function select_lest_bill_entry()
    {
        $data = json_decode($this->input->raw_input_stream);
        $bill = $this->db->query(
            "
        SELECT
		tbl_service_transaction.*,
		tbl_unit.unit_name,
		tbl_floor.floor_name,
		tbl_resident.resident_name,
        tbl_month_entry.month_name
	FROM tbl_service_transaction
	left JOIN tbl_unit ON tbl_service_transaction.unit_id = tbl_unit.id
	left JOIN tbl_floor ON tbl_unit.floor_id = tbl_floor.id
    left JOIN tbl_resident ON tbl_unit.id = tbl_resident.unit_id
    LEFT JOIN tbl_month_entry on tbl_service_transaction.service_month_id =  tbl_month_entry.id
    where tbl_service_transaction.unit_id = $data->unit_id
    and tbl_service_transaction.fld_status = 'p' 
    and tbl_service_transaction.branch_id = $this->branch_id	
    ORDER by tbl_service_transaction.id ASC LIMIT 1
       "
        )->result();
        echo json_encode($bill);
    }
    public function select_lest_rent_entry()
    {
        $data = json_decode($this->input->raw_input_stream);
        $bill = $this->db->query(
            "
            SELECT
            tbl_rent_transaction.*,
            tbl_unit.unit_name,
            tbl_unit.ownar_name,
            tbl_floor.floor_name,
            tbl_resident.resident_name,
            tbl_month_entry.month_name
        FROM tbl_rent_transaction
        LEFT JOIN tbl_unit ON tbl_rent_transaction.unit_id = tbl_unit.id
        LEFT JOIN tbl_month_entry on tbl_rent_transaction.service_month_id =  tbl_month_entry.id 
        LEFT JOIN tbl_floor ON tbl_unit.floor_id = tbl_floor.id
        left JOIN tbl_resident ON tbl_unit.id = tbl_resident.unit_id
      where tbl_rent_transaction.unit_id = $data->unit_id
      and tbl_rent_transaction.fld_status = 'p'	
      and tbl_rent_transaction.branch_id = $this->branch_id
      ORDER by tbl_rent_transaction.id ASC LIMIT 1
       "
        )->result();
        echo json_encode($bill);
    }
    public function selectDueAmount()
    {
        $data = json_decode($this->input->raw_input_stream);
       
        $bill = $this->db->query("
        SELECT  
            sum(due_amount) as total
            FROM 
            tbl_rent_transaction 
            WHERE unit_id = ?
            and branch_id = ? ",[$data->unit_id,$this->branch_id])->row();
        echo json_encode($bill);
    }
    public function selectDueAmountService()
    {
        $data = json_decode($this->input->raw_input_stream);
       
        $bill = $this->db->query("
        SELECT  
            sum(due_amount) as total
            FROM 
            tbl_service_transaction 
            WHERE unit_id = ?
            and branch_id = ? ",[$data->unit_id,$this->branch_id])->row();
        echo json_encode($bill);
    }
}
