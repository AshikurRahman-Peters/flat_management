<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Floor extends CI_Controller
{
    	
	function __construct()
	{
		parent::__construct();
        $this->branch_id = $this->session->userdata('branch_id');
        $access = $this->session->userdata('id');
        if($access == '' ){
            redirect("Login");
        }
		$this->load->model('Floor_model','floor_m');
	}
    public function floor_entry()
	{
        $data['allFloor']=$this->floor_m->allfloor();
        $data['title']='Show All floor';
        $data['content'] = 'floor/floor_entry';
		$this->load->view('layout',$data);
	}
    public function floor_insert(){

            $data=array(
                'floor_name'=>$this->input->post('floor_name'),
				'active'=>'a',
				'added_by'=>$_SESSION['id'],
				'branch_id'=>$_SESSION['branch_id']
            );
            $result=$this->floor_m->addFloor($data);
               
                if ($result) {
                    $this->session->set_flashdata('msg', 'Floor Added Successfully');
                    redirect('floor_entry');
                }else{
                        $this->session->set_flashdata('msg', 'Floor Not Added');
                        redirect('floor_entry');
                }
             }
    public function select_floor(){
        $data['allfloors']=$this->floor_m->allfloor();
		$data['title']='Show All floor';
		$data['content'] = 'floor/floor_entry';
		$this->load->view('layout',$data);
    }
    public function edit($id){
		$data['title']='floor Entry';
		$data['selectOneRow']= $this->floor_m->selectOneRow($id);
        $data['content'] = 'floor/floor_edit';
		$this->load->view('layout',$data);
    }
    public function update(){
		// extract($_POST);
		$data = array(
           'floor_name'=>$this->input->post('floor_name'),
	       	
		);
        $id = $this->input->post("id",true);
        $result=$this->floor_m->update($id,$data);

		if($result):
			$this->session->set_flashdata('msg', ' Updated Successfully');
			redirect('floor_entry');
		else:
			$this->session->set_flashdata('msg', 'Updated Fail....');
			redirect('floor_entry');
		endif;

    }
    public function delete($id){
		$data=array('active'=>'d');
		$result=$this->floor_m->delete($id,$data);

		if ($result) {
           	$this->session->set_flashdata('msg', 'Deleted Successfully');
       		redirect('floor_entry');
           }else{
	           	$this->session->set_flashdata('msg', 'Deleted Fail....');
           		redirect('floor_entry');
           }
	}
}

