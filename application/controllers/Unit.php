<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->branch_id = $this->session->userdata('branch_id');
        $access = $this->session->userdata('id');
        if($access == '' ){
            redirect("Login");
        }
        $this->load->model('Unit_model', 'unit_m');
    }
    public function unit_entry()
    {
        $data['allUnit'] = $this->unit_m->allUnit();
        $data['all_Floor_name'] = $this->unit_m->all_Floor_name();
        $data['content'] = 'unit/unit_entry';
        $this->load->view('layout', $data);
    }
    public function get_floor()
    {
        $floors = $this->db->query("SELECT * FROM `tbl_floor` WHERE active = 'a' and branch_id = $this->branch_id")->result();
        echo json_encode($floors);
    }
    public function get_units()
    {
        $data = json_decode($this->input->raw_input_stream);
        $units = $this->db->query("SELECT * FROM tbl_unit WHERE status = 'a' and floor_id= $data->floorId and branch_id=$this->branch_id")->result();
        echo json_encode($units);
    }
    public function get_unit()
    {
        $data = json_decode($this->input->raw_input_stream);
        $units = $this->db->query("SELECT * FROM tbl_unit as un
        INNER JOIN tbl_rent_transaction on un.id = tbl_rent_transaction.unit_id
        INNER JOIN tbl_floor on  tbl_floor.id = un.floor_id
        WHERE STATUS = 'a' and floor_id= $data->floorId")->result();
        echo json_encode($units);
    }

    public function unit_insert()
    {
        $data = json_decode($this->input->raw_input_stream);

     
        $unit_details = $data->unit_details;
        $rent_bills = $data->rent_bills;

        if ($this->input->post('')) {
            $this->session->set_flashdata('msg', 'Unit Added ');
            redirect('unit_entry');
        } else {
            $data1 = array(
                'unit_name' => $unit_details->unit_name,
                'floor_id' => $unit_details->floor_id,
                'ownar_name' => $unit_details->ownar_name,
                'fathers_name' => $unit_details->fathers_name,
                'fld_address' => $unit_details->fld_address,
                'fld_email' => $unit_details->fld_email,
                'phone_number' => $unit_details->phone_number,
                'status' => 'a',
                'entry_date' => date('Y-m-d'),
                'added_by' => $_SESSION['id'],
                'branch_id' => $_SESSION['branch_id']
            );
            $result = $this->unit_m->addUnit($data1);
            $unit_id = $this->db->insert_id();
            $data2 = array(
                'rent_amount' => $rent_bills->rent_amount,
                'fld_garage' => $rent_bills->fld_garage,
                'fld_others' => $rent_bills->fld_others,
                'service_month_id' => $rent_bills->id,
                'fld_status' => 'p',
                'fld_total' => $rent_bills->rent_amount + $rent_bills->fld_garage + $rent_bills->fld_others,
                'generate_date' => date('Y-m-d'),
                'fld_generate_by' => $_SESSION['id'],
                'unit_id' => $unit_id,
                'branch_id' => $_SESSION['branch_id']
            );
            $result = $this->unit_m->addUnitBill($data2);
            if ($result) {
                $this->session->set_flashdata('msg', 'Unit Added Successfully');
                redirect('unit_entry');
            } else {
                $this->session->set_flashdata('msg', 'Unit Not Added');
                redirect('unit_entry');
            }
        }
    }

    public function delete_unit()
    {
        $data = json_decode($this->input->raw_input_stream);
        $update = $this->db->query(
            "
        UPDATE tbl_unit 
        SET status = 'd'
        WHERE tbl_unit.id = $data->unit_id"
        );
        echo json_encode($update);
    }
    public function edit_unit_detail()
    {
        $id = $_SESSION['id'];
        $date = date('Y-m-d');
        $data = json_decode($this->input->raw_input_stream);
        $unit = $data->unit_details;
        $rent_bills = $data->rent_bills;
        $update = $this->db->query("
        UPDATE tbl_unit
        update_date = $date,
        update_by = $id,
        WHERE tbl_unit.id = $unit->id"
        )->row();
        echo json_encode($update);
    }
    public function insert_service_bill()
    {
        $data = json_decode($this->input->raw_input_stream);
        $monthId = $data->month;
        $serviceBill = $data->all_bill;
        $month_id = $monthId;
        $moth = $this->db->query("
        SELECT * FROM tbl_service_transaction WHERE service_month_id = ?",$month_id);
        if ($moth ->num_rows() >0) {
          
          echo json_encode("Already Added");
        } else {
            foreach ($serviceBill as $value) {


                $units = array(
                    'service_month_id' => $monthId,
                    'unit_id' => $value->unit_id,
                    'resident_id' => $value->resident_id,
                    'owner_fund' => $value->owner_fund,
                    'security_generator' => $value->security_generator,
                    'electricity_amount' => $value->electricity_amount,
                    'gas_amount' =>  $value->gas_amount,
                    'water_amount' =>  $value->water_amount,
                    'police_cleaners' =>  $value->police_cleaners,
                    'common_service' =>  $value->common_service,
                    'fld_others' =>  $value->fld_others,
                    'fld_total' => $value->owner_fund + $value->owner_fund +
                        $value->security_generator + $value->electricity_amount + $value->gas_amount + $value->water_amount +
                        $value->police_cleaners +  $value->common_service +  $value->fld_others,
                    'generate_by' => $_SESSION['id'],
                    'branch_id' => $_SESSION['branch_id'],
                    'generate_date' => date('Y-m-d'),
                    'fld_status' => 'p'
                );
                $result = $this->unit_m->addServiceBill($units);
                echo json_encode($result);
                echo json_encode("Successfully Added");
            }
        }
    }
}
