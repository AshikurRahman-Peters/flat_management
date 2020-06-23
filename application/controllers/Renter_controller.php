<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Renter_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->branch_id = $this->session->userdata('branch_id');
        $access = $this->session->userdata('id');
        if ($access == '') {
            redirect("Login");
        }
        $this->load->model('Renter_model', 'renter_m');
    }

    public function all_renter_list()
    {
        // $data['get_all_floor'] = $this->renter_m->get_all_floor();
        $data['select_all_resident'] = $this->renter_m->select_all_resident();
        $data['content'] = 'all_renter';
        $this->load->view('layout', $data);
    }

    public function ranter_register()
    {
        $data['content'] = 'renter_from';
        $this->load->view('layout', $data);
    }
    public function get_floor()
    {
        $floors = $this->db->query("SELECT * FROM tbl_floor WHERE active = 'a'")->result();
        echo json_encode($floors);
    }
    public function image_upload($file_name_get)
    {
        $file_name = $file_name_get['name'];
        $file_temp = $file_name_get['tmp_name'];

        $div = explode('.', $file_name);
        $get_last_e = end($div);
        $new_name =  rand() . '.' . $get_last_e;
        move_uploaded_file($file_temp, 'assets/Profile_image/' . $new_name);
        return $new_name;
    }

    public function member_insert()
    {
        $data = json_decode($this->input->raw_input_stream);
        // echo "<pre>";
        // print_r($data);
        // exit;
        if ($this->input->post('')) {
            $this->session->set_flashdata('msg', 'Member  Added');
            redirect('all_renter_list');
        } else {
            $data = array(
                'fld_name' => $this->input->post('name'),
                'fld_age' => $this->input->post('age'),
                'fld_relation' => $this->input->post('relation'),
                'fld_profession' => $this->input->post('profession'),
                'phone_number' => $this->input->post('phone_number'),
                'fld_nid' => $this->input->post('fld_nid')
            );
        };
        $result = $this->renter_m->addMember($data);

        if ($result) {
            $this->session->set_flashdata('msg', 'Unit Added Successfully');
            redirect('all_renter_list');
        } else {
            $this->session->set_flashdata('msg', 'Unit Not Added');
            redirect('all_renter_list');
        }
    }

    public function ranter_insert()
    {
        $data = json_decode($this->input->post('data'));

        
        $member = $data->member;
        $renter = $data->renter;

      

        $id = $this->db->query("SELECT unit_id FROM tbl_resident WHERE status= 'a'")->row();
    
        if ($renter->unit_id == $id) {

            echo json_decode("Data Already added") ;
            return;
            
  
       } else {
            $data1 = array(
                'fld_image' => $this->image_upload($_FILES['profile']),
                'signature_one' => $this->image_upload($_FILES['signature']),
                'unit_id' => $renter->unit_id,
                'status' => 'a',
                'resident_name' => $renter->resident_name,
                'father_name' =>  $renter->father_name,
                'resident_type' =>  $renter->resident_type,
                'date_of_birth' => $renter->date_of_birth,
                'marital_status' => $renter->marital_status,
                'village' => $renter->village,
                'police_station' => $renter->police_station,
                'district' => $renter->district,
                'work_address' => $renter->work_address,
                'religion' => $renter->religion,
                'educational_qualifications' => $renter->educational_qualifications,
                'mobile_number' => $renter->mobile_number,
                'national_id_number' => $renter->national_id_number,
                'email' => $renter->email,
                'passport_number' => $renter->passport_number,
                'emergency_name' => $renter->emergency_name,
                'emergency_relationships' => $renter->emergency_relationships,
                'emergency_address' => $renter->emergency_address,
                'emergency_number' => $renter->emergency_number,
                'housekeeper_name' => $renter->housekeeper_name,
                'housekeeper_national_id' => $renter->housekeeper_national_id,
                'housekeeper_number' => $renter->housekeeper_number,
                'housekeeper_address' => $renter->housekeeper_address,
                'driver_name' => $renter->driver_name,
                'driver_nid_number' => $renter->driver_nid_number,
                'driver_address' => $renter->driver_address,
                'driver_number' => $renter->driver_number,
                'previous_landlord_name' => $renter->previous_landlord_name,
                'previous_landlord_number' => $renter->previous_landlord_number,
                'previous_landlord_address' => $renter->previous_landlord_address,
                'reasons_to_leave_previous_home' => $renter->reasons_to_leave_previous_home,
                'current_landlord_name' => $renter->current_landlord_name,
                'current_landlord_number' => $renter->current_landlord_number,
                'living_date_current_home' => $renter->living_date_current_home,
                'security_guard_name' => $renter->security_guard_name,
                'security_guard_nid_number' => $renter->security_guard_nid_number,
                'security_guard_number' => $renter->security_guard_number,
                'security_guard_address' => $renter->security_guard_address,
                'generate_date' => date('Y-m-d'),
                'created_by' => $_SESSION['id'],
                'branch_id' => $_SESSION['branch_id']
            );
               

            $result = $this->renter_m->addUnitBill($data1);
            $renter_id = $this->db->insert_id();
            $data2 = array(
                'fld_name' => $member[0]->name,
                'fld_profession' => $member[0]->profession,
                'fld_age' => $member[0]->age,
                'fld_relation' => $member[0]->relation,
                'phone_number' => $member[0]->phone_number,
                'fld_nid' => $member[0]->fld_nid,
                'resident_id' => $renter_id

            );

            $result = $this->renter_m->addMember($data2);

            if ($result) {
                $this->session->set_flashdata('msg', 'Unit Added Successfully');
                redirect('ranter_register');
            } else {
                $this->session->set_flashdata('msg', 'Unit Not Added');
                redirect('ranter_register');
            }
        }
    }
    public function delete($id)
    {
        $data = array('status' => 'd');
        $result = $this->renter_m->delete($id, $data);

        if ($result) {
            $this->session->set_flashdata('msg', 'Deleted Successfully');
            redirect('all_renter_list');
        } else {
            $this->session->set_flashdata('msg', 'Deleted Fail....');
            redirect('all_renter_list');
        }
    }
    public function get_units()
    {
        $data = json_decode($this->input->raw_input_stream);
        $units = $this->db->query("SELECT * FROM tbl_unit WHERE status = 'a' and floor_id = $data->floorId and branch_id = $this->branch_id")->result();
        echo json_encode($units);
    }

    public function insert_rent_bill()
    {
        $data = json_decode($this->input->raw_input_stream);
        $monthId = $data->month;
        $serviceBill = $data->all_rent;
        $month_id = $monthId;
        $moth = $this->db->query("
        SELECT * FROM tbl_rent_transaction WHERE service_month_id = ? and branch_id = $this->branch_id", $month_id);
        if ($moth->num_rows() > 0) {

            echo json_encode("Already Added");
        } else {
            foreach ($serviceBill as $value) {


                $units = array(
                    'service_month_id' => $monthId,
                    'unit_id' => $value->unit_id,
                    'resident_id' => $value->resident_id,
                    'rent_amount' => $value->rent_amount,
                    'fld_garage' => $value->fld_garage,
                    'fld_others' => $value->fld_others,
                    'fld_total' => $value->rent_amount + $value->fld_garage + $value->fld_others,
                    'created_by' => $_SESSION['id'],
                    'branch_id' => $_SESSION['branch_id'],
                    'generate_date' => date('Y-m-d'),
                    'fld_status' => 'p'
                );
                $result = $this->renter_m->addRentBill($units);
                echo json_encode($result);
                echo json_encode("Successfully Added");
            }
        }
    }

    public function get_all_rent()
    {
        $all_bill = $this->db->query("
        SELECT
        u.*,
        rs.*
        FROM tbl_rent_transaction as rs
        INNER JOIN tbl_unit as u on rs.unit_id = u.id
        WHERE u.status = 'a'
        and u.status = 'a'
        and rs.branch_id = $this->branch_id
        ")->result();

        if (empty($all_bill)) {
            $all_bil = $this->db->query("
            SELECT sr.*,
            u.unit_name,
            u.status,
            rs.resident_name,
            rs.generate_date
            FROM tbl_rent_transaction as sr
            INNER JOIN tbl_unit as u on sr.unit_id = u.id
            INNER JOIN tbl_resident as rs on u.id = rs.unit_id
            WHERE u.status = 'a'
            and rs.status = 'a'
            and rs.branch_id = $this->branch_id
            AND sr.service_month_id In (SELECT MAX(service_month_id) FROM tbl_rent_transaction)
            ")->result();
            echo json_encode($all_bil);
        } else {
            $all_bills = $this->db->query("
            SELECT sr.*,
            u.unit_name,
            u.status
            FROM tbl_rent_transaction as sr
            INNER JOIN tbl_unit as u on sr.unit_id = u.id
            WHERE u.status = 'a' 
            and sr.branch_id = $this->branch_id
            AND sr.service_month_id In (SELECT MAX(service_month_id) FROM tbl_rent_transaction)
            ")->result();
            echo json_encode($all_bills);
        }
    }
}
