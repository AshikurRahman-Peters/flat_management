<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service_bill_entry_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->branch_id = $this->session->userdata('branch_id');
        $access = $this->session->userdata('id');
        if($access == '' ){
            redirect("Login");
        }
        $this->load->model('Service_bill_entry_model', 'service_bill_m');
    }


    public function bill_entry()
    {
        $data['get_all_month'] = $this->service_bill_m->get_all_month();
        $data['get_all_floor'] = $this->service_bill_m->get_all_floor();
        $data['get_all_unit'] = $this->service_bill_m->get_all_unit();
        $data['content'] = 'service/service_bill_entry';
        $this->load->view('layout', $data);
    }

    public function service_bill_insert()
    {
        extract($_POST);
        // $phone = json_encode($this->input->post($_POST));
        // echo '<pre>';
        // print_r($_POST);
        // exit();
        if ($this->input->post('')) {
            $this->session->set_flashdata('msg', 'Bill Add ');
            redirect('bill_entry');
        } else {
            $data = array(
                'unit_id' => $unit_id,
                'renter_id' => $this->input->post('renter_id'),
                'owner_fund' => $this->input->post('owner_fund'),
                'security_generator' => $this->input->post('security_generator'),
                'electricity_amount' => $this->input->post('electricity_amount'),
                'gas_amount' => $this->input->post('gas_amount'),
                'water_amount' => $this->input->post('water_amount'),
                'police_cleaners' => $this->input->post('police_cleaners'),
                'common_service' => $this->input->post('common_service'),
                'fld_others' => $this->input->post('fld_others'),
                'fld_status' => 'p',
                'generate_by' => $this->input->post($_SESSION['id']),
                'generate_date' => date('Y-m-d'),
                'total_bill_amount' => $this->input->post('owner_fund + security_generator + electricity_amount'),
            );
            $result = $this->service_bill_m->addUnitBill($data);

            if ($result) {
                $this->session->set_flashdata('msg', 'Unit Added Successfully');
                redirect('bill_entry');
            } else {
                $this->session->set_flashdata('msg', 'Unit Not Added');
                redirect('bill_entry');
            }
        }
    }
    public function get_all_bill()
    {
        // $all_bill = $this->db->query("
        // SELECT sr.*,
        // u.unit_name,
        // rs.resident_name,
        // rs.generate_date
        // FROM tbl_service_transaction as sr
        // INNER JOIN tbl_unit as u on sr.unit_id = u.id
        // INNER JOIN tbl_resident as rs on u.id = rs.unit_id
        // WHERE 
        // sr.service_month_id In (SELECT MAX(service_month_id) FROM tbl_service_transaction)
        // and u.STATUS = 'a'
        // and sr.branch_id = $this->branch_id
        // ")->result();
        // echo json_encode($all_bill);

        $all_bill = $this->db->query("
        SELECT
        u.unit_name,
        u.status,
        rs.*
        FROM tbl_resident as rs
        INNER JOIN tbl_unit as u on rs.unit_id = u.id
        WHERE u.status = 'a'
        and rs.status = 'a'
        and rs.branch_id = $this->branch_id
        ")->result();

     
        if(empty($all_bill)){
            // $all_bil = $this->db->query("
            // SELECT sr.*,
            // u.unit_name,
            // u.status,
            // rs.resident_name,
            // rs.generate_date
            // FROM tbl_service_transaction as sr
            // INNER JOIN tbl_unit as u on sr.unit_id = u.id
            // INNER JOIN tbl_resident as rs on u.id = rs.unit_id
            // WHERE u.status = 'a'
            // and rs.status = 'a'
            // and rs.branch_id = $this->branch_id
            // AND sr.service_month_id In (SELECT MAX(service_month_id) FROM tbl_service_transaction)
            // ")->result();
            // echo json_encode($all_bil);
            $all_bil = $this->db->query("
            SELECT sr.*,
            MAX(sr.service_month_id),
                    u.unit_name,
                    u.status,
                    rs.resident_name,
                    rs.generate_date
                    FROM tbl_service_transaction as sr
                    INNER JOIN tbl_unit as u on sr.unit_id = u.id
                    INNER JOIN tbl_resident as rs on u.id = rs.unit_id
                    WHERE u.status = 'a'
                    and rs.status = 'a'
                    and rs.branch_id = $this->branch_id
            ")->result();
            echo json_encode($all_bil);
        }else{
            // $all_bills = $this->db->query("
            // SELECT sr.*,
            // u.unit_name,
            // u.status
            // FROM tbl_service_transaction as sr
            // INNER JOIN tbl_unit as u on sr.unit_id = u.id
            // WHERE u.status = 'a' 
            // and sr.branch_id = $this->branch_id
            // AND sr.service_month_id In (SELECT MAX(service_month_id) FROM tbl_service_transaction)
            // ")->result();
            // echo json_encode($all_bills);
            $all_bills = $this->db->query("
            SELECT sr.*,
            MAX(sr.service_month_id),
            u.unit_name,
            u.status
            FROM tbl_service_transaction as sr
            INNER JOIN tbl_unit as u on sr.unit_id = u.id
            WHERE u.status = 'a' 
            and sr.branch_id =  $this->branch_id ")->result();
            echo json_encode($all_bills);
           
        }
    }
    public function delete($id)
    {

        $data = array('status' => 'd');

        $result = $this->service_bill_m->delete($id, $data);

        if ($result) {
            $this->session->set_flashdata('msg', 'Deleted Successfully');
            redirect('month_entry');
        } else {
            $this->session->set_flashdata('msg', 'Deleted Fail....');
            redirect('month_entry');
        }
    }
}
