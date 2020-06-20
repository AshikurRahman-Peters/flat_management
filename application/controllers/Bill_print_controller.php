<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bill_print_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->branch_id = $this->session->userdata('branch_id');
        $access = $this->session->userdata('id');
        if($access == '' ){
            redirect("Login");
        }
        $this->load->model('Bill_print_model', 'print_m');
    }
    public function service_bill_print()
    {
        // $data['get_all_billing_info'] = $this->print_m->get_all_billing_info();
        $data['get_all_service_info'] = $this->print_m->get_all_service_info();
        $data['get_building_info'] = $this->print_m->get_building_info();
        $this->load->view('app/service/service_bill_print', $data);
    }
    public function service_rent_print()
    {
        // $data['get_all_billing_info'] = $this->print_m->get_all_billing_info();
        $data['get_all_rent_info'] = $this->print_m->get_all_rent_info();
        $data['get_building_info'] = $this->print_m->get_building_info();
        $this->load->view('app/rent/service_rent_print', $data);
    }
   
}
