<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Single_print_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->branch_id = $this->session->userdata('branch_id');
        $access = $this->session->userdata('id');
        if($access == '' ){
            redirect("Login");
        }
        $this->load->model('Single_print_model', 'report_print_m');
    }
    public function single_report_bill_print($id)
    {
        $data['get_all_billing_info'] = $this->report_print_m->get_all_billing_info($id);
        $data['get_building_info'] = $this->report_print_m->get_building_info();
        $this->load->view('app/service/single_report_bill_print', $data);
    }
    public function single_report_rent_print($id) 
    {
        $data['get_all_rent_info'] = $this->report_print_m->get_all_rent_info($id);
        $data['get_building_info'] = $this->report_print_m->get_building_info();
        $this->load->view('app/rent/single_report_rent_print', $data);
    }
   
}
