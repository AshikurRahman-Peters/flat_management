<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cash_transaction_report_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->branch_id = $this->session->userdata('branch_id');
        $access = $this->session->userdata('id');
        if ($access == '') {
            redirect("Login");
        }
        $this->load->model('Cash_transaction_report_model', 'cash_report_m');
    }
    public function transaction_report()
    {
        // $data['get_expense'] = $this->cash_report_m->get_expense();
        $data['content'] = 'transaction_report/cash_transaction_rent_report';
        $this->load->view('layout', $data);
    }
    public function get_all_transaction()
    {
        $data = json_decode($this->input->raw_input_stream);
        $get_all_transaction = $this->cash_report_m->get_all_transaction($data);
        echo json_encode($get_all_transaction);
    }
}

