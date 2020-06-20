<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Advance_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->branch_id = $this->session->userdata('branch_id');
        $access = $this->session->userdata('id');
        if($access == '' ){
            redirect("Login");
        }
        $this->load->model('Advance_model', 'Advance_m');
    }
    public function advance(){
        // $data['get_expense'] = $this->Advance_m->get_expense();
        $data['content'] = 'advance/advance';
        $this->load->view('layout', $data);
    }

}