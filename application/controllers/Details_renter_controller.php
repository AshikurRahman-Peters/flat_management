<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Details_renter_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->cbrunch = $this->session->userdata('Branch_id');
        if (!$_SESSION['id']) {
            redirect('login');
        }
        $this->load->model('Details_renter_model', 'details_m');
    }
    public function renter_details($id){

    $data['get_all_renter_info'] = $this->details_m->get_all_renter_info($id);
    $data['get_building_info'] = $this->details_m->get_building_info();
    $data['get_all_member_info'] = $this->details_m->get_all_member_info($id);
    $this->load->view('app/details_renter', $data);
    }


}