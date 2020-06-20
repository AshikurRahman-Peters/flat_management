<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
    public function index()
    {
        $data['get_building_info'] = $this->report_print_m->get_building_info();
        $data['content'] = 'dashboard';
        $this->load->view('layout', $data);
    }

}
