<?php
defined('BASEPATH') or exit('No direct script access allowed');

class House_info_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->branch_id = $this->session->userdata('branch_id');
        $access = $this->session->userdata('id');
        if($access == '' ){
            redirect("Login");
        }
        $this->load->model('House_info_model', 'house_m');
    }
    public function house_info()
    {
        $data['selectOneRow'] = $this->house_m->selectOneRow();
        $data['content'] = 'house_info';
        $this->load->view('layout', $data);
    }

    public function update()
    {
        $data = array(
            'house_name' => $this->input->post('house_name'),
            'house_description' => $this->input->post('house_description'),
            'road_number' => $this->input->post('road_number'),
            'village_name' => $this->input->post('village_name'),
            'word_no' => $this->input->post('word_no'),
            'poster_code' => $this->input->post('poster_code'),

        );
        $id = $this->input->post("id", true);
        $result = $this->house_m->update($id, $data);

        if ($result) {
            $this->session->set_flashdata('msg', 'Updated Successfully');
            redirect('house_info');
        } else {
            $this->session->set_flashdata('msg', 'Updated Faild....');
            redirect('house_info');
        }
    }

    public function insert()
    {
        $data = array(
            'house_name' => $this->input->post('house_name'),
            'house_description' => $this->input->post('house_description'),
            'road_number' => $this->input->post('road_number'),
            'village_name' => $this->input->post('village_name'),
            'word_no' => $this->input->post('word_no'),
            'poster_code' => $this->input->post('poster_code'),
            'branch_id' => $_SESSION['branch_id']
        );
        $result = $this->house_m->inset_info($data);

        if ($result) {
            $this->session->set_flashdata('msg', 'Floor Added Successfully');
            redirect('house_info');
        } else {
            $this->session->set_flashdata('msg', 'Floor Not Added');
            redirect('house_info');
        }
    }
}
