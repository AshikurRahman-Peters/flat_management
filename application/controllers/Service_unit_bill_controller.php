<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service_unit_bill_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->branch_id = $this->session->userdata('branch_id');
        $access = $this->session->userdata('id');
        if ($access == '') {
            redirect("Login");
        }
        $this->load->model('Service_unit_bill_model', 'unit_bill_m');
    }

    public function unit_bill_entry()
    {
        $data['get_all_month'] = $this->unit_bill_m->get_all_month();
        $data['get_all_floor'] = $this->unit_bill_m->get_all_floor();
        $data['get_all_unit'] = $this->unit_bill_m->get_all_unit();
        $data['content'] = 'unit/unit_bill_entry';
        $this->load->view('layout', $data);
    }
    public function get_all_month()
    {
        $this->db->where('status', 'a', 'ORDER by id', 'ASC');
        $query = $this->db->get('tbl_month_entry');
        return $query->result();
    }
    public function month_entry()
    {

        $data['get_all_month'] = $this->unit_bill_m->get_all_month();
        $data['content'] = 'month_entry';
        $this->load->view('layout', $data);
    }
    public function insert_month()
    {
        if ($this->input->post('')) {
            $this->session->set_flashdata('msg', 'Bill Add ');
            redirect('month_entry');
        } else {
            $data = array(
                'month_name' => $this->input->post('month_name'),
                'status' => 'a',
                'branch_id' => $_SESSION['branch_id']
            );
            $result = $this->unit_bill_m->month_entry($data);

            if ($result) {
                $this->session->set_flashdata('msg', 'Unit Added Successfully');
                redirect('month_entry');
            } else {
                $this->session->set_flashdata('msg', 'Unit Not Added');
                redirect('month_entry');
            }
        }
    }
    public function unit_bill_insert()
    {
        extract($_POST);

        $moth = $this->db->query("
        SELECT * FROM tbl_service_transaction WHERE service_month_id = ?", $service_month_id);
        if ($moth->num_rows() > 0) {

            echo ("Already Added");
        } else {
            // $id = $this->db->query(" SELECT sr.*,
            // u.unit_name,
            // rs.resident_name,
            // rs.generate_date
            // FROM tbl_service_transaction as sr

            // INNER JOIN 
            // (
            //  SELECT * FROM tbl_month_entry ORDER by id DESC limit 1
            // )
            // m on sr.service_month_id = m.id
            // INNER JOIN tbl_unit as u on sr.unit_id = u.id
            // INNER JOIN tbl_resident as rs on u.id = rs.unit_id")->num_rows();


            if ($service_month_id != $moth) {

                if ($this->input->post('')) {
                    $this->session->set_flashdata('msg', 'Already Added');
                    redirect('unit_bill_entry');
                } else {
                    $data = array(
                        'unit_id' => $unit_id,
                        'service_month_id' => $service_month_id,
                        'resident_id' => $resident_id,
                        'owner_fund' => $owner_fund,
                        'security_generator' => $security_generator,
                        'electricity_amount' => $electricity_amount,
                        'gas_amount' => $gas_amount,
                        'water_amount' => $water_amount,
                        'police_cleaners' => $police_cleaners,
                        'common_service' => $common_service,
                        'fld_others' => $fld_others,
                        'generate_date' => date('Y-m-d'),
                        'fld_status' => 'p',
                        'generate_by' => $_SESSION['id'],
                        'branch_id' => $_SESSION['branch_id'],
                        'fld_total' => $fld_others + $common_service + $police_cleaners + $water_amount + $gas_amount + $electricity_amount + $security_generator + $owner_fund,
                    );
                    $result = $this->unit_bill_m->addUnitBill($data);

                    if ($result) {
                        $this->session->set_flashdata('msg', 'Unit Added Successfully');
                        redirect('unit_bill_entry');
                    } else {
                        $this->session->set_flashdata('msg', 'Unit Not Added');
                        redirect('unit_bill_entry');
                    }
                }
            } else {
                $this->session->set_flashdata('msg', 'Unit Already Added');
                redirect('unit_bill_entry');
            }
        }
    }
}
