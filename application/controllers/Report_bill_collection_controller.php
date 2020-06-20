<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_bill_collection_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->branch_id = $this->session->userdata('branch_id');
        $access = $this->session->userdata('id');
        if($access == '' ){
            redirect("Login");
        }
        $this->load->model('Report_bill_collection_model', 'report_collection_m');
    }
    public function Service_collection()
    {
        $data['get_all_billing_info'] = $this->report_collection_m->get_all_billing_info();
        // $data['get_all_month'] = $this->report_collection_m->get_all_month();
        $data['content'] = 'Report_bill_collection';
        $this->load->view('layout', $data);
    }
    public function get_all_month()
	{
        $data = json_decode($this->input->raw_input_stream);
        $months = $this->db->query("SELECT * FROM tbl_month_entry where branch_id = ?", $this->branch_id)->result();
        echo json_encode($months);
	}

    public function update_service()
    {
        $data = json_decode($this->input->raw_input_stream);
        $update = $this->db->query("
        UPDATE tbl_service_transaction 
        SET fld_status = 'a' 
        WHERE tbl_service_transaction.id = $data->id"
        );
        echo json_encode($update);
    }
    public function update_rent()
    {
        $data = json_decode($this->input->raw_input_stream);
        $update = $this->db->query("
        UPDATE tbl_rent_transaction 
        SET fld_status = 'a' 
        WHERE tbl_rent_transaction.id = $data->id
        "
        );
        echo json_encode($update);
    }
    public function select_lest_bill_entry()
    {
        $data = json_decode($this->input->raw_input_stream);
        // print_r($data);
        // exit;
        $bill = $this->db->query(
        "
        SELECT
		tbl_service_transaction.*,
        tbl_unit.unit_name,
        tbl_unit.ownar_name,
        tbl_unit.id as u_id,
        tbl_floor.floor_name,
      	tbl_month_entry.month_name,
          tbl_resident.resident_name,
        tbl_resident.id as r_id
	FROM tbl_service_transaction
	left JOIN tbl_unit ON tbl_service_transaction.unit_id = tbl_unit.id
	left JOIN tbl_floor ON tbl_unit.floor_id = tbl_floor.id
    LEFT JOIN tbl_month_entry on tbl_service_transaction.service_month_id = tbl_month_entry.id
    left JOIN tbl_resident ON tbl_unit.id = tbl_resident.unit_id
    where tbl_unit.floor_id = $data->floorId
    and tbl_service_transaction.fld_status = 'a'
    and tbl_service_transaction.branch_id = $this->branch_id
    and tbl_service_transaction.service_month_id = $data->monthId"
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
            tbl_unit.id as u_id,
            tbl_month_entry.month_name,
            tbl_floor.floor_name,
            tbl_resident.resident_name,
            tbl_resident.id as r_id
        FROM tbl_rent_transaction
        LEFT JOIN tbl_unit ON tbl_rent_transaction.unit_id = tbl_unit.id
        LEFT JOIN tbl_floor ON tbl_unit.floor_id = tbl_floor.id
        left JOIN tbl_resident ON tbl_unit.id = tbl_resident.unit_id
        LEFT JOIN tbl_month_entry on tbl_rent_transaction.service_month_id = tbl_month_entry.id
    where tbl_unit.floor_id = $data->floorId
    and tbl_rent_transaction.branch_id = $this->branch_id
  and tbl_rent_transaction.fld_status = 'a'
  and tbl_rent_transaction.service_month_id = $data->monthId"
        )->result();
        echo json_encode($bill);
    }
}
