<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Branch_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->branch_id = $this->session->userdata('branch_id');
        $access = $this->session->userdata('id');
        if($access == '' ){
            redirect("Login");
        }
        $this->load->model('Branch_model', 'branch_m');
       
    }

   
    public function branch_access()
    {
        $data['allBranch'] = $this->branch_m->allBranch();
        $data['content'] = 'branch/branch_access';
        $this->load->view('layout', $data);
    }
    public function branchInsert(){
        $data = array(

            "branch_name" => $this->input->post("branch_name"),
            "branch_title" => $this->input->post("branch_title"),
            "branch_address" => $this->input->post("branch_address"),
            "added_by" => $_SESSION['id'],
            "entry_date" => date('Y-m-d'),
            "status" => "a"

        );
        $result = $this->branch_m->branchInsert($data);

        if ($result) {
            $this->session->set_flashdata('msg', 'Branch Added Successfully');
            redirect('branch_access');
        } else {
            $this->session->set_flashdata('msg', 'Branch Not Added');
            redirect('branch_access');
        }
    }
    public function edit($id){
        $data['title']='Update branch';
        $data['allBranch'] = $this->branch_m->allBranch();
        $data['selectonerow']= $this->branch_m->selectOnerow($id);
        $data['content']='branch/branch_edit';
        $this->load->view('layout', $data);
    }
    public function update(){
        // extract($_POST);
    
         $data = array(

            "branch_name" => $this->input->post("branch_name"),
            "branch_title" => $this->input->post("branch_title"),
            "branch_address" => $this->input->post("branch_address"),
            "updated_by" => $_SESSION['id'],
     );
       $id = $this->input->post("branch_id",true);
       $result=$this->branch_m->update($id,$data);

        if($result){
            $this->session->set_flashdata('msg', 'Updated Successfully');
            redirect('branch_access');
        }else{
            $this->session->set_flashdata('msg', 'Updated Failed....');
            redirect('branch_access');
        }

    }
    public function delete($id){
        $data=array('status'=>'d');
        $result=$this->branch_m->delete($id,$data);

        if ($result) {
               $this->session->set_flashdata('msg', 'Deleted Successfully');
               redirect('branch_access');
           }else{
                   $this->session->set_flashdata('msg', 'Deleted Faild....');
                   redirect('branch_access');
           }
    }
}
