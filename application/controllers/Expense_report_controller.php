<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Expense_report_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->branch_id = $this->session->userdata('branch_id');
        $access = $this->session->userdata('id');
        if ($access == '') {
            redirect("Login");
        }
        $this->load->model('Expense_report_model', 'report_m');
    }
    public function index()
    {
        $data['content'] = 'reports/expense_report';
        $this->load->view('layout', $data);
    }
    public function get_expense_name()
    {
        $query = $this->db->query("select * from tbl_expense_type where status= 'a' and branch_id= $this->branch_id")->result();
        echo json_encode($query);
    }
    public function get_Floor()
    {
        $query = $this->db->query("select * from tbl_floor where active= 'a' and branch_id= $this->branch_id")->result();
        echo json_encode($query);
    }
    public function get_all_receive_data()
    {
        $data = json_decode($this->input->raw_input_stream);
        if ($data->transactionType == 'paid') {
            if ($data->id == '') {
                $total = $this->report_m->selectExpenseAll($data); 
            } else {
                $total = $this->report_m->selectExpense($data);
            }
        } else {
            if ($data->type == 'rent') {
                $total = $this->report_m->selectRent($data);
                
            }elseif ($data->type == 'service') {
                $total = $this->report_m->selectService($data);

            }elseif($data->floor_id != '') {
                    $total = $this->report_m->selectFloorService($data);
            }else{
                $total = $this->report_m->selectAll($data);
            }
        }

        echo json_encode($total);
    }
}
